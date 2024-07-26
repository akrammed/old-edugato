<div>
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
    <div class="position-relative card overflow-hidden h-100 shadow-md">
        <div class="d-flex position-absolute z-1" style="left: 0.5rem; top: 0.5rem;">
            <a href="  <?= $this->Url->build(['controller' => $type, 'action' => 'edit', $id]) ?>"> <?= $this->element('icons/edit', ['color' => "#F6F8FB"]) ?></a>
            <button type="button" style="background:none; border:none;" data-bs-toggle="modal" data-bs-target="#modalCenter"> <?= $this->element('icons/delete', ['color' => "#F6F8FB"]) ?></button>
        </div>
        <a href="<?= $this->Url->build([
                    'plugin' => null,
                    'controller' => $controller,
                    'action' => 'index',
                    $id
                ]) ?>" class="d-flex flex-column">
            <div class="w-100" style="height: 200px;">
                <?= $this->Html->image('/uploads/learningpaths/' . $img, ['class' => 'w-100 h-100', 'style' => 'object-fit: cover', 'alt' => "Card image cap"]) ?>
            </div>
            <span class="text-center text-base py-4"><?= h($title) ?></h5>
        </a>
    </div>
</div>