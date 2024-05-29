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
                    Choose the correct answer</h1>
            </div>
            <div class="row">
                <div class="content">
                    <div class="conversation" style="margin-left: 10%;">
                        <div class="avatar-container">
                            <?php echo $this->element('icons/avatar'); ?>
                        </div>
                        <div class="speech-container">
                            <h2 class="question-cat"><?= $questions[0]['question'] ?> </h2>
                        </div>
                    </div>

                </div>
                <div class="answers">
                    <ol>
                    </ol>
                </div>
                <div class="options">
                    <ol>
                        <?php
    $optionsList = [];      
    $correctOptions = [];      
    $i = 0;
    foreach ($options as $key => $value) {?>

                        <li id="<?=  $value->id ?>">
                            <?=  $value['qoption'] ?>
                        </li>
                        <?php
        $i++;
        if ($value->is_correct) {
            array_push($correctOptions , $value['qoption']);
        }
        array_push($optionsList , $value['qoption']);
    }
    


  ?>


                    </ol>
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
                    <h3 class="correct-title correct-icon-btn">
                        correct answer : <br> <span class="wrong-answer-2"></span></h3>
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
$(document).ready(function(event) {
    $("#draggable").draggable();
    $(".wrong-alert").hide();
    $(".correct-alert").hide();
    $('#continue').hide();
    var selectedOptions = []; // Variable to store selected options as sentences
    $('#check').prop('disabled', true).css('opacity', '0.2');

    // Move item from options to answers
    $('.options').on('click', 'li', function() {
        var selectedOption = $(this).text().trim(); // Trim leading and trailing whitespace
        var selectedId = $(this).attr('id');
        $('#check').prop('disabled', false).css('opacity', '1');
        // Remove from options
        $(this).text('');
        $(this).css('background-color', '#FFFFFF');

        if (selectedOption !== '') {
            $('.answers ol').append('<li id="' + selectedId + '">' + selectedOption +
                '</li>'); // Append to answers
            selectedOptions.push(selectedOption);
        }
        // Add selected option to the variable
        console.log(selectedOptions);
    });


    // Move item from answers to options
    $('.answers').on('click', 'li', function() {
        var selectedOption = $(this).text();
        var selectedId = $(this).attr('id');
        console.log(selectedId);
        $(this).remove();
        $('#' + selectedId).css('background-color', '#7F77FF');
        // Correct the selector to use the ID
        $('#' + selectedId).text(selectedOption);

        // Remove selected option from the variable
        var index = selectedOptions.indexOf(selectedOption);
        if (index !== -1) {
            selectedOptions.splice(index, 1);
        }

        console.log(selectedOptions);
    });


    $('#check').on('click', function(e) {
        e.preventDefault();
        selectedOptions = selectedOptions.map(function(element) {
            return String(element);
        });
        var correctAnswer = <?php echo json_encode($correctOptions); ?>;
        correctAnswer = correctAnswer.map(function(element) {
            return String(element);
        });
        correctAnswer.sort();
        selectedOptions.sort();

        var arraysEqual = true;
        if (correctAnswer.length !== selectedOptions.length) {
            arraysEqual = false;
        } else {
            for (var i = 0; i < correctAnswer.length; i++) {
                if (correctAnswer[i] !== selectedOptions[i]) {
                    arraysEqual = false;
                    break;
                }
            }
        }
        if (arraysEqual) {
            $('#skip').hide();
            $(".correct-alert").show();
            $(".wrong-alert").hide();
            $('#onehundred').prop('checked', true);
            $('.footer').css('background-color', '#E1FCDE');
            $('#check').hide();
            $('#continue').show();
        } else {
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
            $('.wrong-answer-2').text(correctAnswer.sort());
        }

    });






});
</script>

<style>
body {
    background-color: #F6F8FB !important;
}

.question-cat {
    font-size: 18px;
    font-weight: 700;
}

.container-loading {
    margin: 60px auto;
    width: 400px;
    text-align: center;
    margin-bottom: 2%;
}

.container-loading .progress {
    margin: 0 auto;
    width: 600px;
    margin-left: -26%;
    margin-top: -5%;
    height: 17px;
    background-color: #ECEFF4 !important;
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
    margin-top: -0.5%;
    background-color: #5C17E5;
    margin-left: 0%;
}

#twentyfive:checked~.progress>.progress-bar {
    width: 25%;
    margin-top: -0.5%;
    background-color: #5C17E5;
    margin-left: 0%;
}

#fifty:checked~.progress>.progress-bar {
    width: 50%;
    margin-top: -0.5%;
    background-color: #5C17E5;
    margin-left: 0%;
}


#seventyfive:checked~.progress>.progress-bar {
    width: 75%;
    margin-top: -0.5%;
    background-color: #5C17E5;
    margin-left: 0%;
}

#onehundred:checked~.progress>.progress-bar {
    width: 100%;
    margin-top: -0.5%;
    background-color: #5C17E5;
    margin-left: 0%;
}


#continue {
    background-color: rgb(255, 255, 255);
    color: rgb(1, 106, 28);
    border: 2px solid rgb(1, 106, 28);
    margin-top: 4%;
    width: 30%;
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
    height: 70px;
    border-top: 3px solid #ECEFF4;
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
    background-color: transparent;
    border: 2px solid black;
    margin-right: auto;
    color: black;
    width: 72px;
    border-radius: 16%;
    height: 44px;
    margin-top: 2%;
}

