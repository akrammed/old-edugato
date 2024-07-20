<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Short $short
 * @var \Cake\Collection\CollectionInterface|string[] $shortTypes
 * @var int  $candostatmentId;
 */
?>
<div class="container-xxl flex-grow-1 mt-3 content-container" id="scContent">
    <div class="row">
        <div class="col-md-10 w" style="min-height:619px!important; border-radius: 16px ">
            <div class="card mb-3 add-short-card ">
                <?= $this->Form->create($short, ['type' => 'file', 'id' => 'short-edit', 'enctype' => 'multipart/form-data']) ?>
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
                        <button type="button" class="upload-short-video replace-btn" style="display:none" onclick="$('#videoInput').click();">Replace</button>
                        <video class="shortVid course-img img-fluid" style="display:none" src="" autoplay="" controls muted></video>
                    </div>
                    <div class="col-md-8">
                        <section class="sec mt-5" id="section">
                            <div id="take-quiz-2">
                                <div class="conversation " style="flex-direction: column;">

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

                                        <div class="container">
                                            <div id="quiz-creation-container">
                                            </div>
                                        </div>


                                    </div>

                                </div>
                                <div id="actions" style="display:none">
                                    <div class="col d-flex">
                                        <button id="cancel-quiz-create" class="cancel">Cancel</button>
                                        <button id="save-short-btn" class="save">Save</button>
                                        <button id="send-short-btn" type="submit" class="send" hidden></button>
                                        <?= $this->Form->control('video', [
                                            'class' => 'form-control visually-hidden',
                                            'type' => 'file',
                                            'id' => 'upload-short',
                                            'label' => false,
                                            'required' => true,
                                            'style' => 'display:none'
                                        ]); ?>
                                        <?= $this->Form->control('candostatment_id', [
                                            'value' => $candostatmentId,
                                            'hidden' => true,
                                            'label' => false,
                                            'style' => 'display:none'
                                        ]) ?>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>

                </div>
                <?= $this->Form->end() ?>
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

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    $('#save-short-btn').on('click', function(event) {
        event.preventDefault();
        var files = $('#upload-short')[0].files;
        var formData = new FormData();
        for (var i = 0; i < files.length; i++) {
            formData.append('files', files[i]);
        }
        console.log(formData);
        axios.post('http://127.0.0.1:8000/upload/', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
            .then(function(response) {
                console.log('Response:', response.data);
                $('#send-short-btn').click();
            })
            .catch(function(error) {
                console.error('There was an error uploading the file!', error);
            });
    });
</script>