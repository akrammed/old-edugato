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
        <div class="row quiz-title-row">
            <h1 class="title quiz-title">
                Choose the correct answer</h1>
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
<?php echo $this->element('Quiz/Scripts/globalFunctionQuizView'); ?>

<script>
$(document).ready(function(event) {
    init();
    var selectedOptions = [];
    var selectedOption;
    $(document).on('click', '[class^=option-element]', function() {
        $('#check').prop('disabled', false).css('opacity', '1');
        selected = $(this);
        console.log(selected);
        var optionId = $(this).attr('id').split('-')[1];
        $('[class^=option-element]').css('border', '2px solid');
        $(this).css('border', '4px solid greenyellow');
        selectedOption = parseInt(optionId);
    });

    $('#check').on('click', function(e) {
        e.preventDefault();
        var correctAnswer = <?php echo json_encode($correctOption); ?>;
        if (correctAnswer === selectedOption) {
            $('#option-' + selectedOption).css('background-color', 'greenyellow');
            correctEvents();
        } else {
            $('#option-' + correctAnswer).css('background-color', 'greenyellow');
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