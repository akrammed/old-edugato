<p class="text-center text-lg">Enter the correct option first</p>
<div class="d-flex gap-3">
    <?php for ($i = 0; $i < 3; $i++) {
        $class = $i == 0 ? 'correct-option' : 'false-option'; ?>
        <div style="flex: 1; min-width: 120px;">
            <?= $this->Form->control('options[]', [
                'placeholder' => 'word',
                'class' => $class,
                'label' => [
                    'text' => '',
                    'class' => 'position-absolute'
                ],
                'id' => $class . $i,
                'required' => true,
            ]) ?>
        </div>
    <?php
    } ?>
    <?= $this->Form->control('quiz_type', [
        'type' => 'hidden',
        'value' => '1',
        'id' => 'quiz_type',
    ]) ?>
</div>