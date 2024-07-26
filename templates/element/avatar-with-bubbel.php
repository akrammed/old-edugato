<div class="d-flex flex-column gap-2 align-items-center flex-shrink-0">
    <p class="text-center text-sm opacity-75"><span class="fw-semibold">Quiz question goes here:</span> Click on bubble to edit</p>
    <div class="d-flex gap-4 align-items-center justify-content-center">
        <div class="pt-4">
            <?= $this->element('icons/avatar') ?>
        </div>
        <?= $this->Form->control('question', ['class' => "avatarText", 'value' => $text, 'label' => false, 'required' => true]) ?>
    </div>
</div>
