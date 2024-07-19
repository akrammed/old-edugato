<div class="container w-100">
    <?= $this->element('avatar-with-bubbel', ['text' => "Read and Repeat"]) ?>
    <div class="borderContour mx-auto d-flex flex-column justify-content-center p-3" style="width: 190px;" id="upContainerRP">
        <h5 class="text-center">Drop Audio here</h5>
        <h5 class="text-center">Or</h5>
        <button type="button" class="browseBtn" id="browseAudioLR">Browse</button>
    </div>
    <div class="d-none mx-auto flex-column justify-content-center mt-3" id="AudioContainerLR">
            <audio id="audioLR" controls>
                <source   src="" type="audio/mp3">
                Your browser does not support the audio element.
            </audio>
    </div>
</div>

<div class="mt-5 mx-auto w-75">
    <div class=" mt-3">
        <?= $this->Form->control('correctWord',['id'=>'wordLR','class' => 'wordAudio w-100','placeholder'=>'Type the words from the audio right here...','label'=>false,'required' => true,]) ?>
    </div>

</div>
<?= $this->Form->control('audio', ['type' => 'file', 'label' => false, 'class' => 'd-none', 'id' => 'audioQuizLR','required' => true,]) ?>
<?= $this->Form->control('quiz_type', [
                'type' => 'hidden',
                'value' => '7',
                'id' => 'quiz_type',
            ]) ?>
<style>
    .browseBtn {
        border-radius: 9.117px;
        background: #5C17E5;
        color: white;
        border: none;
        font-size: 16px;


    }

    .wordAudio {
        text-align: center;
        display: inline-flex;
        padding: 8px 16px;
        justify-content: center;
        align-items: center;
        gap: 12px;
        color: black;
        /* Label/Large */
        font-size: 16px;
        font-style: normal;
        font-weight: 500;
        line-height: 24px;
        /* 150% */
        border-radius: 16px;
        border: 1px solid #9AA8BC;
        background: #FFF;

        /* Elevation/Small */
        box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.16);
    }

    .borderContour {

        margin: 10px;
        border-radius: 4.558px;
        border: 1px dashed #728197;
        height: 92%;
        margin-top: 3%;

    }
</style>