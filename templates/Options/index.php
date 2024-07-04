<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Option> $options
 */
?>
<div class="options index content">
    <?= $this->Html->link(__('New Option'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Options') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('qoption') ?></th>
                    <th><?= $this->Paginator->sort('is_correct') ?></th>
                    <th><?= $this->Paginator->sort('oorder') ?></th>
                    <th><?= $this->Paginator->sort('palette') ?></th>
                    <th><?= $this->Paginator->sort('imageName') ?></th>
                    <th><?= $this->Paginator->sort('quiz_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($options as $option): ?>
                <tr>
                    <td><?= $this->Number->format($option->id) ?></td>
                    <td><?= h($option->qoption) ?></td>
                    <td><?= $option->is_correct === null ? '' : $this->Number->format($option->is_correct) ?></td>
                    <td><?= h($option->oorder) ?></td>
                    <td><?= h($option->palette) ?></td>
                    <td><?= h($option->imageName) ?></td>
                    <td><?= $option->quiz_id === null ? '' : $this->Number->format($option->quiz_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $option->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $option->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $option->id], ['confirm' => __('Are you sure you want to delete # {0}?', $option->id)]) ?>
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
