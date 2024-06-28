<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Short $short
 * @var string[]|\Cake\Collection\CollectionInterface $shortTypes
 */
?><?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Short $short
 * @var \Cake\Collection\CollectionInterface|string[] $shortTypes
 */
?>
<div class="container-xxl flex-grow-1 mt-3 content-container" id="scContent">
    <div class="row">
        <div class="col-md-10 w" style="min-height:619px!important; border-radius: 16px ">
            <div class="card mb-3 add-short-card ">
                <div class="row ">
                    <div class="col-md-4 upload-short" id="dropZone">
                        <div class="short-upload-container">
                            <div class="short-upload-container-body">
                                <?php echo $this->element('icons/drop-element'); ?>
                                <h6 class="short-upload-container-text">Drop Video here <br>
                                    or</h6>
                                <button class="upload-short-video">Browse</button>
                            </div>
                        </div>
                        <div class="vid-cnt">

                        </div>
                        <button class="upload-short-video replace-btn" style="display:none">Replace</button>
                        <video class="shortVid course-img img-fluid" style="display:none" src="" autoplay="" controls
                            muted></video>
                    </div>
                    <div class="col-md-8">
                        <section class="sec mt-5" id="section">
                            <div id="take-quiz-2">
                                <div class="conversation position-relative h-100 w-100 d-flex justify-content-center align-items-center"
                                    style="flex-direction: column;">

                                    <div class="container" id="quiz-type-section">
                                        <h3 class="pb-1 mb-4 mt-4 text-dark fw-normal main-title">Add a Quiz Type</h3>
                                        <div>
                                            <div class="row ">
                                                <div class="col-4 mb-4 quiz-type-col">
                                                    <?php echo $this->element('icons/text-option-icon'); ?>
                                                </div>
                                                <div class="col-4 mb-4 quiz-type-col">
                                                    <?php echo $this->element('icons/image-option-icon'); ?>
                                                </div>
                                                <div class="col-4 mb-4 quiz-type-col">
                                                    <?php echo $this->element('icons/order-the-words-icon'); ?>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-4 mb-4 quiz-type-col">
                                                    <?php echo $this->element('icons/match-icon'); ?>
                                                </div>
                                                <div class="col-4 mb-4 quiz-type-col">
                                                    <?php echo $this->element('icons/carusel-icon'); ?>
                                                </div>
                                                <div class="col-4 mb-4 quiz-type-col">
                                                    <?php echo $this->element('icons/listen-order-icon'); ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4 mb-4 quiz-type-col">
                                                    <?php echo $this->element('icons/read-repeat-icon'); ?>
                                                </div>
                                                <div class="col-4 mb-4 quiz-type-col">
                                                    <?php echo $this->element('icons/conversation-speaking-icon'); ?>
                                                </div>
                                                <div class="col-4 mb-4 quiz-type-col">
                                                    <?php echo $this->element('icons/conversation-ordering-icon'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="quiz-type-creation-section" style="display: none;">
                                        <div id="quiz-creation-container">
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
            <div class="card mb-3 " style="min-height: 499px !important; border-radius: 16px; ">
                <div class="row g-0">

                </div>
            </div>

        </div>
    </div>
</div>
<?= $this->Form->control('video', [
    'class' => 'form-control',
    'type' => 'file',
    'id' => 'upload-short',
    'label' => '',
    'hidden' => true
]); ?>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    const $dropZone = $('#dropZone'),
        $uploadShort = $('#upload-short'),
        $shortVid = $('.shortVid'),
        $shortUploadContainer = $('.short-upload-container'),
        $replaceBtn = $('.replace-btn'),
        $uploadShortVideo = $('.upload-short-video');

    function showVideo(file) {
        $shortUploadContainer.hide();
        $shortVid.show();
        $replaceBtn.show();
        $('.upload-short').css('padding', '0%');
        $shortVid.attr('src', URL.createObjectURL(file)).show();
    }

    function handleFileSelect(file) {
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $shortVid.attr('src', e.target.result);
                showVideo(file); // Display the video immediately
            };
            reader.readAsDataURL(file);
        }
    }
    $dropZone.on({
        dragover: (e) => {
            e.preventDefault();
            e.stopPropagation();
            $dropZone.addClass('dragover');
        },
        dragleave: (e) => {
            e.preventDefault();
            e.stopPropagation();
            $dropZone.removeClass('dragover');
        },
        drop: (e) => {
            e.preventDefault();
            e.stopPropagation();
            $dropZone.removeClass('dragover');
            const files = e.originalEvent.dataTransfer.files;
            if (files.length > 0) {
                handleFileSelect(files[0]);

                // Update hidden input
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(files[0]);
                $uploadShort[0].files = dataTransfer.files;
            }
        }
    });
    $uploadShortVideo.click(function() {
        $uploadShort.click();
    });
    $uploadShort.change(function() {
        handleFileSelect(this.files[0]);
    });



    $('.quiz-icon').on('click', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        $('#quiz-type-section').hide();
        $('#quiz-type-creation-section').show();
        var template = '';
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
        $('#quiz-creation-container').append(template);

    });

    $('#cancel-quiz-create').on('click', function(e) {
        e.preventDefault();
        console.log(1)
        for (let index = 1; index < 9; index++) {
            $('#' + index).hide();
        }
        $('#quiz-type-section').show();

    })

});
</script>
<style>
.upload-short-video {
    background-color: #5C17E5;
    color: white;
    border: none;
    width: 108px;
    height: 39px;
    border-radius: 16px;
    margin-left: 6%;
}

.quiz-card-type {
    box-shadow: none;
    background-color: #F6F8FB;
}

.quiz-card-title {
    font-size: 14px;
    font-weight: 600;
    text-align: center;
}

.quiz-icon {
    cursor: pointer;
}

.quiz-type-col {
    display: flex;
    justify-content: center;
    margin-bottom: 0.9rem !important;
}

.main-title {
    font-size: 18px;
    font-weight: 600 !important;
}

#quiz-type-creation-section {
    position: relative;
    min-height: 200px;
}

.sec {
    height: 619px;
}


.custom-video-container {
    padding: 0%;
    padding-left: 0%;
    height: 625px;
}

.upload-short {
    background-color: #ECEFF4;
    border-radius: 16px 0px 0px 16px;
}

.short-upload-container {
    height: 93%;
    border: 1px dashed gray;
    margin: 4%;
    border-radius: 7px;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 7%;
}


.short-upload-container-text {
    text-align: center;
    color: black;
}

.upload-short-video {
    background-color: #5C17E5;
    color: white;
    border: none;
    width: 108px;
    height: 39px;
    border-radius: 16px;
    margin-left: 6%;
}

.replace-btn {
    position: absolute;
    top: 10px;
    left: -50px;
    z-index: 1;
}

.shortVid {
    width: 100%;
    height: 100%;
    border-radius: 16px 0px 0px 16px;
    object-fit: cover;
}

.add-short-card {
    width: 98%;
    margin-left: 2%;
}
</style>