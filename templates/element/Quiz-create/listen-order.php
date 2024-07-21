<?= $this->element('avatar-with-bubbel', ['text' => "Listen and order the words"]) ?>
<div class="flex-grow-1 d-flex justify-content-center flex-column gap-4">
    <div class="upload-card flex-grow-0">
        <div class="upload-card__container" id="upContainerRP">
            <p class="text-xs fw-semibold">Drop Audio here</p>
            <div class="divider divider--xs my-1">
                <span class="divider__line"></span>
                <span class="divider__text">OR</span>
                <span class="divider__line"></span>
            </div>
            <button type="button" class="btn btn-secondary btn-sm" id="browseAudioLO">Browse</button>
        </div>
        <div class="d-none flex-column align-items-center" id="AudioContainerLO">
            <audio id="audioLO" controls>
                <source src="" type="audio/mp3">
                Your browser does not support the audio element.
            </audio>
        </div>
    </div>
    <?= $this->Form->control('audio', ['type' => 'file', 'label' => false, 'class' => 'd-none', 'id' => 'audioQuizListenOrder','required' => true,]) ?>
    <?= $this->Form->control('quiz_type', ['type' => 'hidden','value' => '6','id' => 'quiz_type',])?>
    <p class="text-center text-lg fw-semibold">
        Type the correct words in order here
    </p>
    <div class="d-flex gap-3">
        <?php
        for ($i = 1; $i <= 3; $i++) {
        ?>
            <?= $this->Form->control('correctWords[]', [
                'placeholder' => 'word',
                'class' => 'false-option',
                'label' => false,
                'required' => true,
                'id' => 'orderOption' . $i,
            ]); ?>
        <?php
        }
        ?>
    </div>
    <p class="text-center text-lg fw-semibold">
        Type the extra words here
    </p>
    <div class="d-flex gap-3">
        <?php for ($i = 1; $i <= 3; $i++) { ?>
            <?= $this->Form->control('moreOptions[]', [
                'value' => 'word',
                'class' => 'false-option',
                'label' => false,
                'id' => 'orderOption' . $i,
            ]); ?>
        <?php } ?>
    </div>
    <?= $this->Form->control('quiz_type', ['type' => 'hidden','value' => '6','id' => 'quiz_type',])?>
</div>