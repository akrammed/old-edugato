<?php echo $this->element('Quiz/Elements/header'); ?>
<?php echo $this->element('Quiz/Style/progress-bar'); ?>
<?php echo $this->element('Quiz/Style/quiz-view-style'); ?>
<div class="quiz-body">

    <div class="container">

        <div class="row">

            <div class="content" style="margin-top: 1%;">
                <div class="conversation">
                    <div class="avatar-container">
                        <?php echo $this->element('icons/monkey'); ?>
                        <?php echo $this->element('icons/talikng-bubbls'); ?>
                        <h2 class="avatar-question"><?= $questions[0]['question'] ?> </h2>
                    </div>
                </div>
            </div>
            <div class="options">
                <div class="container image-groupe">
                    <div class="row">
                        <?php
                            $i = 0;
                            foreach ($options as $key => $value) {
                                if ($value->is_correct == 1) {
                                    $correctImg = $i;
                                    $correct = 'Option-' . $key;
                                }
                                echo '<div class="col-sm-3 card image-card" >';
                                echo  $this->Html->image('/img/uploads/picture/' . $value->qoption, ['alt' => 'Option ' . $key, 'id' => 'Option-' . $key, 'class' => 'Option-' . $key . ' image-view clickable img-custom img-option']);
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


<?php echo $this->element('Quiz/Elements/footer'); ?>
<?php echo $this->element('Quiz/Elements/sounds-effects'); ?>
<?php echo $this->element('Quiz/Scripts/globalFunctionQuizView'); ?>


<script>
$(document).ready(function(event) {
    $("#draggable").draggable();
    $(".wrong-alert").hide();
    $(".correct-alert").hide();
    $('#continue').hide();
    var selectedOptions = []; 
    $('#check').prop('disabled', true).css('opacity', '0.2');

    var correctA;
    var selected;
    $(document).on('click', '[class^=Option-]', function() {
        $('#check').prop('disabled', false).css('opacity', '1');
        $('[id^=Option-]').css('border', '5px solid #CBD4E1');
        $('[id^=Option-]').css('border-radius', '15%');
        selected = $(this);
        console.log(selected);
        var imageId = $(this).attr('id').split('-')[1];
        $(this).css('border', '9px solid greenyellow');
        correctA = parseInt(imageId);
        var correctAnswer = <?php echo json_encode($correctImg); ?>;
        var correct = <?php echo json_encode($correct); ?>;
        if (correctAnswer === correctA) {
            correctEvents();
        } else {
            selected.css('border', '9px solid #dc3545');
            $('#' + correct).css('border', '9px solid greenyellow');
            wrongEvents();
        }

        
    });




});
</script>


<style>
.img-option {
    border: 5px solid #CBD4E1;
    border-radius: 15%;
    height: 80%;
    width: 80%;
    margin-left: 10%;
}
</style>