<?php echo $this->element('Quiz/Elements/header'); ?>
<?php echo $this->element('Quiz/Style/progress-bar'); ?>
<?php echo $this->element('Quiz/Style/quiz-view-style'); ?>
<?php
$optionsList = [];
$correctOption = null;
$i = 0;
?>
<div class="quiz-body">

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
                <ul class="options-list">
                    <?php foreach ($options as $key => $value) { ?>
                    <li class="option-element" id="option-<?= $value->id ?>">
                        <?= $value['qoption'] ?>
                    </li>
                    <?php $i++;
                        if ($value->is_correct) {
                            $correctOption = $value->id;
                        }
                        array_push($optionsList, $value['qoption']);
                    } ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php echo $this->element('Quiz/Elements/footer'); ?>
<?php echo $this->element('Quiz/Elements/sounds-effects'); ?>
<?php echo $this->element('Quiz/Scripts/globalFunctionQuizView'); ?>

<script>
$(document).ready(function(event) {
    init();
    var selectedOptions = [];
    var selectedOption;
    $(document).on('click', '[class^=option-element]', function() {
    selected = $(this);
    console.log(selected);
    var optionId = $(this).attr('id').split('-')[1];
    $('[class^=option-element]').css('border', '2px solid');
    $(this).css('border', '4px solid #17BF33');
    selectedOption = parseInt(optionId);
    var correctAnswer = <?php echo json_encode($correctOption); ?>;
    
    if (correctAnswer === selectedOption) {
        $('[class^=option-element]').each(function() {
            if ($(this).css('background-color') === 'rgb(255, 0, 0)') {
                $(this).css('background-color', '#7F77FF');
            }
        });
        $('#option-' + selectedOption).css('background-color', '#17BF33');
        correctEvents();
    } else {
        $('[class^=option-element]').each(function() {
            if ($(this).css('background-color') === 'rgb(255, 0, 0)') {
                $(this).css('background-color', '#7F77FF');
            }
        });
        $('#option-' + correctAnswer).css('background-color', '#17BF33');
        $('#option-' + selectedOption).css('background-color', 'red');
        $('#option-' + selectedOption).css('border-color', 'red');
        wrongEvents();
    }
});


  
});
</script>
<style>
.options {
    height: 200px;
    display: grid;
    align-items: center;
}
</style>