.btn-skip {
    background-color: transparent;
    border: 3px solid #525E6F;
    margin-right: auto;
}



.btn-next {
    display: block;
    margin-left: 78%;
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
    border-bottom: 3px solid #ECEFF4;
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
    color: black;
    padding: 10px;
    /* Optional: Add a shadow */
}

/* Style the speech text */
.speech-container h2 {
    margin: 0;
    /* Remove default margin */
}

.answers {
    border-bottom: 3px solid #ECEFF4;
    margin-top: 5%;
    color: white;
    height: 47px;

}

.options {
    margin-top: 4%;
}

.answers ol,
.options ol {
    list-style-type: none;
    padding: 0;
    margin: 0;
    display: flex;
    margin-left: 10%;
}

.answers li,
.options li {
    margin-right: 10px;
    /* Adjust spacing between list items */
}

/* Optional: Adjust styling of list items */
.answers li,
.options li {
    background-color: #7F77FF;
    border-radius: 10px;
    padding: 10px;
    color: white;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    cursor: pointer;
    width: 105px;
    text-align: center;
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

.quiz-title-2 {
    margin-left: -11%;
    color: black;
    font-size: 24px;
    font-weight: 700;
    margin-top: 3%;
    margin-bottom: 4%;
}

.correct-icon-btn {
    margin-left: 6%;
    width: 252px;
    font-size: 16px;
    font-weight: 700;

}




@media only screen and (min-width: 769px) {
    .container-loading .progress {
        margin: 0 auto;
        width: 183%;
        margin-left: -44%;
        margin-top: -5%;
        height: 17px;
        background-color: #ECEFF4 !important;
    }

    .quiz-title-2 {
        margin-left: -10%;
        color: black;
        font-size: 24px;
        font-weight: 700;
        margin-top: 3%;
        margin-bottom: 4%;
    }


    .btn-next {
        display: block;
        margin-left: 78%;
    }

    .btn-skip {
        margin-left: 6%;
    }

    .answers ol {
        list-style-type: none;
        padding: 0;
        margin: 0;
        display: flex;
        margin-left: 5%;
    }

    .content {
        text-align: center;
        width: 72%;
        margin-left: 10%;
    }

    .answers {
        border-bottom: 3px solid #ECEFF4;
        margin-top: 5%;
        color: white;
        width: 72%;
        height: 47px;
        margin-left: 10%;
    }

    .options ol {
        list-style-type: none;
        padding: 0;
        margin: 0;
        display: flex;
        margin-left: 14%;
    }


    #continue {
        background-color: rgb(255, 255, 255);
        color: rgb(1, 106, 28);
        border: 2px solid rgb(1, 106, 28);
        margin-top: 3.5%;
        width: 22%;
        margin-left: 72%;
    }

    .correct-icon-btn {
        margin-left: 1%;
        width: 252px;
        font-size: 16px;
        font-weight: 700;
        margin-top: 2%;
    }
}

@media only screen and (max-width: 768px) {
    .question-cat {
        font-size: 15px;
        font-weight: 700;
    }

    .content {
        color: white;
        text-align: center;
        width: 76%;
        border-bottom: 3px solid #ECEFF4;
        margin-left: 10%;
    }

    .icon-alert {
        width: 56%;

    }

    .container-loading .progress {
        margin: 0 auto;
        width: 99%;
        margin-left: 1%;
        margin-top: -5%;
        height: 17px;
        background-color: #ECEFF4 !important;
    }

    .options ol {
        list-style-type: none;
        padding: 0;
        margin: 0;
        display: flex;
        margin-left: 7%;
    }

    .answers li,
    .options li {
        font-size: 64% !important;
        width: 18%;
    }

    .options {
        margin-top: 4%;
        margin-left: 8%;
    }

    .answers {
        border-bottom: 3px solid #ECEFF4;
        margin-top: 5%;
        color: white;
        height: 47px;
        width: 79%;
        margin-left: 9%;
    }

    .quiz-title-2 {
        margin-left: -9%;
        color: black;
        font-size: 16px;
        font-weight: 700;
        margin-top: 3%;
        margin-bottom: 4%;
    }

    .answers ol,
    .options ol {
        list-style-type: none;
        padding: 0;
        margin: 0;
        display: flex;
        margin-left: 2%;
    }


    .answers li,
    .options li {
        font-size: 77%;
    }

    .btn-skip {
        margin-left: 15%;
    }

    .btn-next {
        margin-left: 44%;
    }

    .container-loading {
        margin: 60px auto;
        width: 374px;
        text-align: center;
        margin-bottom: 2%;
    }

    .correct-icon-btn {
        margin-left: 6%;
        width: 252px;
        font-size: 15px;
        font-weight: 700;
        margin-top: 7%;
    }

    #continue {
        background-color: rgb(255, 255, 255);
        color: rgb(1, 106, 28);
        border: 2px solid rgb(1, 106, 28);
        margin-top: 9%;
        width: 44%;
    }

}
</style>