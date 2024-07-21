<div class="space-y-6 flex-shrink-0">
    <p class="text-center text-xs fw-medium"><strong>Quiz question goes here:</strong> Click on bubble to edit</p>
    <div class="d-flex gap-4 justify-content-center">
        <?= $this->element('icons/avatar') ?>
        <?= $this->Form->control('question', ['class' => "avatarText", 'value' => $text, 'label' => false, 'required' => true]) ?>
    </div>
</div>
