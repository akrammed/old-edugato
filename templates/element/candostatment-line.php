<div class="position-relative" style="margin-bottom: 20px;">

    <div class="d-flex align-items-center">
        <div>
            <div class="demo-inline-spacing">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary btn-icon rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= $i ?>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">

                        <li><button style="background: none; border:none" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modaleEditCanDo<?= $cd->id ?>">Edit</button></li>
                        <li><button style="background: none; border:none" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modaleDeleteCanDo<?= $cd->id ?>">Delete</button></li>
                    </ul>
                </div>
            </div>
            <form action="<?= $this->Url->build([
                                'plugin' => null,
                                'controller' => $type,
                                'action' => 'delete',
                                $cd->id
                            ]) ?>" method="post">
                <input type="hidden" name="_csrfToken" value="<?= $this->request->getAttribute('csrfToken') ?>">
                <div class="modal fade" id="modaleDeleteCanDo<?= $cd->id ?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="canDSTitle">Delete <?= $cd->title ?></h3>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col mb-3">
                                        <h5 class="text-danger">Are you sure want to delete <?= $cd->title ?></h5>
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
        </div>
        <div class="" style="margin-top: 3.5%;">
            <h3 class="canDSTitle"><?= $cd->title ?></h3>

        </div>

    </div>
    <div class="ms-5">
        <?php foreach ($cd->shorts as $short) {
        ?>
            <div class="d-flex align-items-center" style="margin-top: -3%;">
                <div class="demo-inline-spacing">
                    <div class="btn-group">
                        <button type="button" class="border-0" style="background:none;" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">

                            <li><a  href="  <?= $this->Url->build(['controller'=>'Shorts', 'action'=>'edit',$short->id]) ?>"style="background: non1e; border:none" class="dropdown-item" >Edit</a></li>
                            <li><button style="background: none; border:none" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modaleDeleteShort<?= $short->id ?>">Delete</button></li>
                        </ul>
                    </div>
                </div>
                <form action="<?= $this->Url->build([
                                    'plugin' => null,
                                    'controller' => "shorts",
                                    'action' => 'deleteFromCanDo',
                                    $short->id,
                                    $cd->learningpath_id
                                ]) ?>" method="post">
                    <input type="hidden" name="_csrfToken" value="<?= $this->request->getAttribute('csrfToken') ?>">
                    <div class="modal fade" id="modaleDeleteShort<?= $short->id ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="canDSTitle">Delete <?= $short->title ?></h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col mb-3">
                                            <h5 class="text-danger">Are you sure want to delete <?= $short->title ?></h5>
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
                <h4 class="shortsTitle" style="margin-top: 3.5%;"><?= $short->title ?></h4>
            </div>

        <?php
        }
        ?>
    </div>

    <div class="d-flex align-items-center ms-3">
        <div class="d-flex mt-3 ms-2">
            <button style="background: none; border:none" class="me-3">
                <h5 class="titleAddSection" data-bs-toggle="modal" data-bs-target="#modalAddShortTitle<?= $cd->id ?>">Add component</h5>
            </button>
            <button style="background: none; border:none">
                <h5 class="titleAddSection">Import component</h5>
            </button>
        </div>

    </div>

</div>
<?= $this->element('modals/edit-cando', ['candostatment' => $cd]) ?>
<?= $this->element('modals/add-short-title', ['cd' => $cd]) ?>

<style>
    .canDSTitle {
        font-family: "Poppins" !important;
        font-size: 22px;
        font-style: normal;
        font-weight: 600;
        line-height: 24px;
    }

    .shortsTitle {
  style font-family: "Poppins" !important;
        font-size: 18px;
        font-style: normal;
        font-weight: 600;
        line-height: 24px;
    }
</style>