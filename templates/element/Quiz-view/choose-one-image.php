<?php
    shuffle($options);
    function getDefaultclass($id, $selected, $correct) {
        $class = $selected ? ' cursor' : ' cursor-pointer';
        if ($selected) {
            $class.= ($id == $correct ? ' border-success' : ($id == $selected ? ' border-destructive' : ''));
        }
        return $class;
    }
?>
<div class="d-flex flex-column border-b-2 px-2">
    <p class="text-xl">Choose the correct image</p>
    <div class="d-flex align-items-center justify-content-center">
        <div class="pt-4">
            <?= $this->element('icons/monkey'); ?>
        </div>
        <p class="text-lg pb-4"><?= $question; ?></p>
    </div>
</div>

<?= $this->Form->create(null, [
    'url' => ['controller' => 'Quizs', 'action' => 'checkOption'],
    'id' => 'short-answer-form',
    'method' => 'post',
]) ?>
<div class="d-grid grid-cols-4 mt-8 gap-4 max-w-2xl w-100 grid-short-cards-4">
    <?php foreach ($options as $index => $option): ?>
        <div class="border-4 rounded-md h-44 h-lg-40 h-xl-44 short-card-h-4 clickable-option<?= getDefaultclass($option['id'], $currentShortData['selected_option_id'], $currentShortData['correct_option_id']); ?>" data-option-id="<?= $option['id']; ?>">
            <?= $this->Html->image('uploads/picture/' . $option['qoption'], ['class' => 'w-100 h-100', 'style' => 'object-fit: contain;']); ?>
        </div>
    <?php endforeach; ?>
</div>
<?= $this->Form->end() ?>

<script>
    $(document).ready(function() {
        $('.clickable-option').click(function() {
            event.preventDefault();

            const quizId = <?= json_encode($currentShortData['quiz_id']) ?>;
            const isAnswer = <?= json_encode($currentShortData['selected_option_id']) ?>;
            if (!!isAnswer) {
                return;
            }
            var optionId = $(this).data('option-id');
            var form = $('#short-answer-form');
            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: form.serialize() + '&id=' + optionId + '&quizId=' + quizId,
                dataType: 'json',
                success: function(response) {
                    if(!!response?.alreadyAnswered) return;
                    // if (response.navigable) (
                    //     $('#btnScrollDown').removeClass('disabled').attr('disabled', false)
                    // )
                    $('.clickable-option').removeClass('border-success border-destructive cursor-pointer')
                    if (optionId == response.correctOption) {
                        $(`[data-option-id=${optionId}]`).addClass('border-success');
                        $('#correctSound').delay(50).get(0).play();
                    } else {
                        $(`[data-option-id=${optionId}]`).addClass('border-destructive');
                        $(`[data-option-id=${response.correctOption}]`).addClass('border-success');
                        $('#incorrectSound').delay(50).get(0).play();
                    }
                    $('#quizzes-section').append(response.answerAlert);
                },
                error: function() {
                    alert('An error occurred. Please try again.');
                }
            });
        });
    });
</script>