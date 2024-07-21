<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Short $short
 * @var \Cake\Collection\CollectionInterface|string[] $shortTypes
 * @var int  $candostatmentId;
 */
?>
<div id="scContent" class="d-flex flex-column flex-xl-row gap-3 flex-grow-1 pb-3 pb-px-lg-26">
    <div class="flex-basis-xl-70 flex-basis-xxl-75 d-flex flex-column flex-shring-0">
        <div class="card flex-grow-1 rounded-rem-1 overflow-hidden">
            <?= $this->Form->create($short, [
                'type' => 'file',
                'class' => 'flex-grow-1',
            ]) ?>
                <div class="d-flex flex-column flex-lg-row flex-xl-column flex-xxl-row min-h-100">
                    <div class="svideo-container flex-basis-lg-40" id="dropZone">
                        <div class="svideo-card" id="short-upload-container">
                            <?php echo $this->element('icons/drop-element'); ?>
                            <p class="text-lg lh-1 mt-2 fw-semibold">Drop Video here</p>
                            <div class="divider divider--sm">
                                <span class="divider__line"></span>
                                <span class="divider__text">OR</span>
                                <span class="divider__line"></span>
                            </div>
                            <button class="btn btn-secondary" id="upload-short-video">Browse</button>
                        </div>
                        <div class="vid-cnt">
                        </div>
                        <button type="button" class="btn btn-secondary position-absolute" id="replace-btn" style="display:none; left: 32px; top: 32px;" onclick="$('#videoInput').click();">Replace</button>
                        <video class="shortVid course-img img-fluid" style="display:none" src="" autoplay="" controls muted></video>
                    </div>
                    <section class="quiz-section flex-basis-lg-60 p-rem-2">
                        <div id="quiz-type-section">
                            <h4 class="text-center">Add a Quiz Type</h4>
                            <div class="d-flex gap-4 flex-wrap justify-content-center pt-rem-2">
                                <div class="quiz-card">
                                     <?= $this->element('icons/text-option-icon'); ?>
                                </div>
                                <div class="quiz-card">
                                    <?= $this->element('icons/image-option-icon'); ?>
                                </div>
                                <div class="quiz-card">
                                <?= $this->element('icons/order-the-words-icon'); ?>
                                </div>
                                <div class="quiz-card">
                                <?= $this->element('icons/match-icon'); ?>

                                </div>
                                <div class="quiz-card">
                                <?= $this->element('icons/carusel-icon'); ?>
                                </div>
                                <div class="quiz-card">
                                <?= $this->element('icons/listen-order-icon'); ?>
                                </div>
                                <div class="quiz-card">
                                <?= $this->element('icons/read-repeat-icon'); ?>
                                </div>
                                <div class="quiz-card">
                                <?= $this->element('icons/conversation-speaking-icon'); ?>
                                </div>
                                <div class="quiz-card">
                                <?= $this->element('icons/conversation-ordering-icon'); ?>
                                </div>
                            </div>
                        </div>
                        <div id="quiz-type-creation-section" class="flex-grow-1 d-flex flex-column" style="display: none;">
                            <div id="quiz-creation-container" class="flex-grow-1 d-flex flex-column gap-rem-4 gap-xxl-rem-">
                            </div>
                        </div>
                        <div id="actions" style="display:none">
                            <button id="cancel-quiz-create" class="cancel">Cancel</button>
                            <button id="save-short-btn" class="save">Save</button>
                            <button id="send-short-btn" type="submit" class="send" hidden></button>
                            <?= $this->Form->control('video', [
                                'class' => 'form-control visually-hidden',
                                'type' => 'file',
                                'id' => 'upload-short',
                                'label' => false,
                                'required' => true,
                                'style' => 'display:none',
                            ]) ?>
                            <?= $this->Form->control('candostatment_id', [
                                'value' => $candostatmentId,
                                'hidden' => true,
                                'label' => false,
                                'style' => 'display:none',
                            ]) ?>
                        </div>
                    </section>
                </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
    <div class="flex-basis-xl-30 flex-basis-xxl-25 d-flex flex-xl-column gap-3 flex-shring-0" style="min-height: 320px;">
        <div class="card flex-basis-75 rounded-rem-1">
        </div>
        <div class="flex-basis-35">
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