<div class="container" id="1">
    <p class="part-2"><strong>Quiz question goes here:</strong> Click on bubble to edit</p>

    <div class="title">
        <?= $this->element('icons/avatar') ?>
        <?= $this->element('icons/talikng-bubbls') ?>
        <input type="text" class="gato-quition-bubble" value="Tap the words to match">
    </div>
    <div class="space-input">
    <?= $this->element('icons/back-space') ?>
    </div>
    <div style="margin-top:7%;">
        <p>Enter the correct option first</p>
        <div style="display: flex;">
            <?= $this->Form->control('correct-option', [
                'value' => 'word',
                'class' => 'correct-option',
                'label' => '',
                'id' => 'correct-option',
                
            ]); ?>
            <?= $this->Form->control('false-option', [
                'value' => 'word',
                'class' => 'false-option',
                'label' => '',
                'id' => 'false-option',
                'style' => 'margin-left: 20% '

            ]); ?>
                <?= $this->Form->control('false-option', [
                'value' => 'word',
                'class' => 'false-option',
                'label' => '',
                'id' => 'false-option',
                'style' => 'margin-left: 40%'

            ]); ?>
       
        </div>
    </div>


</div>
