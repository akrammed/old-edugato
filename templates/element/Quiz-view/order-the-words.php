<?php

    function getElementById($array, $searchId) {
        if(empty($array)) return;
        $result = array_filter($array, function($item) use ($searchId) {
            return $item['id'] === $searchId;
        });
        return !empty($result) ? reset($result) : null;
    }

    function checkOrderById($array, $opt) {
        if(empty($array)) return;
        $active = getElementById($array, $opt['id']);
        return $active['order'] == $opt['order'];
    }

    shuffle($options);

    function getDefaultclass($selected, $correct) {
        $class = !!$selected ? ' cursor' : ' cursor-pointer';
        if ($selected) {
            $class.= checkOrderById($correct, $selected) ? ' btn-correct' : ' btn-incorrect';
        }
        return $class;
    }
?>

<div class="d-flex border-b-2 px-2 w-100 max-w-xl">
    <div class="d-flex flex-column gap-4">
        <p class="text-xl">Listen and order the words</p>
        <div class="d-flex align-items-center justify-content-center gap-4">
            <?php echo $this->element('icons/avatar'); ?>
            <p class="text-base"><?= $question; ?></p>
        </div>
    </div>
</div>

<div class="w-100 max-w-xl">
    <div id="quiz-answer-container" class="border-b-2 d-flex flex-wrap gap-3" style="min-height: 120px;">
        <?php if(isset($currentShortData['selected_option_id'])): foreach ($currentShortData['selected_option_id'] as $option): ?>
            <p class="btn btn-primary cursor-pointer removable-option btn-disabled-option<?= getDefaultclass(getElementById($currentShortData['selected_option_id'], $option['id']) , $currentShortData['correct_option_id']); ?>" data-clone-option-id="<?= $option['id']; ?>"><?= $option['qoption']; ?></p>
        <?php endforeach; endif; ?>
    </div>
    <?= $this->Form->create(null, [
        'url' => ['controller' => 'Quizs', 'action' => 'checkOptionsOrder'],
        'id' => 'short-answer-form',
        'method' => 'post',
        'class' => 'w-100 d-flex justify-content-center mt-6'
    ]) ?>
    <div id="quiz-options-container" class="d-flex flex-wrap gap-3 w-100">
        <?php foreach ($options as $index => $option): ?>
            <p class="btn btn-primary clickable-option <?= isset($currentShortData['selected_option_id']) ? 'btn-ghosted btn-disabled-option': '' ?>" data-option-id="<?= $option['id']; ?>"><?= $option->qoption; ?></p>
        <?php endforeach; ?>
    </div>
    <?= $this->Form->end() ?>
</div>

<script>
    $(document).ready(function() {

        function disableAllOptions() {
            $('.clickable-option, .removable-option').prop('disabled', true).addClass('btn-disabled-option');
        }

        var selectedOptions = [];
        const totalOptions = <?= count($options) ?>;

        $('.clickable-option').click(function() {
            if ($(this).hasClass('btn-ghosted')) return;
            var optionId = $(this).data('option-id');
            var $clone = $(this).clone();
            $clone.removeClass('clickable-option')
                .removeAttr('option-id')
                .attr('data-clone-option-id', optionId)
                .addClass('removable-option');
            $('#quiz-answer-container').append($clone);
            $(this).addClass('btn-ghosted');
            selectedOptions.push({
                id: optionId,
                qoption: $(this).text(),
                order: selectedOptions.length + 1
            });
            if (selectedOptions.length === totalOptions) {
                disableAllOptions();
                checkAnswer();
            }
        });

        $('#quiz-answer-container').on('click', '.removable-option', function() {
            if ($(this).hasClass('btn-disabled-option')) return;
            var optionId = $(this).data('clone-option-id');
            $(this).remove();
            $(`[data-option-id=${optionId}]`).removeClass('btn-ghosted');

            let removedIndex = selectedOptions.findIndex(opt => opt.id === optionId);
            if (removedIndex !== -1) {
                selectedOptions.splice(removedIndex, 1);
                for (let i = removedIndex; i < selectedOptions.length; i++) {
                    selectedOptions[i].order--;
                }
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