<?php
    shuffle($options);
    function getDefaultclass($id, $selected, $correct) {
        $class = $selected ? ' cursor' : ' cursor-pointer';
        if ($selected) {
            $class.= ($id == $correct ? ' btn-correct' : ($id == $selected ? ' btn-incorrect' : ''));
        }
        return $class;
    }
?>

<div class="d-flex flex-column gap-4">
    <p class="text-xl">Choose the correct word</p>
    <div class="d-flex align-items-center justify-content-center gap-4">
        <?php echo $this->element('icons/avatar'); ?>
        <p class="text-base"><?= $question; ?></p>
    </div>
</div>

<?= $this->Form->create(null, [
    'url' => ['controller' => 'Quizs', 'action' => 'checkOption'],
    'id' => 'short-answer-form',
    'method' => 'post',
    'class' => 'w-100 d-flex justify-content-center mt-12'
]) ?>
<div class="d-flex flex-wrap gap-3 w-100 max-w-xl">
    <?php foreach ($options as $index => $option): ?>
        <p class="btn btn-primary flex-1 btn-responsive clickable-option<?= getDefaultclass($option['id'], $currentShortData['selected_option_id'], $currentShortData['correct_option_id']); ?>" data-option-id="<?= $option['id']; ?>"><?= $option->qoption; ?></p>
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
                    if (response.navigable) (
                        $('#btnScrollDown').removeClass('disabled').attr('disabled', false)
                    )
                    $('.clickable-option').removeClass('btn-correct btn-incorrect cursor-pointer')
                    if (optionId == response.correctOption) {
                        $(`[data-option-id=${optionId}]`).addClass('btn-correct');
                        $('#correctSound').delay(50).get(0).play();
                    } else {
                        $(`[data-option-id=${optionId}]`).addClass('btn-incorrect');
                        $(`[data-option-id=${response.correctOption}]`).addClass('btn-correct');
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