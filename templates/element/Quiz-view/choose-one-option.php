<div class="container" id="1">
    <p class="part-2"><strong>Quiz question goes here:</strong> Click on bubble to edit</p>

    <div class="title">
        <?= $this->element('icons/avatar') ?>
        <?= $this->element('icons/talikng-bubbls') ?>
        <input name="question" type="text" class="text" value="Tap the words to match">
    </div>
    <div class="container" style="width: 116%; margin-left:-6%">
        <div class="row">
            <?php
                $options = [
                    [
                        'class' => 'false-option',
                        'idPrefix' => 'chooseOption'
                    ]
                ];
                for ($i = 1; $i <= 4; $i++) {
                    foreach ($options as $option) {
                ?>
            <div class="col">
                
                <?= $this->Form->control('options[]', [
                                'value' => 'word',
                                'class' => $option['class'],
                                'label' => '',
                                'id' => $option['idPrefix'] . $i,
                            ]); ?>
            </div>
            <?php
                    }
                }
                ?>
                <?= $this->Form->control('quiz_type',[
                    'type' => 'hidden',
                    'value' => '1',
                    'id' => 'quiz_type',
                ]) ?>
                <?= $this->Form->control('title',[
                    'type' => 'hidden',
                    'value' => '1',
                    'id' => 'quiz_type',
                ]) ?>
        </div>
    </div>
</div>
</div>