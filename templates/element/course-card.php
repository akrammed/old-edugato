<div>
    <div class="d-flex position-absolute" style="z-index: 999999;">
        <a href="  <?= $this->Url->build(['controller' => $type, 'action' => 'edit', $id]) ?>"> <?= $this->element('icons/edit', ['color' => "#F6F8FB"]) ?></a>
        <button type="button" style="background:none; border:none;" data-bs-toggle="modal" data-bs-target="#modalCenter"> <?= $this->element('icons/delete', ['color' => "#F6F8FB"]) ?></button>
    </div>

    <form action="<?= $this->Url->build([
                        'plugin' => null,
                        'controller' => $type,
                        'action' => 'delete',
                        $id
                    ]) ?>" method="post">
        <input type="hidden" name="_csrfToken" value="<?= $this->request->getAttribute('csrfToken') ?>">
        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="canDSTitle">Delete <?= $title ?></h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <h5 class="text-danger">Are you sure want delete : <?= $title ?> </h5>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" style="background-color:#E0EDFF;color: #5C17E5" data-bs-dismiss="modal">
                            Cancel
                        </button>
                        <button type="submit" class="btn" style="background-color:#5C17E5;color: #FFF">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <a href="<?= $this->Url->build([
                    'plugin' => null,
                    'controller' => $controller,
                    'action' => 'index',
                    $id
                ]) ?>" class="col" style="height: 195.029px !important; text-decoration:none; ">
        <div class="card courseContainter h-100 ">
            <?= $this->Html->image('/uploads/learningpaths/' . $img, ['class' => 'course-img-top', 'style' => 'height: 142.402px !important;', 'alt' => "Card image cap"]) ?>
            <div class="card-body p-1">
                <h5 class="text-center p-2 cardTitle"><?= $title ?></h5>
            </div>
        </div>
    </a>
</div>

<style>
    .courseContainter {
        background-color: #F6F8FB;
        box-shadow: 0px 3.096px 6.191px 0px rgba(0, 0, 0, 0.16);
    }

    .cardTitle {
        color: #000;
        font-family: "Poppins";
        font-size: 17.026px;
        font-style: normal;
        font-weight: 600;
        line-height: 18.574px;
        /* 109.091% */
    }

    .canDSTitle {
        font-family: "Poppins" !important;
        font-size: 22px;
        font-style: normal;
        font-weight: 600;
        line-height: 24px;
    }
</style>