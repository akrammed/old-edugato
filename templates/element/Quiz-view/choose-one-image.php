<div class="container" id="1">
    <p class="part-2"><strong>Quiz question goes here:</strong> Click on bubble to edit</p>

    <div class="title">
        <?= $this->element('icons/avatar') ?>
        <?= $this->element('icons/talikng-bubbls') ?>
        <input type="text" class="douaa" value="Tap the words to match">
    </div>
    <div style="margin-top:0%; margin-left: 16%;">
        <p>Upload correct image first</p>
        <div class="container ">
            <div class="row">
                <div class="col-6 col-sm-4" style="margin-right: 3%;"><?= $this->element('icons/image-option') ?></div>
                <div class="col-6 col-sm-4" style="margin-right: -4%;"><?= $this->element('icons/image-option-second') ?></div>

                <!-- Force next columns to break to new line at md breakpoint and up -->
                <div class="w-100 d-none d-md-block" style="margin-top: 5%;"></div>

                <div class="col-6 col-sm-4" style="margin-right: -4%;"><?= $this->element('icons/image-option-add') ?></div>
            </div>
        </div>
    </div>



</div>