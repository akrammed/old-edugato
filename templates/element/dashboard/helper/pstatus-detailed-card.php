<div class="d-flex flex-column gap-1.5 py-4 px-6 rounded-lg align-items-center bg-accent flex-grow-1 min-w-fit">
    <div class="d-flex gap-2 align-items-center opacity-60">
        <?= $this->element('icons/' . $icon, ['class' => 'w-6 h-6 rounded-circle']) ?>
        <p class="text-lg"><?= h($text) ?></p>
    </div>
    <p class="text-lg opacity-60"><?= h($description) ?></p>
</div>