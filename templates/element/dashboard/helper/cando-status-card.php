<?php
    $bgColor=  ($status === 'pending' ? 'bg-accent' : ($status === 'done' ? 'bg-success/30' : 'bg-warning/30'));
    $icon= ($status === 'pending' ? 'pending-icon' : ($status === 'done' ? 'done-icon' : 'in-progress-icon'));
    $iconClass= ($status === 'pending' ? 'opacity-25' : ($status === 'done' ? 'color-success' : 'color-warning'));
?>
<div
    class="<?= "w-12 h-12 w-xl-14 h-xl-14 rounded-lg d-flex justify-content-center align-items-center " . $bgColor ?>"
    data-bs-toggle="tooltip" data-bs-placement="top"
    data-bs-custom-class="custom-tooltip"
    data-bs-title="<?= $description; ?>">
    <?=
        $this->element('icons/' . $icon, ['class' => 'w-7 h-7 w-xl-8 h-xl-8 ' . $iconClass]);
    ?>
</div>