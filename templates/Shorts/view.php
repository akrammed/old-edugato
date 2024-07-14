<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Short $short
 * @var array $quiz
 */
?>

<div class="layout-wrapper layout-content-navbar" id="main">
    <div class="layout-container">
        <!-- Content -->
        <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 mt-3 content-container" id="scContent">
                <div class="row">
                    <div class="col-md-10 w" style="min-height:619px!important; border-radius: 16px ">
                        <div class="card mb-3">
                            <div class="row ">
                                <div class="col-md-4" id="shortView">
                                    <div class="video-container custom-video-container">
                                        <video
                                            style="border-radius: 10px 0px 0px 16px; width: 100%; height: 100%; object-fit: cover;"
                                            id="" class="s courseImage course-img img-fluid"
                                            src=" <?php echo $this->Url->build('/uploads/video/' . $short->video) ?>"
                                            controls autoplay loop disablePictureInPicture
                                            controlslist=" nodownload noplaybackrate">
                                            '</video>
                                    </div>
                                </div>
                                <div class="col-md-8 d-flex flex-column">

                                    <section class="sec" id="section">
                                        <div class="card-body h-100" id="take-quiz-view-2">
                                            <div class="d-flex justify-content-end p-3">
                                                <a href="<?= $this->Url->build(['controller' => 'Shorts', 'action' => 'edit', $short->id]) ?>"
                                                    class="btn btn-primary">Edit</a>
                                            </div>
                                            <div
                                                class="conversation h-100 w-100 d-flex justify-content-center align-items-center">

                                                <div class="container">
                                                    <div id="quiz-view-container">
                                                    </div>
                                                </div>
                                            </div>
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

    });
</script>

<?php echo $this->element('Quiz-create/Styles/quiz-create-style'); ?>


<style>
#main {

    overflow: hidden;

}

.hidden-section {
    display: none;
}

#scrolledDiv {
    scroll-behavior: smooth;
}

#scrolledDiv {
    overflow-y: scroll;
    scrollbar-width: none;
    overflow: hidden;
}

#scrolledDiv::-webkit-scrollbar {
    display: none;
}

.sec {
    height: 619px;
}

.avatar-question {
    display: flex;
    width: 245px;
    padding: 16px 20px;
    align-items: center;
    border-radius: 60px;
    border: 1px solid var(--Outline-Container, rgba(154, 168, 188, 0.20));
    background: var(--Background-Primary, #FFF);
    box-shadow: 0px 2px 8px 0px rgba(0, 0, 0, 0.04);
    color: black !important;
    font-family: Poppins;
    font-size: 16px;
    font-style: normal;
    font-weight: 600;
    line-height: 18px;
}

.custom-video-container {
    padding: 0%;
    padding-left: 0%;
    height: 625px;
}
</style>