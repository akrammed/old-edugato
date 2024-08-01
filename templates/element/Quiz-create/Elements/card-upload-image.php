<div class="upload-card" id="imageCard<?= $id ?>">
    <div class="upload-card__container p-0">
        <button class="position-absolute btn btn-destructive btn-icon btn-icon--xs p-0" style="right: 8px; top: 8px;" id="delteCardBtn<?= $id ?>">
            <i class="fa-solid fa-x"></i>
        </button>
        <div class="d-flex flex-column align-items-center gap-1">
            <div class="d-flex flex-column align-items-center gap-1 p-4 pb-0" id="carousel<?= $id ?>UploadContainer">
                <div class="flex-shrink-0">
                    <?= $this->element('icons/image-upload') ?>
                </div>
                <div class="d-flex flex-column align-items-center mt-2">
                    <p class="fw-semibold text-center" style="font-size: 0.75rem; white-space: nowrap;">Drop image here</p>
                    <div class="divider divider--xs my-1">
                        <span class="divider__line"></span>
                        <span class="divider__text">OR</span>
                        <span class="divider__line"></span>
                    </div>
                    <button type="button" class="btn btn-primary btn-sm btn-sm--fix" id="browseBtn<?= $id ?>">Browse</button>
                </div>
            </div>
            <div class="d-none position-relative w-100" style="height: 154px;" id="imageUploadedDiv<?= $id ?>">
            </div>
        </div>
        <div class="p-4 pt-0">
            <input id="wordInput<?= $id ?>" type="text" placeholder="Correct Word" class="w-100 mt-3 text-center" style="height: 2rem; font-size: 0.875rem;">
        </div>
    </div>
    <?= $this->Form->control('images[]', ['type' => 'file', 'label' => false, 'class' => 'd-none', 'id' => 'image' . $id,'required' => true,]) ?>
</div>