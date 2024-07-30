<?php
$totalSteps = count($shorts) - 1;
// dd($_SESSION);
// $_SESSION['current_step'] = 0;

// $_SESSION['shorts_data'] = array_map(function($short) {
//     return [
//         'short_id' => $short->id,
//         'quiz_id' => $short->quiz_id,
//         'selected_option_id' => null,
//         'correct_option_id' => null,
//         // 'attempts_left' => 2
//     ];
// }, $shorts);

if (!isset($_SESSION['current_step'])) {
    $_SESSION['current_step'] = 0;
}

$_SESSION['shorts'] = $shorts;

function updateSessionWithShorts($shorts) {
    if (!isset($_SESSION['shorts_data'])) {
        $_SESSION['shorts_data'] = [];
    }
    foreach ($shorts as $short) {
        $shortExists = false;
        foreach ($_SESSION['shorts_data'] as &$existingShort) {
            if ($existingShort['short_id'] == $short->id) {
                $shortExists = true;
                $existingShort['quiz_id'] = $short->quiz_id;
                break;
            }
        }
        if (!$shortExists) {
            $_SESSION['shorts_data'][] = [
                'short_id' => $short->id,
                'quiz_id' => $short->quiz_id,
                'selected_option_id' => null,
                'correct_option_id' => null,
                // 'attempts_left' => 2
            ];
        }
    }
}
updateSessionWithShorts($shorts);

$currentStep = $_SESSION['current_step'];
$currentShort = $shorts[$currentStep];
$currentShortData = $_SESSION['shorts_data'][$currentStep];

$upButtonAttrs = ($currentStep == 0) ? ['class' => 'btn-reset disabled', 'disabled' => true] : ['class' => 'btn-reset'];
$downButtonAttrs = ($currentStep == $totalSteps || !$_SESSION['shorts_data'][$currentStep]['selected_option_id']) 
    ? ['class' => 'btn-reset disabled', 'disabled' => true] 
    : ['class' => 'btn-reset'];
?>

<div class="flex-grow-1 d-flex flex-column" id="scContent">
    <div class="flex-grow-1 d-flex flex-column flex-lg-row gap-4">
        <div class="flex-grow-1 card d-flex flex-col flex-lg-row overflow-hidden">
            <div class="d-flex align-items-center justify-content-center bg-foreground position-relative">
                <button id="scrollToBottom" class="z-3 btn btn-primary btn-icon position-absolute rounded-lg d-lg-none"
                    style="right: 1rem; top: 1rem; font-size: 1.25rem;"><i class="fa-solid fa-angle-down"></i></button>
                <div class="bg-foreground flex-grow-1"
                    style="aspect-ratio: 9 / 16; height: calc(100dvh - 102px - 2rem); width: fit-content; max-width: 500px;">
                    <video id="short-vid-display" class="w-100 h-100" style="object-fit: cover; object-position: center;" controls autoplay loop disablePictureInPicture controlslist="nodownload noplaybackrate" src="<?php echo $this->Url->build('/uploads/video/' . $currentShort->video) ?>"></video>
                </div>
            </div>
            <section class="flex-grow-1 py-8 px-4 position-relative" id="quizzes-section">
                <div id="take-quiz-2" class="h-100 d-flex flex-column gap-4 justify-content-between align-items-center" style="min-height: 360px;">
                    <!-- <h2 class="text-2xl text-center">Introducing yourself</h2> -->
                    <div id='quiz-display-container' class="d-flex flex-column gap-6 justify-content-center align-items-center flex-grow-1 w-100">
                        <?= $this->element('Quiz-view/Elements/get-quiz-element', ['quizType' => $currentShort['quiz']['quiztype_id'], 'currentShortData' => $currentShortData , 'currentShort' => $currentShort]) ?>
                    </div>
                </div>
            </section>
        </div>
        <?= $this->Form->create(null, [
            'url' => ['controller' => 'Quizs', 'action' => 'navigate'],
            'id' => 'short-navigation-form',
            'method' => 'post',
            'class' => 'flex-shrink-0 d-flex flex-lg-column justify-content-center gap-1'
        ]) ?>
            <?= $this->Html->tag('button', $this->element('icons/arrow-top'), ['id' => 'btnScrollUp', 'data-direction' => 'prev'] + $upButtonAttrs) ?>
            <?= $this->Html->tag('button', $this->element('icons/arrow-down'), ['id' => 'btnScrollDown', 'data-direction' => 'next'] + $downButtonAttrs) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
<?= $this->element('Quiz-view/Elements/sounds-effects') ?>
<script>
    $(document).ready(function() {
        function updateVideo(url) {
            const videoElement = $('#short-vid-display');
            const newSrc = "<?php echo $this->Url->build('/uploads/video/') ?>" + url;
            videoElement.attr('src', newSrc);
            videoElement[0].load();
        }

        $('#btnScrollUp, #btnScrollDown').click(function() {
            event.preventDefault();

            $('#answer-alert').remove();
            var action = $(this).data('direction');
            var form = $('#short-navigation-form');
            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: form.serialize() + '&action=' + action,
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        $('#quiz-display-container').html(response.element)
                        updateVideo(response.videoUrl)
                        if (action == 'next') {
                            $('#btnScrollUp').removeClass('disabled').attr('disabled', false);
                            if (!response.navigable) {
                                $('#btnScrollDown').addClass('disabled').attr('disabled', true);
                            }
                        } else {
                            $('#btnScrollDown').removeClass('disabled').attr('disabled', false);
                            if (!response.navigable) {
                                $('#btnScrollUp').addClass('disabled').attr('disabled', true);
                            }                         
                        }
                    } else {
                        alert('failed');
                    }
                },
                error: function() {
                    alert('An error occurred. Please try again.');
                }
            });
        });

        $('#scrollToBottom').click(function() {
            $('html, body').animate({
                scrollTop: $('#section').offset().top
            }, 0);
        });
    });
</script>