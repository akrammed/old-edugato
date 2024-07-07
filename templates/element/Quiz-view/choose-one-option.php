<div class="container" id="1">
    <?= $this->element('avatar-with-bubbel', ['text' => "Tap the right word"]) ?>
    <div style=" margin-top: 22%; margin-left: 11%;">
        <p>Enter the correct option first</p>
        <div class="container" style="margin-left:-6%">
            <div class="row ">
                <div class="col-4">
                    <?= $this->Form->control('correct-option', [
                        'value' => 'word',
                        'class' => 'correct-option',
                        'label' => '',
                        'id' => 'chooseOption1',
                    ]); ?>
                </div>
                <?php
                $options = [
                    [
                        'name' => 'false-option',
                        'class' => 'false-option',
                        'idPrefix' => 'chooseOption'
                    ]
                ];
                for ($i = 2; $i <= 3; $i++) {
                    foreach ($options as $option) {
                ?>
                        <div class="col-4">
                            <?= $this->Form->control($option['name'], [
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
            </div>
        </div>
    </div>
</div>