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
                <?= $this->Form->create($short, ['type' => 'file']) ?>
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
                                    <div id="quiz-type-creation-section" style="display: none;height: 580px;">

                                        <div class="container">
                                            <div id="quiz-creation-container">
                                            </div>
                                        </div>


                                    </div>

                                </div>
                                <div id="actions" style="display:none">
                                    <div class="col d-flex">
                                        <button id="cancel-quiz-create" class="cancel">Cancel</button>
                                        <button class="save">Save</button>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <?= $this->Form->control('video', [
                        'class' => 'form-control',
                        'type' => 'file',
                        'id' => 'upload-short',
                        'label' => false,
                        'hidden' => true
                    ]); ?>
                    <?= $this->Form->control('candostatment_id', [
                        'value' => $candostatmentId,
                        'hidden' => true,
                        'label' => false,
                    ]) ?>
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



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php echo $this->element('Quiz-view/Scripts/add-new-one'); ?>
<?php echo $this->element('Shorts/Scripts/short-create-script'); ?>
<?php echo $this->element('Quiz/Style/quiz-create-style'); ?>
<?php echo $this->element('Shorts/Styles/short-create-style'); ?>