<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Candostatment> $candostatments
 */
?>
<div class="candostatments index content">
    <?= $this->Html->link(__('New Candostatment'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Candostatments') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('learningpath_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($candostatments as $candostatment): ?>
                <tr>
                    <td><?= $this->Number->format($candostatment->id) ?></td>
                    <td><?= h($candostatment->title) ?></td>
                    <td><?= $candostatment->hasValue('learningpath') ? $this->Html->link($candostatment->learningpath->id, ['controller' => 'Learningpaths', 'action' => 'view', $candostatment->learningpath->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $candostatment->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $candostatment->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $candostatment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $candostatment->id)]) ?>
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
