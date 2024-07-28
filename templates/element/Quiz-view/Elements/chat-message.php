<?php 
    $avatar = isset($avatar) ? $avatar : 'uploads/learningpaths/385537149_1322601408386986_7911832732197511051_n.jpg';
    $dir = isset($dir) ? $dir : 'l';
?>
<div class="d-flex align-items-center gap-3 w-100 <?= $dir === 'r' ? 'flex-row-reverse' : '' ?>">
    <div class="w-16 h-16 rounded-circle overflow-hidden flex-shrink-0">
        <?= $this->Html->image("$avatar", ['class' => 'w-100 h-100', 'style' => 'object-fit: cover;']); ?>
    </div>
    <p class="px-4 py-2 rounded-xl text-base h-fit <?= $dir === 'l' ? 'bg-primary/30' : 'bg-accent' ?>">
        My first name is David.
        <?php if ($dir === 'l'): ?>
            <button class="btn-reset mb-0.5"><?= $this->element('icons/volume-up-icon', ['class' => 'w-5 h-5']) ?></button>
        <?php endif; ?>
    </p>
</div>