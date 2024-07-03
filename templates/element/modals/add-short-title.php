<div class="modal fade" id="modalAddShortTitle<?=$cd->id?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="canDSTitle">Add Short title</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= $this->Url->build([
                                'plugin' => null,
                                'controller' => "shorts",
                                'action' => 'add',
                            ]) ?>" method="post">
                <?= $this->Form->control('candostatment_id', [
                    'type' => "hidden",
                    'value' => $cd->id
                ]);

                ?>
                <input type="hidden" name="_csrfToken" value="<?= $this->request->getAttribute('csrfToken') ?>">

                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-0">
                            <?= $this->Form->control('title', [
                                'class' => 'form-control',
                                'lable' => __('Title'),
                                'placeholder' => __('Enter Title here...'),

                            ]);

                            ?>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" style="background-color:#E0EDFF;color: #5C17E5" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <?= $this->Form->button(__('Save'), ['id' => 'saveCanDo', 'class' => 'btn', 'style' => "background-color:#5C17E5;color: #FFF"]); ?>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
        .canDSTitle {
        font-family: "Poppins" !important;
        font-size: 22px;
        font-style: normal;
        font-weight: 600;
        line-height: 24px;
    }
</style>