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
                <h1 class="title">Read and Repeat Correctly !</h1>
            </div>
            <div class="row">
                <div class="content">
                    <div class="conversation">
                        <div class="avatar-container">
                            <?= $this->Html->image('avatar1.png', ['class' => 'avatar-img']) ?>
                        </div>
                        <div class="speech-container">
                            <h2><?= $questions[0]['question'] ?> </h2>
                        </div>
                    </div>

                </div>
                <div class="answers">
                <div id="recording-status" style="display: none; color:rgb(147, 211, 51, 1);; font-weight: bold;">Recording...</div>
                    <div id="transcription"></div>
                    <div class="container">
                    <div class="row">
                        <div class="col-sm-6"><button class="btn-next next" onclick="startRecording()">Start
                                Recording</button></div>
                        <div class="col-sm-6"><button class="btn-skip" onclick="stopRecording()">Stop Recording</button>
                        </div>
                    </div>
                    </div>
                   
                  
                </div>



            </div>
        </div>

    </section>
    <section id="section-2">


    </section>
    <section id="section-3">


    </section>



</div>

<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="wrong-alert">
                    <?= $this->Html->image('wrong.svg', ['alt' => 'textalternatif']) ?>
                    <div id="correct-answers"></div>
                </div>
                <div class="correct-alert">
                    <?= $this->Html->image('correct.svg', ['alt' => 'textalternatif']) ?>
                    <img src="correct.svg" alt="">
                    <h3 style="margin-left: 6%;" class="correct-title">Good Job !</h3>
                </div>


            </div>


        </div>
    </div>
</div>


<script>
let recognition;
const transcriptionDiv = $('#transcription');
const recordingStatus = $('#recording-status');
const correctAnswer = "<?= $questions[0]['question'] ?>";
let selectedVoice;

// Function to remove punctuation from a string
function cleanText(text) {
    return text.replace(/[.,\/#!$%\^&\*;:{}=\-_`~()]/g, "").toLowerCase().trim();
}

// Function to populate the list of available voices and select a preferred female voice
function populateVoiceList() {
    const voices = window.speechSynthesis.getVoices();
    const preferredVoices = ['Google US English Female', 'Microsoft Zira Desktop - English (United States)'];

    selectedVoice = voices.find(voice => preferredVoices.includes(voice.name));

    if (!selectedVoice) {
        selectedVoice = voices.find(voice => voice.name.includes('Female') || voice.name.includes('Zira'));
    }

    if (!selectedVoice && voices.length > 0) {
        selectedVoice = voices[0]; // Fallback to the first available voice
    }
}

function speakText(message) {
    const utterance = new SpeechSynthesisUtterance(message);
    utterance.lang = 'en-US'; // Set language to US English
    utterance.pitch = 3; // Adjust pitch for a more human-like voice
    utterance.rate = 0.8; // Adjust rate for a more human-like voice

    if (selectedVoice) {
        utterance.voice = selectedVoice;
    }

    utterance.onerror = function(event) {
        console.error('Speech synthesis error:', event.error);
        alert('Speech synthesis error: ' + event.error);
    };

    utterance.onend = function() {
        console.log('Speech synthesis ended.');
    };

    window.speechSynthesis.speak(utterance);
    console.log('Speech synthesis started.');
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
                    $(".correct-alert").show();
                    $(".wrong-alert").hide();
                    $('#onehundred').prop('checked', true);
                } else {
                    $(".correct-alert").hide();
                    $(".wrong-alert").show();
                    $('#five').prop('checked', true);
                    $('.footer').css('background-color', 'rgb(32 47 54)');
                    $('#next').css('background-color', 'rgb(216,72,72,1)');
                    $('#correct-answers').html(
                        '<h3 style="margin-left: 6%;" class="wrong-title">The correct answer is: ' +
                        correctAnswer + '</h3>');
                    speakText("That was not the correct answer. The correct answer is : " + correctAnswer);
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

    $("#draggable").draggable();
    $(".wrong-alert").hide();
    $(".correct-alert").hide();

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

    $('#next').on('click', function(e) {
        e.preventDefault();

        if (1) { // You might want to replace this condition with a real check
            $('#skip').hide();
            $(".correct-alert").show();
            $(".wrong-alert").hide();
            $('#onehundred').prop('checked', true);
        } else {
            $('#skip').hide();
            $(".correct-alert").hide();
            $(".wrong-alert").show();
            $('#five').prop('checked', true);
            $('.footer').css('background-color', 'rgb(32 47 54)');
            $(this).css('background-color', 'rgb(216,72,72,1)');
            $('#correct-answers').html(
                '<h3 style="margin-left: 6%;" class="wrong-title">The correct answer is: ' +
                correctAnswer + '</h3>');
            speakText("The correct answer was " + correctAnswer);
        }
    });
});
</script>

<style>
body {
    background-color: rgb(19, 31, 36)
}

.container-loading {
    margin: 60px auto;
    width: 400px;
    text-align: center;
}

.container-loading .progress {
    margin: 0 auto;
    width: 400px;
}

.progress {
    padding: 4px;
    background: rgba(0, 0, 0, 0.25);
    border-radius: 6px;
    -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.25), 0 1px rgba(255, 255, 255, 0.08);
    box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.25), 0 1px rgba(255, 255, 255, 0.08);
}

