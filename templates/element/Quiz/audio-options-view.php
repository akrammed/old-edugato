<?php echo $this->element('Quiz/Elements/header'); ?>
<?php echo $this->element('Quiz/Style/progress-bar'); ?>
<?php echo $this->element('Quiz/Style/quiz-view-style'); ?>
<div class="body">

    <section id="section-1">

        <div class="container">
            <div class="row">
                <div class="content" style="margin-top: 4%;">
                    <div class="conversation">
                        <div class="avatar-container">
                            <?php echo $this->element('icons/avatar'); ?>
                            <?php echo $this->element('icons/talikng-bubbls'); ?>
                            <h2 class="avatar-question"><?= $questions[0]['question'] ?> </h2>
                        </div>
                    </div>
                </div>

                <div class="options">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="options">
                                    <div  style="display: grid;cursor:pointer;
    justify-content: center;" onclick="startRecording()">
                                        <button id="recordButton"
                                            class="record-btn-style"><?php echo $this->element('icons/start-record'); ?>
                                        </button>
                                    </div>
                                    <?php echo $this->element('icons/record-animation'); ?>
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
<?php echo $this->element('Quiz/Elements/sounds-effects'); ?>
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
function activateRecordAnimation(){
    $('#recordButton').empty();
    const newContent = `
            <div class="load-wrapp">
                <div class="load-1" id="recording-status">
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                </div>
            </div>
        `;

    $('#recordButton').html(newContent);
}
function desactivateRecordAnimation(){
    $('#recordButton').empty();
    const newContent = `
            <svg width="33" height="45" viewBox="0 0 33 45" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M17.5 45C17.102 45 16.7206 44.8184 16.4392 44.4952C16.158 44.1717 16 43.7333 16 43.2759V36.7241C16 36.2669 16.158 35.8285 16.4392 35.5051C16.7206 35.1818 17.102 35 17.5 35C17.8978 35 18.2792 35.1818 18.5606 35.5051C18.8418 35.8285 19 36.2669 19 36.7241V43.2715C19.0004 43.4982 18.962 43.723 18.8868 43.9326C18.8118 44.1423 18.7014 44.3329 18.562 44.4936C18.4226 44.654 18.2572 44.7814 18.0748 44.8685C17.8926 44.9554 17.6972 45 17.5 45Z" fill="#F6F8FB"/>
<path d="M16.5072 38C14.3347 37.9954 12.1843 37.5188 10.1788 36.5972C8.17331 35.6756 6.35204 34.327 4.8191 32.6285C3.28613 30.9301 2.07156 28.9152 1.24468 26.6988C0.41782 24.4826 -0.00511763 22.108 4.673e-05 19.7112C0.000337095 19.4863 0.0408021 19.2635 0.119118 19.0557C0.197434 18.848 0.312065 18.6592 0.456501 18.5002C0.600958 18.3414 0.772357 18.2153 0.960929 18.1295C1.14952 18.0435 1.35157 17.9995 1.55558 18C1.75987 18.0005 1.96205 18.0455 2.15056 18.1323C2.33906 18.219 2.51023 18.346 2.65428 18.5057C2.79834 18.6656 2.91249 18.8551 2.99017 19.0635C3.06782 19.2719 3.10752 19.495 3.10698 19.7204C3.10698 21.6607 3.45334 23.5817 4.12637 25.3742C4.79937 27.1667 5.78583 28.7953 7.0294 30.1673C8.27297 31.5392 9.74929 32.6274 11.3741 33.3699C12.999 34.1123 14.7404 34.4944 16.4989 34.4944C18.2577 34.4944 19.9991 34.1123 21.6239 33.3699C23.2487 32.6274 24.725 31.5392 25.9686 30.1673C27.2122 28.7953 28.1986 27.1667 28.8716 25.3742C29.5446 23.5817 29.891 21.6607 29.891 19.7204C29.8908 19.495 29.9308 19.2719 30.0086 19.0637C30.0866 18.8553 30.2011 18.6661 30.3452 18.5064C30.4896 18.3469 30.6609 18.2201 30.8494 18.1336C31.0382 18.0471 31.2402 18.0025 31.4445 18.0021C31.6488 18.0018 31.851 18.046 32.0397 18.132C32.2285 18.2178 32.4 18.3441 32.5443 18.5034C32.6889 18.6624 32.8034 18.8516 32.8816 19.0596C32.9598 19.2676 33 19.4907 33 19.7161C33.0039 24.551 31.2702 29.1905 28.1787 32.6178C25.0871 36.0451 20.8901 37.9806 16.5072 38Z" fill="#F6F8FB"/>
<path d="M16.9969 29C15.8129 28.9976 14.641 28.7426 13.548 28.2496C12.4549 27.7568 11.4624 27.0353 10.6269 26.1268C9.79151 25.2184 9.12961 24.1405 8.67904 22.9549C8.22849 21.7694 7.99808 20.4992 8.00102 19.2171V9.8919C7.98306 8.59995 8.20255 7.31701 8.64671 6.11776C9.0909 4.91851 9.75092 3.8269 10.5883 2.9064C11.4257 1.98589 12.4239 1.25485 13.5245 0.755901C14.6253 0.256954 15.8067 0 17 0C18.1933 0 19.3747 0.256954 20.4755 0.755901C21.5761 1.25485 22.5743 1.98589 23.4116 2.9064C24.2492 3.8269 24.9092 4.91851 25.3533 6.11776C25.7976 7.31701 26.0169 8.59995 25.999 9.8919V19.2217C26.0014 20.5032 25.7706 21.7725 25.32 22.9576C24.8694 24.1425 24.2076 25.2197 23.3724 26.1277C22.5371 27.0357 21.5451 27.7566 20.4527 28.2496C19.36 28.7423 18.1886 28.9974 17.0051 29H16.9969ZM16.9969 3.4614C15.4227 3.46375 13.9137 4.14206 12.8008 5.34756C11.6878 6.55307 11.0619 8.18733 11.0602 9.8919V19.2217C11.0456 20.076 11.1883 20.925 11.4802 21.7188C11.772 22.5127 12.207 23.2356 12.7598 23.8455C13.3127 24.4554 13.9722 24.9397 14.7 25.2703C15.4276 25.6009 16.2088 25.7713 16.998 25.7713C17.7871 25.7713 18.5684 25.6009 19.2961 25.2703C20.0237 24.9397 20.6833 24.4554 21.2361 23.8455C21.789 23.2356 22.2239 22.5127 22.5157 21.7188C22.8076 20.925 22.9504 20.076 22.9357 19.2217V9.8919C22.9341 8.18696 22.308 6.55238 21.1945 5.34681C20.0812 4.14127 18.5714 3.46317 16.9969 3.4614Z" fill="#F6F8FB"/>
</svg>

        `;

    $('#recordButton').html(newContent);
}


function startRecording() {
    activateRecordAnimation();
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
                    desactivateRecordAnimation();
                    correctEvents();
                } else {
                    desactivateRecordAnimation();
                    wrongEvents();
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
.record-btn-style {
    width: 70px;
    height: 70px;
    background-color: #5C17E5;
    border: none;
    border-radius: 16px;
    box-shadow: 0px 0px 10px gray;
}

.options {
    height: 200px;
    display: grid;
    align-items: center;
}
</style>