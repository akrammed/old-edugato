<div class="d-flex flex-column border-b-2 px-2">
    <p class="text-xl">Choose the correct image</p>
    <div class="d-flex align-items-center justify-content-center">
        <div class="pt-4">
            <?php echo $this->element('icons/monkey'); ?>
        </div>
        <p class="text-lg pb-4">Can I have the banana, please?</p>
    </div>
</div>
<div class="d-grid grid-cols-4 mt-8 gap-4 max-w-2xl w-100 grid-short-cards-4">
    <?php for($i = 0; $i < 4; $i++): ?>
        <div class="border-4 rounded-md h-44 h-lg-40 h-xl-44 short-card-h-4">
                <?= $this->Html->image('uploads/picture/banana.png', ['class' => 'w-100 h-100', 'style' => 'object-fit: contain;']); ?>
        </div>
    <?php endfor; ?>
</div>