<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Short $short
 * @var array $quiz
 */
$correctOption = null;
$correct = null;
foreach ($options as  $key => $o) {
    if ($o->is_correct) {
        switch ($quiz['quiztype_id']) {
            case 1:
                $correctOption = $o->id;
                break;
            case 2:
                $correctOption = $key;
                $correct = 'Option-' . $key;
                break;

            default:
                # code...
                break;
        }
    }
}
?>

<div class="layout-wrapper layout-content-navbar" id="main">
    <div class="layout-container">
        <!-- Content -->
        <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 mt-3 content-container" id="scContent">
                <div class="row">
                    <div class="col-md-10 w" style="min-height:619px!important; border-radius: 16px ">
                        <div class="card mb-3">
                            <div class="row" style="--bs-gutter-x: 0 !important;">
                                <div class="col-md-4" id="shortView">
                                    <div class="video-container custom-video-container">
                                        <video
                                            style="border-radius: 10px 0px 0px 16px; width: 100%; height: 100%; object-fit: cover;"
                                            id="" class="s courseImage course-img img-fluid"
                                            src="<?php echo $this->Url->build('/uploads/video/' . $short->video) ?>"
                                            controls autoplay loop disablePictureInPicture
                                            controlslist="nodownload noplaybackrate">
                                        </video>
                                    </div>
                                </div>
                                <div class="col-md-8 d-flex flex-column">
                                    <section class="sec" id="section">
                                        <div class=" h-100 d-flex flex-column" id="take-quiz-view-2">
                                            <div class="card-body flex-grow-1">
                                                <?php echo $this->element('Quiz-view/Elements/header'); ?>
                                                <div id="quiz-view-container"></div>
                                            </div>
                                            <?php echo $this->element('Quiz-view/Elements/footer'); ?>

                                        </div>
                                    </section>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="card mb-3" style="min-height: 499px !important; border-radius: 16px; ">
                            <div class="row g-0">

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<script>
$(document).ready(function(e) {
    var template = '';
    var id = <?php echo json_encode($quiz['quiztype_id']); ?>;
    switch (id) {
        case 1:
            template = `<?= $this->element('Quiz-view/choose-one-option') ?>`;
            break;
        case 2:
            template = `<?= $this->element('Quiz-view/choose-one-image') ?>`;
            break;
        case 3:
            template = `<?= $this->element('Quiz-view/order-the-words') ?>`;
            break;
        case 4:
            template = `<?= $this->element('Quiz-view/match') ?>`;
            break;
        case 5:
            template = `<?= $this->element('Quiz-view/carusel') ?>`;
            break;
        case 6:
            template = `<?= $this->element('Quiz-view/listen-order') ?>`;
            break;
        case 7:
            template = `<?= $this->element('Quiz-view/read-repeat') ?>`;
            break;
        case 8:
            template = `<?= $this->element('Quiz-view/conversation-speaking') ?>`;
            break;
        case 9:
            template = `<?= $this->element('Quiz-view/conversation-ordering') ?>`;
            break;
        default:
            template = '<p class="prg">Option non reconnue.</p>';
            break;
    }
    $('.prg').remove();
    $('#quiz-view-container').append(template);
    var id = <?php echo json_encode($quiz['quiztype_id']); ?>;
    switch (id) {
        case 1:
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
            break;
        case 2:
            init();
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
                var correct = <?php echo json_encode($correct); ?>;
                var correctAnswer = <?php echo json_encode($correctOption); ?>;
                if (correctAnswer === correctA) {
                    correctEvents();
                } else {
                    selected.css('border', '9px solid #dc3545');
                    $('#' + correct).css('border', '9px solid greenyellow');
                    wrongEvents();
                }


            });

            break;

        default:
            break;
    }

});
</script>