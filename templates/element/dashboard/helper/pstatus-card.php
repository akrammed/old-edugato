<div class="d-flex gap-1.5 h-10 h-2xl-11 px-3 rounded-lg align-items-center bg-accent" <?= empty($style) ? '' : 'style="' . htmlspecialchars($style) . '"' ?>>
    <?= $this->element('icons/' . $icon, ['class' => 'w-6 h-6']); ?>
    <p class="text-base"><?= h($text); ?></p>
</div>