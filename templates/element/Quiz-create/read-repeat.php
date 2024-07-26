<div class="upload-card" style="max-height: 140px">
    <div class="upload-card__container" id="upContainerRP">
        <p class="text-xs fw-semibold">Drop Audio here</p>
        <div class="divider divider--xs my-1">
            <span class="divider__line"></span>
            <span class="divider__text">OR</span>
            <span class="divider__line"></span>
        </div>
        <button type="button" class="btn btn-secondary btn-sm btn-sm--fix" id="browseAudioLR">Browse</button>
    </div>
    <div class="d-none align-items-center justify-content-center flex-grow-1" id="AudioContainerLR">
        <audio id="audioLR" controls>
            <source   src="" type="audio/mp3">
            Your browser does not support the audio element.
        </audio>
    </div>
</div>
<div>
    <?= $this->Form->control('correctWord',['id'=>'wordLR','class' => 'text-center w-100','placeholder'=>'Type the words from the audio right here...','label'=>false,'required' => true,]) ?>
    <?= $this->Form->control('audio', ['type' => 'file', 'label' => false, 'class' => 'd-none', 'id' => 'audioQuizLR','required' => true]) ?>
    <?= $this->Form->control('quiz_type', ['type' => 'hidden', 'value' => '7', 'id' => 'quiz_type'])?>
</div>
