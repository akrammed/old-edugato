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
                    Listen and select the words !</h1>
            </div>
            <div class="row">
                <div class="content">
                    <div class="conversation" style="margin-left: 10%;">
                        <div class="avatar-container">
                        </div>
                        <div class="speech-container">
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <?php echo $this->element('icons/speacker'); ?>
                                    <audio id="questionAudio"
                                        src="<?php echo $this->Url->build('/img/uploads/audio/'.$questions[0]['question'] ); ?>"></audio>

                                </div>
                            </div>
                        </div>
                    </div>



                </div>

                <div class="answers">
                    <ol class="sortable-list">
                    </ol>
                </div>
                <div class="options">
                    <ol>

                        <?php
$optionsList = []; // Initialize an array to store
$currentList = []; // Initialize an array to store
$optionKeys = [] ;
foreach ($options as $key => $value) {
$optionsList[$key] = [$value['qoption'], 'position' => $value['oorder'] , $value->id] ;
$curretList[$key] = [$value['qoption'], 'position' => $value['oorder'] , $value->id] ;
}

shuffle($optionsList);
?>


                        <?php
    
    $i = 0;
    foreach ($optionsList as $value) { ?>

                        <li data-count="<?=  $value['position'] ?>" id="<?=  $value[1] ?>">
                            <?=  $value[0] ?>
                        </li>
                        <?php
        $i++;
        array_push($optionKeys, $value['position'] );
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
                    <h3 class="correct-title correct-icon-btn">That didn’t sound quite right! <br> <span
                            class="wrong-answer-2" style="font-size: 11px;font-weight: 300;"></span>
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



    $(".wrong-alert").hide();
    $(".correct-alert").hide();
    $('#continue').hide();
    var selectedOptions = [];
    const optionPositions = [];
    $('#check').prop('disabled', true).css('opacity', '0.2');

    $('.speaker').on('click', function() {
        // Get the audio element
        var audio = $('#questionAudio')[0];

        // Check if audio is paused, if so, play it, otherwise pause it
        if (audio.paused) {
            audio.play();
        } else {
            audio.pause();
        }
    });
    // Move item from options to answers
    $('.options').on('click', 'li', function() {
        var selectedOption = $(this).text().trim(); // Trim leading and trailing whitespace
        var selectedId = $(this).attr('id');
        var count = $(this).attr('data-count');
        console.log(count)

        $('#check').prop('disabled', false).css('opacity', '1');
        // Remove from options
        $(this).text('');
        $(this).css('background-color', '#FFFFFF');

        if (selectedOption !== '') {
            $('.answers ol').append('<li class="item" data-count="' + count + '" id="' + selectedId +
                '">' + selectedOption +
                '</li>'); // Append to answers
            optionPositions.push(count);
        }

    });


    // Move item from answers to options
    $('.answers').on('click', 'li', function() {
        var selectedOption = $(this).text();
        var count = $(this).attr('data-count');
        console.log(count)
        var selectedId = $(this).attr('id');
        $(this).remove();
        $('#' + selectedId).css('background-color', '#7F77FF');
        // Correct the selector to use the ID
        $('#' + selectedId).text(selectedOption);
        // Remove selected option from the variable
        var index = optionPositions.indexOf(count);
        if (index !== -1) {
            optionPositions.splice(index, 1);
        }

        console.log(optionPositions);
    });

    var selectedOptions = []; // Variable to store selected options as sentences


    var userInputArray = [];




    function getUnsortedPositions(arr) {
        const unsortedPositions = [];
        if (arr.length === 0) {
            return unsortedPositions;
        }
        for (let i = 0; i < arr.length - 1; i++) {
            const current = arr[i];
            const next = arr[i + 1];

            if (current > next) {
                for (let j = i; j < arr.length; j++) {
                    unsortedPositions.push(j);
                }
                return unsortedPositions;
            }
        }
        return unsortedPositions;
    }

    function isArraySorted(arr) {
        const unsortedPositions = getUnsortedPositions(arr);
        return unsortedPositions.length === 0 ? true : unsortedPositions;
    }


    $('#check').on('click', function(e) {
        e.preventDefault();
        var correctAnswer = <?= json_encode($currentList)?>;
        correctAnswer = correctAnswer.sort().map(option => option[0]).join(' ');
        const unsortedElements = isArraySorted(optionPositions);
        
        if (unsortedElements === true ) {
            $('#skip').hide();
            $(".correct-alert").show();
            $(".wrong-alert").hide();
            $('#onehundred').prop('checked', true);
            $('.footer').css('background-color', '#E1FCDE');
            $('#check').hide();
            $('#continue').show();
        } if(unsortedElements !== true) {
            unsortedElements.forEach(function(element) {
            $(".sortable-list").find(`[data-count="${element }"]`).css("background-color",
                "red");
        });
            $('#check').hide();
            $('#continue').show();
            $('#continue').css('color', '#B1000F');
            $('#continue').css('border-color', '#B1000F');
            $('#skip').hide();
            $(".correct-alert").hide();
            $(".wrong-alert").show();
            $('#five').prop('checked', true);
            $('.footer').css('background-color', '#FFD4D8');
            var correctAnswer = <?= json_encode($currentList)?>;
            console.log(correctAnswer)
            $('.wrong-answer-2').text(correctAnswer);
        }
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

.speaker {

    margin-left: -21%;
    cursor: pointer;
}

@media only screen and (min-width: 769px) {
    .content {
        text-align: center;
        width: 72%;
        margin-left: 15%;
    }

    .answers {
        border-bottom: 3px solid #ECEFF4;
        margin-top: 5%;
        color: white;
        width: 72%;
        height: 47px;
        margin-left: 16%;
    }

}
</style>