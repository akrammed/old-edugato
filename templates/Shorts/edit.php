<script>const formDataQuiz = new FormData();</script>
<?php echo $this->element('Quiz-view/Scripts/globalFunctionQuizView'); ?>
<?php echo $this->element('Quiz-create/Scripts/add-new-one'); ?>
<?php echo $this->element('Shorts/Scripts/short-create-script'); ?>
<?php echo $this->element('Quiz-view/Styles/progress-bar'); ?>
<?php echo $this->element('Quiz-view/Styles/quiz-view-style'); ?>
<?php echo $this->element('Shorts/Styles/short-view-style'); ?>
<?php echo $this->element('Quiz-create/Styles/quiz-create-style'); ?>
<?php echo $this->element('Shorts/Styles/short-create-style'); ?>
<?php echo $this->element('dashboard/add-course'); ?>
<?php echo $this->element('dashboard/add-short'); ?>
<?php echo $this->element('dashboard/add-quiz'); ?>
<?php echo $this->element('dashboard/add-user'); ?>
<?php echo $this->element('dashboard/add-canvas', [
    'name' => 'Learning Path',
    'url' => '/learningpaths/add',
    'id' => 'offcanvasEndAddLearningPath',
]); ?>
<?php echo $this->element('dashboard/add-canvas', [
    'name' => 'Learning Path',
    'url' => '/learningpaths/add',
    'id' => 'offcanvasEndEditLearningPath',
]); ?>
<?php echo $this->element('dashboard/add-canvas', [
    'name' => 'Learning Path',
    'url' => '/users/add',
    'id' => 'offcanvasEndCanDoS',
]); ?>
    <?php echo $this->element(
'Quiz-view/Elements/sounds-effects'
); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div id="scContent" class="flex-grow-1 d-flex flex-column">
    <div class="flex-grow-1 d-flex flex-column flex-xxl-row gap-4">
        <div class="flex-grow-1 card overflow-hidden">
            <?= $this->Form->create($short, [
                'type' => 'file',
                'class' => 'flex-grow-1',
            ]) ?>
                <div class="d-flex flex-column flex-lg-row">
                    <div class="d-flex align-items-center justify-content-center position-relative" style="background-color: #ECEFF4;" id="video-container">
                        <div class="svideo-container d-flex align-items-center justify-content-center bg-foreground position-relative" style="aspect-ratio: 9 / 16; height: calc(100dvh - 102px - 2rem); width: fit-content; max-width: 500px;" id="dropZone">
                            <div class="svideo-card flex-grow-1" id="short-upload-container">
                                <?php echo $this->element('icons/drop-element'); ?>
                                <p class="text-lg lh-1 mt-2 fw-semibold">Drop Video here</p>
                                <div class="divider divider--sm">
                                    <span class="divider__line"></span>
                                    <span class="divider__text">OR</span>
                                    <span class="divider__line"></span>
                                </div>
                                <button class="btn btn-secondary" id="upload-short-video">Browse</button>
                            </div>
                            <button type="button" class="btn btn-primary position-absolute z-3" id="replace-btn" style="display:none; left: 1rem; top: 1rem;" onclick="$('#upload-short').click();">Replace</button>
                            <video id="short-video" class="w-100 h-100" style="display:none; object-fit: cover; object-position: center;" src="" autoplay="" controls muted></video>
                        </div>
                    </div>
                    <section class="quiz-section flex-grow-1 pt-8 pb-4 px-4">
                        <div id="quiz-type-section" class="w-100">
                            <h4 class="text-center">Add a Quiz Type</h4>
                            <div class="row row-cols-3 pt-4">
                                <div class="quiz-type-card">
                                    <?= $this->element('icons/text-option-icon'); ?>
                                </div>
                                <div class="quiz-type-card">
                                    <?= $this->element('icons/image-option-icon'); ?>
                                </div>
                                <div class="quiz-type-card">
                                <?= $this->element('icons/order-the-words-icon'); ?>
                                </div>
                                <div class="pt-2 quiz-type-card">
                                <?= $this->element('icons/match-icon'); ?>

                                </div>
                                <div class="pt-2 quiz-type-card">
                                <?= $this->element('icons/carusel-icon'); ?>
                                </div>
                                <div class="pt-2 quiz-type-card">
                                <?= $this->element('icons/listen-order-icon'); ?>
                                </div>
                                <div class="pt-2 quiz-type-card">
                                <?= $this->element('icons/read-repeat-icon'); ?>
                                </div>
                                <div class="pt-2 quiz-type-card">
                                <?= $this->element('icons/conversation-speaking-icon'); ?>
                                </div>
                                <!-- <div class="pt-2 quiz-type-card">
                                <?= $this->element('icons/conversation-ordering-icon'); ?>
                                </div> -->
                            </div>
                        </div>
                        <div id="quiz-type-creation-section" class="flex-grow-1 d-none flex-column w-100">
                            <div class="flex-grow-1 d-flex flex-column gap-rem-4 gap-xxl-rem-2">
                                <?= $this->element('avatar-with-bubbel', ['text' => "Listen and order the words"]) ?>
                                <div id="quiz-creation-container" class="flex-grow-1 d-flex justify-content-center flex-column gap-4 mt-8"></div>
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
        <div class="min-w-20 flex-shrink-0 d-flex flex-xxl-column" style="min-height: 220px;">
            <div class="card rounded-rem-1" style="flex-basis: 70%;">
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