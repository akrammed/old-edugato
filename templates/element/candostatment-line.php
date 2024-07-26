<div class="position-relative d-flex flex-column gap-4">
    <div class="d-flex align-items-center gap-2">
        <div>
            <button type="button" class="btn btn-icon rounded-pill shadow-md border text-lg" data-bs-toggle="dropdown" aria-expanded="false">
                <?= $i ?>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><button style="background: none; border:none" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modaleEditCanDo<?= $cd->id ?>">Edit</button></li>
                <li><button style="background: none; border:none" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modaleDeleteCanDo<?= $cd->id ?>">Delete</button></li>
            </ul>
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
        <h3 class="text-xl fw-medium"><?= h($cd->title) ?></h3>
    </div>
    <div class="ms-5 d-flex flex-column gap-4">
        <?php foreach ($cd->shorts as $short) {
        ?>
            <div>
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
                <div class="d-flex align-items-center gap-4 justify-content-between text-base" style="max-width: 320px;">
                    <div class="d-flex align-items-center gap-2">
                        <button class="btn-reset color-destructive flex-shrink-0" data-bs-toggle="modal" data-bs-target="#modaleDeleteShort<?= $short->id ?>"><i class="fa-solid fa-trash-can"></i></button>
                        <h4 class="text-lg"><?= $short->title ?></h4>
                    </div>
                    <div class="d-flex align-items-center gap-4">
                        <a  href=" <?= $this->Url->build(['controller'=>'Shorts', 'action'=>'view',$short->id]) ?>"style="background: non1e; border:none" class="flex-shrink-0 color-primary" >Preview</a>
                        <a  href=" <?= $this->Url->build(['controller'=>'Shorts', 'action'=>'edit',$short->id]) ?>"style="background: non1e; border:none" class="flex-shrink-0 color-primary" >Edit</a>
                    </div>
                </div>
            </div> 
        <?php
        }
        ?>
    </div>
    <div class="d-flex align-items-center justify-content-between text-base gap-4 ms-5" style="max-width: 320px;">
        <button class="btn-reset color-primary fw-medium" data-bs-toggle="modal" data-bs-target="#modalAddShortTitle<?= $cd->id ?>">
            Add component
        </button>
        <button class="btn-reset color-primary fw-medium">
            Import component
        </button>
    </div>
</div>
<?= $this->element('modals/edit-cando', ['candostatment' => $cd]) ?>
<?= $this->element('modals/add-short-title', ['cd' => $cd]) ?>