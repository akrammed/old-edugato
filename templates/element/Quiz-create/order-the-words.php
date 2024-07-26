<div class="space-input">
    <?= $this->element('icons/back-space') ?>
</div>
<p class="text-center text-lg">List the words in the right order</p>
<div id="list-word-input" class="d-flex gap-4 flex-wrap">
    <?php
    for ($i = 1; $i <= 3; $i++) {
    ?>
        <div style="flex: 1; min-width: 120px;">
            <?= $this->Form->control('options[]', [
                'placeholder' => 'word',
                'class' => 'false-option',
                'label' => false,
                'required' => true,
                'id' => 'orderOption' . $i,
            ]); ?>
        </div>
    <?php
    }
    echo $this->Form->control('quiz_type', [
        'type' => 'hidden',
        'value' => '3',
        'id' => 'quiz_type',
    ]) ?>
</div>