.progress-bar {
    height: 16px;
    border-radius: 4px;
    background-image: -webkit-linear-gradient(top, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.05));
    background-image: -moz-linear-gradient(top, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.05));
    background-image: -o-linear-gradient(top, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.05));
    background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.05));
    -webkit-transition: 0.4s linear;
    -moz-transition: 0.4s linear;
    -o-transition: 0.4s linear;
    transition: 0.4s linear;
    -webkit-transition-property: width, background-color;
    -moz-transition-property: width, background-color;
    -o-transition-property: width, background-color;
    transition-property: width, background-color;
    -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, 0.25), inset 0 1px rgba(255, 255, 255, 0.1);
    box-shadow: 0 0 1px 1px rgba(0, 0, 0, 0.25), inset 0 1px rgba(255, 255, 255, 0.1);
}


#five:checked~.progress>.progress-bar {
    width: 5%;
    background-color: #86e01e;
}

#twentyfive:checked~.progress>.progress-bar {
    width: 25%;
    background-color: #86e01e;
}

#fifty:checked~.progress>.progress-bar {
    width: 50%;
    background-color: #86e01e;
}

#seventyfive:checked~.progress>.progress-bar {
    width: 75%;
    background-color: #86e01e;
}

#onehundred:checked~.progress>.progress-bar {
    width: 100%;
    background-color: #86e01e;
}

.radio {
    display: none;
}

.label {
    display: inline-block;
    margin: 0 5px 20px;
    padding: 3px 8px;
    color: #aaa;
    text-shadow: 0 1px black;
    border-radius: 3px;
    cursor: pointer;
}

.radio:checked+.label {
    color: white;
    background: rgba(0, 0, 0, 0.25);
}

.footer {
    border-top: 1px solid white;
    padding: 20px 0;
    position: fixed;
    bottom: 0;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.container {
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
}

.btn-skip,
.btn-next {
    padding: 10px 20px;
    background-color: rgb(147, 211, 51, 1);
    color: #fff;
    border: none;
    border-radius: 5px;
    width: 172px;
    cursor: pointer;
    margin-top: 4%;
}


.btn-skip {
    background-color: transparent;
    border: 2px solid rgb(55, 70, 79, 1);
    margin-right: auto;
}

.btn-next {
    display: block;
    margin-left: auto;
}

.line {
    color: white;
}

.title {
    color: white;
    text-align: center;
}

.content {
    color: white;
    text-align: center;
    border-bottom: 1px solid white;
}

.content {
    text-align: center;
    /* Center align the content */
}

.conversation {
    display: flex;
    align-items: center;
    /* Align items vertically */
}

.avatar-container {
    margin-right: 20px;
    /* Adjust spacing between avatar and speech */
}

.avatar-img {
    width: 100px;
    /* Adjust size as needed */
    height: auto;
    /* For circular avatars */
}

.speech-container {
    background-color: rgb(55, 70, 79, 1);
    border-radius: 10px;
    color: ;
    padding: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    /* Optional: Add a shadow */
}

/* Style the speech text */
.speech-container h2 {
    margin: 0;
    /* Remove default margin */
}

.answers {
    border-bottom: 1px solid white;
    margin-top: 5%;
    color: white;

}

.options {
    margin-top: 4%;
}

.answers ol,
.options ol {
    list-style-type: none;
    /* Remove default list styles */
    padding: 0;
    /* Remove default padding */
    margin: 0;
    /* Remove default margin */
    display: flex;
    /* Use flexbox */
}

.answers li,
.options li {
    margin-right: 10px;
    /* Adjust spacing between list items */
}

/* Optional: Adjust styling of list items */
.answers li,
.options li {
    background-color: rgb(55, 70, 79, 1);
    border-radius: 10px;
    padding: 10px;
    color: white;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    cursor: pointer;
}

.wrong-alert {
    display: flex;
    align-items: center;
    color: rgb(216 72 72);
    margin-left: 5%;
}

.correct-alert {
    display: flex;
    align-items: center;
    color: rgb(121, 185, 51, 1);
    margin-left: 5%;
}

.correct-alert img,
.wrong-alert img {
    display: block;
    margin: 8px 0 0 10px;
}

.alert {
    background: rgb(19, 31, 36, 1);
    border-radius: 98px;
    display: block;
    float: left;
    height: 80px;
    width: 80px;
}
</style>