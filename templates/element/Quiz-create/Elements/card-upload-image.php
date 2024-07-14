<div class="col" style="height: 183px !important; text-decoration:none;" id="imageCard<?= $id ?>">
    <div class="d-flex position-absolute cursor-pointer" id="delteCardBtn<?= $id ?>" style="z-index: 999999; margin-left:16%; color:red">
        X
    </div>
    <div class="card h-100 position-relative imageUploadCard" style="width: 100%;">
        <div class="h-75 position-relative uploadImageContainer">
            <div class="borderContour" id="brd<?= $id ?>" style="display: flex; flex-direction: column;  align-items: center;">
                <?= $this->element('icons/image-upload') ?>
                <div class="card-body p-1 d-flex flex-column " style=" align-items: center;">
                    <h5 class="text-center" style="font-size: 10.977px; ">Drop image here</h5>
                    <h5 class="text-center" style="font-size: 9.838px; margin-top:-10%">Or</h5>
                    <button type="button" class="browseBtn" id="browseBtn<?= $id ?>">Browse</button>

                </div>
            </div>
            <div class="h-100 d-none" id="imageUploadedDiv<?= $id ?>">
            </div>
        </div>
        <div class="h-25 w-100 -mt-2 p-1">
            <input id="wordInput<?= $id ?>" type="text" placeholder="Correct Word" class="inputImage" style="width: inherit;">
        </div>


    </div>
    <?= $this->Form->control('images[]', ['type' => 'file', 'label' => false, 'class' => 'd-none', 'id' => 'image' . $id,'required' => true,]) ?>
</div>

<style>
    .browseBtn {
        border-radius: 9.117px;
        background: #5C17E5;
        color: white;
        border: none;
        font-size: 10.977px;
        display: flex;
        width: 61.54px;
        height: 22.223px;
        padding: 4.558px 9.117px;
        justify-content: center;
        align-items: center;
        gap: 6.838px;
        flex-shrink: 0;

    }

    .borderContour {

        margin: 10px;
        border-radius: 4.558px;
        border: 1px dashed #728197;
        height: 92%;
        margin-top: 3%;

    }

    .imageUploadCard {
        background-color: #C0D3F9;
        border-radius: 12px;
        border: 4px solid #CBD4E1;
    }

    .uploadImageContainer {
        border-radius: 8px 8px 0px 0px;
        background: #FFF;
        margin: 5px;
    }

    .inputImage {
        margin-top: -3%;
        border-radius: 16px;
        border: 1px solid #9AA8BC;
        box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.16);
        color: black;
        font-size: 12px;
        font-style: normal;
        font-weight: 500;
        line-height: 24px;
        text-align: center;

    }
</style>