<div class="d-flex flex-column gap-4">
    <p class="text-xl">Listen and repeat the words</p>
    <div class="d-flex align-items-center justify-content-center gap-4">
        <?php echo $this->element('icons/avatar'); ?>
        <div class="bg-primary/30 px-4 py-2 rounded-xl d-flex align-items-center gap-1">
            <p class="text-base">My first name is David.</p>
            <button class="btn-reset ms-1 mb-0.5"><?= $this->element('icons/volume-up-icon', ['class' => 'w-5 h-5']) ?></button>
            <button class="btn-reset mb-0.5"><?= $this->element('icons/speed-test-icon', ['class' => 'w-5 h-5']) ?></button>
        </div>
    </div>
</div>
<button id="recordButton" class="btn btn-primary p-0 mt-8" style="height: 4.5rem; width: 4.5rem;">
    <?php echo $this->element('icons/start-record'); ?>
</button>
<!-- <?php echo $this->element('icons/record-animation'); ?> -->