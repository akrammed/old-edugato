<div class="container" id="1">
    <?= $this->element('avatar-with-bubbel', ['text' => "Tap the right word"]) ?>
    <div style=" margin-top: 4%; margin-bottom: 28%; margin-left: 11%;">
        <p>Enter the correct option first</p>
        <div class="container" style="width: 116%; margin-left:-6%">
            <div class="row">
                <div class="col">
                    <?= $this->Form->control('correct-option', [
                        'value' => 'word',
                        'class' => 'correct-option',
                        'label' => '',
                        'id' => 'chooseOption1',
                    ]); ?>
                </div>
                <?php
                // Définir les options pour les autres contrôles
                $options = [
                    [
                        'name' => 'false-option',
                        'class' => 'false-option',
                        'idPrefix' => 'chooseOption'
                    ]
                ];

                // Boucle pour créer les autres contrôles
                for ($i = 2; $i <= 4; $i++) {
                    foreach ($options as $option) {
                ?>
                        <div class="col">
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