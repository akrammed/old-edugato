<div class="container" id="1">
    <p class="part-2"><strong>Quiz question goes here:</strong> Click on bubble to edit</p>

    <div class="title">
        <?= $this->element('icons/avatar') ?>
        <?= $this->element('icons/talikng-bubbls') ?>
        <input type="text" class="douaa" value="Tap the words to match">
    </div>
    <div style="margin-top:30%;">
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

            ]); ?>
            <?= $this->Form->control('false-option', [
                'value' => 'word',
                'class' => 'false-option',
                'label' => '',
                'id' => 'false-option',

            ]); ?>
       
        </div>
    </div>



</div>