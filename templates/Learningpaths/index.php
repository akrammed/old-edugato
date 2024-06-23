<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Learningpath> $learningpaths
 */
?>
<div class="learningpaths index content">
    <?= $this->Html->link(__('New Learningpath'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Learningpaths') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('path') ?></th>
                    <th><?= $this->Paginator->sort('picture') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($learningpaths as $learningpath): ?>
                <tr>
                    <td><?= $this->Number->format($learningpath->id) ?></td>
                    <td><?= h($learningpath->path) ?></td>
                    <td><?= $learningpath->picture === null ? '' : $this->Number->format($learningpath->picture) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $learningpath->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $learningpath->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $learningpath->id], ['confirm' => __('Are you sure you want to delete # {0}?', $learningpath->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
