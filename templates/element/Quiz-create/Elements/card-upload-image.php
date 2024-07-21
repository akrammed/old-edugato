<div class="upload-card" id="imageCard<?= $id ?>">
    <div class="upload-card__container">
        <div class="position-absolute cursor-pointer btn btn-destructive btn-icon p-0" style="right: 12px; top: 12px;" id="delteCardBtn<?= $id ?>">
            X
        </div>
        <div class="d-flex flex-column align-items-center gap-1">
            <!-- <div class="borderContour" id="brd<?= $id ?>" style="display: flex; flex-direction: column;  align-items: center;"> -->
            <div class="flex-shrink-0">
                <?= $this->element('icons/image-upload') ?>
            </div>
            <div class="d-flex flex-column align-items-center mt-2">
                <p class="text-xs fw-semibold">Drop image here</p>
                <div class="divider divider--xs my-1">
                    <span class="divider__line"></span>
                    <span class="divider__text">OR</span>
                    <span class="divider__line"></span>
                </div>
                <button type="button" class="btn btn-secondary btn-sm" id="browseBtn<?= $id ?>">Browse</button>
            </div>
            <div class="h-100 d-none position-relative" id="imageUploadedDiv<?= $id ?>">
            </div>
        </div>
        <input id="wordInput<?= $id ?>" type="text" placeholder="Correct Word" class="w-100 mt-3 text-center">
    </div>
    <?= $this->Form->control('images[]', ['type' => 'file', 'label' => false, 'class' => 'd-none', 'id' => 'image' . $id,'required' => true,]) ?>
</div>