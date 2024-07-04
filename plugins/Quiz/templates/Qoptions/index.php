<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\Cake\Datasource\EntityInterface> $qoptions
 */
?>
<div class="qoptions index content">
    <?= $this->Html->link(__('New Qoption'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Qoptions') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('qoption') ?></th>
                    <th><?= $this->Paginator->sort('is_correct') ?></th>
                    <th><?= $this->Paginator->sort('quiz_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($qoptions as $qoption): ?>
                <tr>
                    <td><?= $this->Number->format($qoption->id) ?></td>
                    <td><?= h($qoption->qoption) ?></td>
                    <td><?= $qoption->is_correct === null ? '' : $this->Number->format($qoption->is_correct) ?></td>
                    <td><?= $qoption->quiz_id === null ? '' : $this->Number->format($qoption->quiz_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $qoption->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $qoption->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $qoption->id], ['confirm' => __('Are you sure you want to delete # {0}?', $qoption->id)]) ?>
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
