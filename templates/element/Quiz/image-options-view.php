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
                            <?php echo $this->element('icons/monkey'); ?>
                        </div>
                        <div class="speech-container">
                            <h2 class="question-cat"><?= $questions[0]['question'] ?> </h2>
                        </div>
                    </div>

                </div>
                <div class="options">
                    <div class="container">
                        <div class="row" style="margin-bottom: 7%;">

                            <?php 
            $i = 0;
foreach ($options as $key => $value) {
    if ($value->is_correct == 1) {
        $correctImg = $i;
        $correct = 'Option-'.$key;
    }
    echo '<div class="col-sm-3 card">'; 
    echo  $this->Html->image('/img/uploads/picture/'.$value->qoption, ['alt' => 'Option ' . $key,'id'=>'Option-'.$key,'style'=>'height: 86%;
    margin-top: 6%;', 'class'=>'Option-'.$key.' image-view clickable img-custom']);
    echo '</div>'; 
     $i++;
};

  ?>




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
                    <h3 class="correct-title correct-icon-btn">
                        Oops, that wasn’t it!</h3>
                </div>
                <div class="correct-alert">
                    <?php echo $this->element('icons/correct'); ?>
                    <h3 class="correct-title correct-icon-btn">
                        That's correct ! <br> <span style="font-size: 11px;font-weight: 300;">Well Done !</span></h3>
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

    var correctA;
    var selected;
    $(document).on('click', '[class^=Option-]', function() {
        $('#check').prop('disabled', false).css('opacity', '1');
        $('[id^=Option-]').css('border', 'none');
        selected = $(this);
        console.log(selected);
        var imageId = $(this).attr('id').split('-')[1];
        $(this).css('border', '9px solid greenyellow');
        correctA = parseInt(imageId);
    });

    $('#check').on('click', function(e) {
        e.preventDefault();
        var correctAnswer = <?php echo json_encode($correctImg); ?>;
        var correct = <?php echo json_encode($correct); ?>;
        if (correctAnswer === correctA) {

            $('#skip').hide();
            $(".correct-alert").show();
            $(".wrong-alert").hide();
            $('#onehundred').prop('checked', true);
            $('.footer').css('background-color', '#E1FCDE');
            $('#check').hide();
            $('#continue').show();
        } else {
            selected.css('border', '9px solid #dc3545');
            $('#' + correct).css('border', '9px solid greenyellow');
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
<style>
.speech-container h2 {
    margin: 0;
    margin-left: -15% !important;
}


@media only screen and (max-width: 768px) {
    .options {
        margin-top: 4%;
        margin-left: 1% !important;
    }
    .img-custom{
        height: 86% !important;
    }
    .footer {
    height: 70px;
    border-top: 3px solid #ECEFF4;
    padding: 20px 0;
    position: revert !important;
    bottom: 0;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
}
</style>