<?php 
$totalAnswred = !empty($currentShortData['selected_option_id']) ? count($currentShortData['selected_option_id']) : 0;
$isDone = count($options) == $totalAnswred;

// dd($currentShortData['selected_option_id']);
?>

<?= $this->element('icons/record-animation'); ?>
<div class="d-flex flex-column justify-content-center gap-8 w-100 max-w-xl flex-grow-1">
    <p class="text-xl">Let's have a conversation</p>
    <div id="conversation-container" class="d-flex flex-column gap-4 w-100 overflow-auto px-4 custom-scrollbar" style="max-height: 224px;">
        <?php if($totalAnswred > 0): foreach ($currentShortData['selected_option_id'] as $index => $option): ?>
            <?= $this->element('Quiz-view/Elements/chat-message', ['msg' => $questions[$index]['question']]); ?>
            <?= $this->element('Quiz-view/Elements/chat-message', ['dir' => 'r' ,'msg' => $option['qoption']]); ?>
        <?php
            endforeach;
            if (!$isDone):
                echo $this->element('Quiz-view/Elements/chat-message', ['msg' => $questions[$totalAnswred]['question']]);
            endif;
            else:
        ?>
            <?= $this->element('Quiz-view/Elements/chat-message', ['msg' => $questions[0]['question']]); ?>
        <?php endif; ?>
    </div>
</div>

<?php if (!$isDone): ?>
<div id="conversation-footer" class="d-flex justify-content-between align-items-center gap-6 mb-12 p-6 border shadow-md w-100 rounded-lg flex-shrink-0">
    <p class="color-primary text-base fw-semibold flex-shrink-0">Your Turn: </p>
    <p id="clickable-option" data-option-id="<?= $options[$totalAnswred]['id'] ?>" class="bg-accent text-base border btn-responsive text-center"><?= $options[$totalAnswred]['qoption'] ?></p>
    <?= $this->Form->create(null, [
    'url' => ['controller' => 'Quizs', 'action' => 'checkVoice'],
    'id' => 'short-answer-form',
    'method' => 'post',
    'class' => 'd-flex justify-content-center'
    ]) ?>
    <button type="button" id="recordButton" class="btn btn-primary p-0 flex-shrink-0" style="height: 3rem; width: 3rem;">
        <?= $this->element('icons/start-record', ['class' => 'h-6 w-6']); ?>
    </button>
    <?= $this->Form->end() ?>
</div>
<?php endif; ?>

<script>
    $(document).ready(function() {
        let recognition;
        var conversationContainer = $('#conversation-container');
        const options = <?= json_encode($options) ?>;
        const questions = <?= json_encode($questions) ?>;

        function cleanText(text) {
            return text.replace(/[.,\/#!$%\^&\*;:{}=\-_`~()]/g, "").toLowerCase().trim();
        }

        function activateRecordAnimation(){
            const newContent = `<span class="record-icon record-icon--sm"></span>`;
            $('#recordButton').html(newContent);
        }

        function desactivateRecordAnimation(){
            const newContent = ` <?= $this->element('icons/start-record', ['class' => 'h-6 w-6']); ?>`;
            $('#recordButton').html(newContent);
        }

        function startRecording() {
            activateRecordAnimation();
            if (!recognition) {
                if ('SpeechRecognition' in window || 'webkitSpeechRecognition' in window) {
                    recognition = new(window.SpeechRecognition || window.webkitSpeechRecognition)();
                    recognition.lang = 'en-US';

                    recognition.onresult = function(event) {
                        let correctAnswer = $('#clickable-option').text();
                        const transcript = event.results[0][0].transcript;
                        const cleanedTranscript = cleanText(transcript);
                        const cleanedAnswer = cleanText(correctAnswer);
                        console.log(cleanedTranscript, cleanedAnswer)

                        if (cleanedTranscript === cleanedAnswer) {
                            desactivateRecordAnimation();
                            sendResultToController(true);
                        } else {
                            $('#incorrectSound').delay(50).get(0).play();
                            desactivateRecordAnimation();
                        }

                    };

                    recognition.onerror = function(event) {
                        alert('Speech recognition error: ' + event.error);
                        desactivateRecordAnimation();
                        $('#incorrectSound').delay(50).get(0).play();
                        recognition = null;
                    };

                    recognition.onend = function() {
                        desactivateRecordAnimation()
                        recognition = null;
                    };

                    recognition.start();
                } else {
                    alert('Speech recognition is not supported in this browser.');
                }
            } else {
                console.log('Microphone access is already granted.');
            }
        }

        function sendResultToController(isCorrect) {
            event.preventDefault();

            var form = $('#short-answer-form');
            var data = form.serialize();
            data += '&id=' + $('#clickable-option').data('option-id');
            data += '&isCorrect=' + isCorrect;
            data += '&multiLength=' +  options.length ;
            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: data,
                dataType: 'json', 
                success: function(response) {
                  
                    if (response.isCorrect) {
                        
                        conversationContainer.animate({
                            scrollTop: conversationContainer[0].scrollHeight
                        }, 'smooth');

                        if (response.nextOption ) {
                            $('#clickable-option').html(response.nextOption['qoption']).attr('data-option-id', response.nextOption['id'])
                        } else {
                            $('#conversation-footer').addClass('invisible')
                            $('#quizzes-section').append(response.answerAlert);
                            if (response.navigable) (
                                $('#btnScrollDown').removeClass('disabled').attr('disabled', false)
                            )
                        }
                        conversationContainer.append(response.chatElement)
                        if (response?.chatBotElement) {
                            conversationContainer.append(response.chatBotElement)
                        }
                        $('#correctSound').delay(50).get(0).play();
                    }
                },
                error: function() {
                    console.error('AJAX error');
                }
            });
        }

        $('#recordButton').on('click', function () {
            startRecording();
        })

        function stopRecording() {
            if (recognition) {
                recognition.stop();
            }
        }
    })
</script>