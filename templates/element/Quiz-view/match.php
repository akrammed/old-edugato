<?php
    $middleIndex = count($options) / 2;
    $answers = array_slice($options, 0, $middleIndex);
    $questions = array_slice($options, $middleIndex);

    $defaultAnswers = isset($currentShortData['selected_option_id']) ? $currentShortData['selected_option_id'] : null;

    function getElementById($array, $searchId) {
        if(empty($array)) return;
        $result = array_filter($array, function($item) use ($searchId) {
            return $item['id'] === $searchId;
        });
        return !empty($result) ? reset($result) : null;
    }

    function getElementByOrder($array, $order) {
        if(empty($array)) return;
        $result = array_filter($array, function($item) use ($order) {
            return $item['order'] === $order;
        });
        return !empty($result) ? reset($result) : null;
    }

    function checkOrderById($array, $opt) {
        if(empty($array)) return;
        $active = getElementById($array, $opt['id']);
        return $active['order'] == $opt['order'];
    }

    function getDefaultclass($selected, $correct) {
        $class = !!$selected ? ' cursor' : ' cursor-pointer';
        if ($selected) {
            $class.= checkOrderById($correct, $selected) ? ' btn-correct' : ' btn-incorrect';
        }
        return $class;
    }

    shuffle($answers);
?>

<div class="d-flex border-b-2 px-2 w-100 max-w-xl">
    <div class="d-flex flex-column gap-4">
        <p class="text-xl">Match questions and answers</p>
        <div class="d-flex align-items-center justify-content-center gap-4">
            <?php echo $this->element('icons/avatar'); ?>
            <p class="text-base"><?= $question; ?></p>
        </div>
    </div>
</div>


<div class="w-100 max-w-xl">
    <div id="quiz-answer-container" class="border-b-2 pb-6 d-flex flex-column flex-wrap gap-3">
        <?php foreach ($questions as $index => $question): ?>
            <div class="d-flex justify-content-between gap-3">
                <p class="btn btn-primary btn-responsive cursor btn-primary--fix rounded-2xl" data-option-id="<?= $question['id']; ?>"><?= $question->qoption; ?></p>
                <div class="flex-1 max-w-50" id="answer-container-<?= $question['id']; ?>" data-is-free="<?= isset($defaultAnswers) ? 'false' : 'true' ?>" data-order="<?= $index + 1 ?>">
                    <?php if(isset($defaultAnswers)): ?>
                        <p class="btn btn-primary btn-responsive cursor-pointer removable-option btn-disabled-option<?= getDefaultclass(getElementById($defaultAnswers, getElementByOrder($defaultAnswers, $index + 1 )['id']) , $currentShortData['correct_option_id']); ?>" data-clone-option-id="<?= getElementByOrder($defaultAnswers, $index + 1 )['id']; ?>"><?= getElementByOrder($defaultAnswers, $index + 1 )['qoption']; ?></p>
                    <?php else: ?>
                    <p class="btn btn-ghosted rounded-2xl"></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?= $this->Form->create(null, [
        'url' => ['controller' => 'Quizs', 'action' => 'checkOptionsOrder'],
        'id' => 'short-answer-form',
        'method' => 'post',
        'class' => 'w-100 d-flex justify-content-center mt-6'
    ]) ?>
    <div id="quiz-options-container" class="d-flex flex-wrap gap-3 w-100">
        <?php foreach ($answers as $index => $answer): ?>
            <p class="btn btn-primary btn-responsive clickable-option rounded-2xl<?= isset($currentShortData['selected_option_id']) ? ' btn-ghosted btn-disabled-option': '' ?>" data-option-id="<?= $answer['id']; ?>"><?= $answer->qoption; ?></p>
        <?php endforeach; ?>
    </div>
    <?= $this->Form->end() ?>
</div>

<script>
    $(document).ready(function() {

        function disableAllOptions() {
            $('.clickable-option, .removable-option').prop('disabled', true).addClass('btn-disabled-option');
        }

        let selectedOptions = [];
        const totalOptions = <?= count($answers) ?>;

        $('.clickable-option').click(function() {
            if ($(this).hasClass('btn-ghosted')) return;

            var optionId = $(this).data('option-id');
            var clone = $(this).clone();
            clone.removeClass('clickable-option')
                .removeAttr('data-option-id')
                .attr('data-clone-option-id', optionId)
                .addClass('removable-option');

            var firstFree = $('#quiz-answer-container').find('[data-is-free="true"]').first();
            if (firstFree.length) {
                firstFree.attr('data-is-free', 'false');
                firstFree.html(clone)
             
                $(this).addClass('btn-ghosted');
                selectedOptions.push({
                    id: optionId,
                    qoption: $(this).text(),
                    order: firstFree.data('order')
                });

                if (selectedOptions.length === totalOptions) {
                    disableAllOptions();
                    checkAnswer();
                }
            }
        });

        $('#quiz-answer-container').on('click', '.removable-option', function() {
            if ($(this).hasClass('btn-disabled-option')) return;
            var $parentDiv = $(this).parent();
            $(this).remove();
            var $newElement = $('<p>', {
                class: 'btn btn-ghosted rounded-2xl'
            });
            $parentDiv.html($newElement);
            $parentDiv.attr('data-is-free', 'true');
            var optionId = $(this).data('clone-option-id');
            $(`[data-option-id=${optionId}]`).removeClass('btn-ghosted');

            let removedIndex = selectedOptions.findIndex(opt => opt.id === optionId);
            if (removedIndex !== -1) {
                selectedOptions.splice(removedIndex, 1);
            }

        });

        function checkAnswer() {
            event.preventDefault();

            const isAnswer = <?= json_encode($currentShortData['selected_option_id']) ?>;
            if (!!isAnswer) {
                return;
            }

            var form = $('#short-answer-form');

            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: form.serialize() + '&options=' + JSON.stringify(selectedOptions),
                dataType: 'json',
                success: function(response) {
                    if(!!response?.alreadyAnswered) return;
                    if (response.navigable) (
                        $('#btnScrollDown').removeClass('disabled').attr('disabled', false)
                    )
                    $('.clickable-option').removeClass('btn-correct btn-incorrect cursor-pointer')
                    if (response.status) {
                        $('[data-clone-option-id]').addClass('btn-correct');
                        $('#correctSound').delay(50).get(0).play();
                    } else {
                        var mismatchedOptionIds = response.mismatchedOptions.map(function(option) {
                            return option['id'];
                        });
                        $('[data-clone-option-id]').each(function() {
                            var $element = $(this);
                            var optionId = $element.data('clone-option-id');

                            if (mismatchedOptionIds.includes(optionId)) {
                                $element.addClass('btn-incorrect');
                            } else {
                                $element.addClass('btn-correct');
                            }
                        });
                        $('#incorrectSound').delay(50).get(0).play();
                    }
                    $('#quizzes-section').append(response.answerAlert);
                },
                error: function() {
                    alert('An error occurred. Please try again.');
                }
            });
        };

    });
</script>