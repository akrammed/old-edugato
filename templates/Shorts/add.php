<?php

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
                        <video class="shortVid course-img img-fluid" style="display:none" src="" autoplay="" controls muted></video>
                    </div>
                    <div class="col-md-8">
                        <section class="sec" id="section">
                            <div class="card-body h-100" id="take-quiz-2">
                                <div class="conversation h-100 w-100 d-flex justify-content-center align-items-center">
                                    <iframe src="<?php echo $this->Url->build('/quizs/add'); ?>" width="100%" height="100%" frameborder="0"></iframe>
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
    });
</script>
<style>

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