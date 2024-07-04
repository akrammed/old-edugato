<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ShortType> $shortTypes
 */
?>
<div class="shortTypes index content">
    <?= $this->Html->link(__('New Short Type'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Short Types') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('type') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('category_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($shortTypes as $shortType): ?>
                <tr>
                    <td><?= $this->Number->format($shortType->id) ?></td>
                    <td><?= h($shortType->type) ?></td>
                    <td><?= $shortType->hasValue('user') ? $this->Html->link($shortType->user->first_name, ['controller' => 'Users', 'action' => 'view', $shortType->user->id]) : '' ?></td>
                    <td><?= $shortType->category_id === null ? '' : $this->Number->format($shortType->category_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $shortType->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $shortType->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $shortType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shortType->id)]) ?>
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
