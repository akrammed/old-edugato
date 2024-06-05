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
                    Order the following words</h1>
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
                    <ol class="sortable-list">
                    </ol>
                </div>
                <div class="options">
                    <ol>

                        <?php
$optionsList = []; // Initialize an array to store
$optionKeys = [] ;
foreach ($options as $key => $value) {
$optionsList[$key] = [$value['qoption'], 'position' => $value['oorder'] , $value->id] ;
}

shuffle($optionsList);
?>


<?php
    
    $i = 0;
    foreach ($optionsList as $value) {?>

                        <li data-count="<?=  $value['position'] ?>" id="<?=  $value[1] ?>">
                            <?=  $value[0] ?>
                        </li>
                        <?php
        $i++;
        array_push($optionKeys, $value['position']);
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
    var selectedOptions = [];
    const optionPositions = [];
    $('#check').prop('disabled', true).css('opacity', '0.2');

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





    function isArraySorted(arr) {
        if (arr.length == 0) {
            return false;
        }
        for (let i = 0; i < arr.length - 1; i++) {
            const current = parseInt(arr[i]);
            const next = parseInt(arr[i + 1]);
            if (current > next) {
                return false;
            }
        }
        return true;
    }

    $('#check').on('click', function(e) {
        e.preventDefault();
        if (isArraySorted(optionPositions)) {
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

<?php echo $this->element('Quiz/quiz-style'); ?>