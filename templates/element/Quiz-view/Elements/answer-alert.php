<?php
    $currentStep = $_SESSION['current_step'];
    $currentShort = $_SESSION['shorts'][$currentStep];
    $newQuestion = $currentShort['quiz']['questions'][0]['question'];
    $newOption = $currentShort['quiz']['options'][0]['qoption'];
?>

<div id="answer-alert" class="px-4 position-absolute bottom-0 right-0 h-20 w-100 d-flex align-items-center justify-content-between transition-transform transform-translateY <?= $isCorrect ? 'bg-success/10' : 'bg-destructive/10' ?>">
    <div class="d-flex align-items-center gap-2">
        <?php if ($isCorrect): ?>
        <div style="cursor: default;" class="btn btn-icon bg-background rounded-lg bg-backgrouond border border-success color-success"><i class="fa-solid fa-check"></i></div>
        <p class="text-lg color-success">That's correct!</p>
        <?php else: ?>
        <div style="cursor: default;" class="btn btn-icon bg-background rounded-lg bg-backgrouond border border-destructive color-destructive"><i class="fa-solid fa-x"></i></div>
        <p class="text-lg color-destructive">Oops, that wasn't it!</p>
        <?php endif ?>
    </div>
    <?= $this->Form->create(null, [
        'url' => ['controller' => 'Quizs', 'action' => 'retryQuiz'],
        'id' => 'short-retry-form',
        'method' => 'post',
    ]) ?>
        <button id="retry-btn" class="btn border bg-background <?= $isCorrect ? 'border-success color-success' : 'border-destructive color-destructive' ?> ">Retry</button>
    <?= $this->Form->end() ?>
</div>
<style>
    .transform-translateY {
        transform: translateY(100%);
    }
    .transition-transform {
        transition: transform 0.5s ease-in-out;
    }
    .transform-translateY.show {
        transform: translateY(0);
    }
</style>
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $('#answer-alert').addClass('show');
        }, 100);

        $('#retry-btn').click(function() {
            event.preventDefault();
            var form = $('#short-retry-form');
            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: form.serialize(),
                dataType: 'json',
                success: function(response) {
                    $('#answer-alert').remove();
                    if (response.isRetryable) {
                        var convertion = $('#conversation-container')
                        if (convertion) {
                            convertion.empty().html(`<?= $this->element('Quiz-view/Elements/chat-message', ['msg' => $newQuestion]); ?>`)
                            $('#conversation-footer').removeClass('invisible');
                            $('#clickable-option').empty().html(`<?= $newOption ?>`)
                        }
                        $('.clickable-option, .removable-option').removeClass('border-success border-destructive btn-disabled-option btn-correct btn-incorrect').addClass('cursor-pointer').prop('disabled', false);
                        $('#recordButton').removeClass("btn-correct btn-incorrect").attr('disabled', false);
                        $('#btnScrollDown').addClass('disabled').attr('disabled', true);
                    } else {
                        alert("not allowed")
                    }
                },
                error: function() {
                    alert('An error occurred. Please try again.');
                }
            });
        });
    });
</script>