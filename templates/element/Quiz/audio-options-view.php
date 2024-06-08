<?php echo $this->element('Quiz/Elements/header'); ?>
<?php echo $this->element('Quiz/Style/progress-bar'); ?>
<?php echo $this->element('Quiz/Style/quiz-view-style'); ?>
<div class="body">

    <section id="section-1">

        <div class="container">
            <div class="row quiz-title-row">
                <h1 class="title quiz-title">
                    Read and Repeat Correctly !</h1>
            </div>
            <div class="row">
                <div class="content">
                    <div class="conversation">
                        <div class="avatar-container">
                            <?php echo $this->element('icons/avatar'); ?>
                            <h2 class="avatar-question"><?= $questions[0]['question'] ?> </h2>
                        </div>
                    </div>
                </div>

                <div class="options">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="options">
                                    <?php echo $this->element('icons/record-animation'); ?>
                                    <div id="start" style="display: grid;cursor:pointer;
    justify-content: center;" onclick="startRecording()"><?php echo $this->element('icons/start-record'); ?></div>
                                    <div id="correct" style="display: grid;cursor:pointer;
    justify-content: center;" onclick="startRecording()"><?php echo $this->element('icons/correct-record'); ?></div>
                                    <div id="wrong" style="display: grid;cursor:pointer;
    justify-content: center;" onclick="startRecording()"><?php echo $this->element('icons/wrong-record'); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>



</div>


<?php echo $this->element('Quiz/Elements/footer'); ?>
<?php echo $this->element('Quiz/Scripts/globalFunctionQuizView'); ?>

<script>
$(".wrong-alert").hide();
$(".correct-alert").hide();
$('#continue').hide();
$('#recording-status').hide();
$('#correct').hide();
$('#wrong').hide();
$('#check').prop('disabled', true).css('opacity', '0.2');
let recognition;
const transcriptionDiv = $('#transcription');
const recordingStatus = $('#recording-status');
const correctAnswer = "<?= $questions[0]['question'] ?>";
let selectedVoice;

function cleanText(text) {
    return text.replace(/[.,\/#!$%\^&\*;:{}=\-_`~()]/g, "").toLowerCase().trim();
}


function startRecording() {
    if (!recognition) {
        if ('SpeechRecognition' in window || 'webkitSpeechRecognition' in window) {
            recognition = new(window.SpeechRecognition || window.webkitSpeechRecognition)();
            recognition.lang = 'en-US';

            recognition.onresult = function(event) {
                const transcript = event.results[0][0].transcript;
                transcriptionDiv.text(transcript);

                const cleanedTranscript = cleanText(transcript);
                const cleanedAnswer = cleanText(correctAnswer);

                if (cleanedTranscript === cleanedAnswer) {

                    $('#start').hide();
                    $('#wrong').hide();
                    $('#correct').show();
                    $('#skip').hide();
                    $(".correct-alert").show();
                    $(".wrong-alert").hide();
                    $('#onehundred').prop('checked', true);
                    $('.footer').css('background-color', '#E1FCDE');
                    $('#check').hide();
                    $('#continue').show();
                } else {
                    $('#start').hide();
                    $('#correct').hide();
                    $('#wrong').show();
                    $('#check').hide();
                    $('#continue').show();
                    $('#continue').css('color', '#B1000F');
                    $('#continue').css('border-color', '#B1000F');
                    $('#skip').hide();
                    $(".correct-alert").hide();
                    $(".wrong-alert").show();
                    $('#five').prop('checked', true);
                    $('.footer').css('background-color', '#FFD4D8')
                    $(this).css('background-color', 'rgb(216,72,72,1)');
                    $(".wrong-alert").show();
                    $('#correct-answers').html(
                        '<h3 style="margin-left: 6%;" class="wrong-title">That didn’t sound quite right! <br> <span  style="font-size: 11px;font-weight: 300;">Try again!</span></h3>'
                    );
                }
                recordingStatus.hide();
            };

            recognition.onerror = function(event) {
                console.error('Speech recognition error:', event.error);
                alert('Speech recognition error: ' + event.error);
                recordingStatus.hide();
            };

            recognition.onend = function() {
                console.log('Speech recognition ended.');
                recognition = null;
                recordingStatus.hide();
            };

            recognition.start();
            console.log('Speech recognition started.');
            recordingStatus.show();
        } else {
            alert('Speech recognition is not supported in this browser.');
        }
    } else {
        alert('Microphone access is already granted.');
    }
}

function stopRecording() {
    if (recognition) {
        recognition.stop();
        console.log('Speech recognition stopped.');
        recordingStatus.hide();
    } else {
        alert('No active recording session.');
    }
}
</script>

<style>
/**override css */
.avatar-question {
    font-size: 16px;
    margin-top: 3%;
    font-weight: 600;
    margin-left: 2%;
    border: 2px solid #C0D3F9;
    padding: 1%;
    background-color: #C0D3F9;
    border-radius: 7%;
    height: 41px;
}

.options {
    height: 200px;
    display: grid;
    align-items: center;
}
</style>