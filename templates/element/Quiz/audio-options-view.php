<div class="header">
    <div class="container-loading ">
        <input type="radio" class="radio" name="progress" value="five" id="five" checked>
        <input type="radio" class="radio" name="progress" value="twentyfive" id="twentyfive">
        <input type="radio" class="radio" name="progress" value="fifty" id="fifty">
        <input type="radio" class="radio" name="progress" value="seventyfive" id="seventyfive">
        <input type="radio" class="radio" name="progress" value="onehundred" id="onehundred">

        <div class="progress">
            <div class="progress-bar"></div>
        </div>
    </div>
</div>

<div class="body">

    <section id="section-1">

        <div class="container">
            <div class="row">
                <h1 class="title quiz-title-2">
                    Read and Repeat Correctly !</h1>
            </div>
            <div class="row">
                <div class="content">
                    <div class="conversation" style="margin-left: 10%;">
                        <div class="avatar-container">
                            <?php echo $this->element('icons/avatar'); ?>
                        </div>
                        <div class="speech-container">
                            <h2 class="question-cat"><?= $questions[0]['question'] ?> <?php echo $this->element('icons/listen'); ?> </h2>
                        </div>
                    </div>

                </div>

                <div class="options">
                    <div id="recording-status" style="display: none; color:rgb(147, 211, 51, 1);text-align:center; font-weight: bold;">
                        Recording...</div>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
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

    </section>



</div>

<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="wrong-alert">
                    <?php echo $this->element('icons/wrong'); ?>
                    <h3 class="correct-title correct-icon-btn">That didn’t sound quite right! <br> <span
                            style="font-size: 11px;font-weight: 300;">Try again!</span>
                </div>
                <div class="correct-alert">
                    <?php echo $this->element('icons/correct'); ?>
                    <h3 class="correct-title correct-icon-btn">
                        That's correct !</h3>
                </div>

                <button id="skip" class="btn-skip skip-event">Skip</button>
            </div>

            <div class="col-6"><button id="check" class="btn-next next">Check</button><button id="continue"
                    class="btn-next next">continue</button></div>
        </div>
    </div>
</div>




<script>
$(".wrong-alert").hide();
$(".correct-alert").hide();
$('#continue').hide();
$('#correct').hide();
$('#wrong').hide();
$('#check').prop('disabled', true).css('opacity', '0.2');
let recognition;
const transcriptionDiv = $('#transcription');
const recordingStatus = $('#recording-status');
const correctAnswer = "<?= $questions[0]['question'] ?>";
let selectedVoice;

// Function to remove punctuation from a string
function cleanText(text) {
    return text.replace(/[.,\/#!$%\^&\*;:{}=\-_`~()]/g, "").toLowerCase().trim();
}


function startRecording() {
    if (!recognition) {
        if ('SpeechRecognition' in window || 'webkitSpeechRecognition' in window) {
            recognition = new(window.SpeechRecognition || window.webkitSpeechRecognition)();
            recognition.lang = 'en-US'; // Set recognition language to US English

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
                recordingStatus.hide(); // Hide recording status when result is received
            };

            recognition.onerror = function(event) {
                console.error('Speech recognition error:', event.error);
                alert('Speech recognition error: ' + event.error);
                recordingStatus.hide(); // Hide recording status on error
            };

            recognition.onend = function() {
                console.log('Speech recognition ended.');
                recognition = null; // Reset recognition object to allow subsequent use
                recordingStatus.hide(); // Hide recording status when recognition ends
            };

            recognition.start();
            console.log('Speech recognition started.');
            recordingStatus.show(); // Show recording status
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
        recordingStatus.hide(); // Hide recording status when stopped
    } else {
        alert('No active recording session.');
    }
}

$(document).ready(function(event) {
    // Populate the voice list when the voices change
    populateVoiceList();
    if (typeof speechSynthesis !== 'undefined' && speechSynthesis.onvoiceschanged !== undefined) {
        speechSynthesis.onvoiceschanged = populateVoiceList;
    }



    // Move item from answers to options
    $('.answers').on('click', 'li', function() {
        var selectedOption = $(this).text();
        $(this).remove(); // Remove from answers
        $('.options ol').append('<li>' + selectedOption + '</li>'); // Append to options

        // Remove selected option from the variable
        var index = selectedOptions.indexOf(selectedOption);
        if (index !== -1) {
            selectedOptions.splice(index, 1);
        }

        console.log(selectedOptions);
    });


});
</script>

<?php echo $this->element('Quiz/quiz-style'); ?>
<style>
    .question-cat {
    font-size: 18px;
    font-weight: 700;
    border: 2px solid #C0D3F8;
    padding: 4%;
    width: 208px;
    border-radius: 6%;
    background-color: #C0D3F9;
}
</style>