<div class="container" id="1">

    <div class="gato-header-quiz-create">
        <p class="header-title-info"><strong>Quiz question goes here:</strong> Click on bubble to edit</p>

        <div class="title">
            <?= $this->element('icons/avatar') ?>
            <?= $this->element('icons/talikng-bubbls') ?>
            <input name="question" class="gato-quition-bubble" value="Tap the words to match">
        </div>
    </div>



    <div class="container" style="margin-top: 30%;">
        <div class="row">
            <h6><strong class="text-dark option-create-sub-title">Enter the correct option first</strong></h6>
            <?php
            $options = [
                [
                    'class' => 'false-option',
                    'idPrefix' => 'chooseOption'
                ]
            ];
            for ($i = 1; $i <= 3; $i++) {
                foreach ($options as $option) {
            ?>
                    <div class="col-sm-4">

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
            <?= $this->Form->control('quiz_type', [
                'type' => 'hidden',
                'value' => '1',
                'id' => 'quiz_type',
                'style' => 'display:none',
            ]) ?>
        </div>
    </div>
</div>
</div>