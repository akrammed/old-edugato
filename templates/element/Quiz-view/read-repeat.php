<?php
    function getDefaultclass($selected, $correct) {
        $class = !!$selected ? ' cursor' : ' cursor-pointer';
        if ($selected) {
            $class.= $correct ? ' btn-correct' : ' btn-incorrect';
        }
        return $class;
    }
?>
<?= $this->element('icons/record-animation'); ?>
<div class="d-flex flex-column gap-4">
    <p class="text-xl"><?= $question; ?></p>
    <div class="d-flex align-items-center justify-content-center gap-4">
        <?= $this->element('icons/avatar'); ?>
        <div class="bg-primary/30 px-4 py-2 rounded-xl d-flex align-items-center gap-1">
            <p class="text-base"><?= $options[1]->qoption; ?></p>
            <button class="btn-reset ms-1 mb-0.5"><?= $this->element('icons/volume-up-icon', ['class' => 'w-5 h-5']) ?></button>
            <button class="btn-reset mb-0.5"><?= $this->element('icons/speed-test-icon', ['class' => 'w-5 h-5']) ?></button>
        </div>
    </div>
</div>
<?= $this->Form->create(null, [
    'url' => ['controller' => 'Quizs', 'action' => 'checkVoice'],
    'id' => 'short-answer-form',
    'method' => 'post',
    'class' => 'w-100 d-flex justify-content-center'
]) ?>
<button id="recordButton" type="button" <?= isset($currentShortData['selected_option_id']) ? 'disabled="disabled"' : '' ?> class="btn btn-primary p-0 mt-8<?= getDefaultclass($currentShortData['selected_option_id'], $currentShortData['correct_option_id']); ?>" style="height: 4.5rem; width: 4.5rem;">
    <?= $this->element('icons/start-record'); ?>
</button>
<?= $this->Form->end() ?>

<script>
    $(document).ready(function() {
        let recognition;
        let selectedVoice;
        const correctAnswer = <?= json_encode($options[1]->qoption) ?>;
        const optionId = <?= json_encode($options[1]['id']) ?>;

        function cleanText(text) {
            return text.replace(/[.,\/#!$%\^&\*;:{}=\-_`~()]/g, "").toLowerCase().trim();
        }

        function activateRecordAnimation(){
            const newContent = `<span class="record-icon"></span>`;
            $('#recordButton').html(newContent);
        }

        function desactivateRecordAnimation(){
            const newContent = `<?= $this->element('icons/start-record'); ?>`;
            $('#recordButton').html(newContent);
        }

        function sendResultToController(isCorrect) {
            event.preventDefault();

            var form = $('#short-answer-form');
            var data = form.serialize();
            data += '&id=' + optionId;
            data += '&isCorrect=' + isCorrect;

            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: data,
                dataType: 'json', 
                success: function(response) {
                    if (response.navigable) (
                        $('#btnScrollDown').removeClass('disabled').attr('disabled', false)
                    )
                    if (response.isCorrect) {
                        $('#recordButton').addClass("btn-correct").attr('disabled', true);
                        $('#correctSound').delay(50).get(0).play();
                    } else {
                        $('#recordButton').addClass("btn-incorrect").attr('disabled', true);
                        $('#incorrectSound').delay(50).get(0).play();
                    }
                    $('#quizzes-section').append(response.answerAlert);
                },
                error: function() {
                    console.error('AJAX error');
                }
            });
        }

        function startRecording() {
            activateRecordAnimation();
            if (!recognition) {
                if ('SpeechRecognition' in window || 'webkitSpeechRecognition' in window) {
                    recognition = new(window.SpeechRecognition || window.webkitSpeechRecognition)();
                    recognition.lang = 'en-US';

                    recognition.onresult = function(event) {
                        const transcript = event.results[0][0].transcript;
                        const cleanedTranscript = cleanText(transcript);
                        const cleanedAnswer = cleanText(correctAnswer);

                        if (cleanedTranscript === cleanedAnswer) {
                            desactivateRecordAnimation();
                            sendResultToController(true);
                        } else {
                            desactivateRecordAnimation();
                            sendResultToController(false);
                        }

                    };

                    recognition.onerror = function(event) {
                        alert('Speech recognition error: ' + event.error);
                        desactivateRecordAnimation();
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

