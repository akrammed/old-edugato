<div class="container" id="1">
    <?= $this->element('avatar-with-bubbel', ['text' => "Tap the right word"]) ?>
    <div style="margin-top: 22%; margin-left: 11%;">
        <p>Enter the correct option first</p>
        <div class="container" style="margin-left:-6%">
            <div class="row">
                <?php
                for ($i = 0; $i < 3; $i++) {
                    $class = $i == 0 ? 'correct-option' : 'false-option';
                ?>
                    <div class="col-4">
                        <?= $this->Form->control('options[]', [
                            'placeholder' => 'word',
                            'class' => $class,
                            'label' => '',
                            'id' => $class . $i,
                            'required' => true, 
                        ]); ?>
                    </div>
                <?php
                }
                ?>
                <?= $this->Form->control('quiz_type', [
                    'type' => 'hidden',
                    'value' => '1',
                    'id' => 'quiz_type',
                ]) ?>
                <style></style>
            </div>
        </div>
    </div>
</div>
