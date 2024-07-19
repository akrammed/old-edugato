<div class="container w-100">
    <?= $this->element('avatar-with-bubbel', ['text' => "Listen and order the words"]) ?>
    <div class="borderContour mx-auto d-flex flex-column justify-content-center p-3" style="width: 190px;" id="upContainerLO">
        <p class="text-center" style="font-size: 11px; font-weight: 400;">Drop Audio here</p>
        <p class="text-center" style="font-size: 11px; font-weight: 400;">Or</p>
        <button type="button" class="browseBtn" id="browseAudioLO">Browse</button>



    </div>
    <div class="d-none mx-auto flex-column justify-content-center mt-3" id="AudioContainerLO">
        <audio id="audioLO" controls>
            <source src="" type="audio/mp3">
            Your browser does not support the audio element.
        </audio>
    </div>
 
    <?= $this->Form->control('audio', ['type' => 'file', 'label' => false, 'class' => 'd-none', 'id' => 'audioQuizListenOrder','required' => true,]) ?>
    <?= $this->Form->control('quiz_type', [
        'type' => 'hidden',
        'value' => '6',
        'id' => 'quiz_type',
    ]) ?>

    <div class="mt-4">
        <h5 class="typeWords">
            Type the correct words in order here
        </h5>
        <div class="d-flex align-items-center">
            <?php
            for ($i = 1; $i <= 3; $i++) {
            ?>
                <div class="col-4">
                    <?= $this->Form->control('correctWords[]', [
                        'placeholder' => 'word',
                        'class' => 'false-option',
                        'label' => false,
                        'required' => true,
                        'id' => 'orderOption' . $i,
                    ]); ?>
                </div>

            <?php
            }
            ?>
        </div>
    </div>



    <div class="mt-4 mb-2">
        <h5 class="typeWords">
            Type the extra words here
        </h5>
        <div class="d-flex align-items-center">
            <div class="d-flex align-items-center">
                <?php
                for ($i = 1; $i <= 3; $i++) {
                ?>
                    <div class="col-4">
                        <?= $this->Form->control('moreOptions[]', [
                            'value' => 'word',
                            'class' => 'false-option',
                            'label' => false,
                            'id' => 'orderOption' . $i,
                        ]); ?>
                    </div>
                <?php
                }
                echo $this->Form->control('quiz_type', [
                    'type' => 'hidden',
                    'value' => '6',
                    'id' => 'quiz_type',
                ]) ?>

            </div>
        </div>
    </div>

</div>

<style>
    .word {
        padding: 4px 8px;
        align-items: flex-start;
        align-content: flex-start;
        gap: 12px;
        flex-wrap: wrap;
        margin-right: 3%;
        border-radius: 16px;
        height: 34px;

        box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.16);
        /* font-family: "Lexend"; */

        /* 150% */

    }

    .wordText {
        font-size: 16px;
        font-style: normal;
        font-weight: 500;
        line-height: 24px;
        color: white;
    }

    .newWord {
        padding: 8px 16px;
        justify-content: center;
        align-items: center;
        gap: 12px;
        border-radius: 16px;
        border: 1px solid #9AA8BC;
        background: var(--Background-Primary, #FFF);
        /* Elevation/Small */
        box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.16);

    }

    .typeWords {
        color: #000;
        /* font-family: "Lexend"; */
        font-size: 16px;
        font-style: bold;
        font-weight: 600;
        line-height: 24px;

    }

    .correctWordInput {
        border-radius: 8px;
        background: #F6F8FB !important;
        box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.16) inset;
        height: 61px;

    }

    .browseBtn {
        border-radius: 9.117px;
        background: #5C17E5;
        color: white;
        border: none;
        font-size: 7.977px;
        width: 61.54px;
        height: 22.223px;
        align-self: center;

    }

    .borderContour {

        margin: 10px;
        border-radius: 4.558px;
        border: 1px dashed #728197;
        height: 91px;
        margin-top: 3%;

    }

    .false-option {
        width: 95% !important;
    }
</style>