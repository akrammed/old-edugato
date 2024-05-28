<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\Cake\Datasource\EntityInterface> $qquestions
 */
?>
<div class="qquestions index content">
    <?= $this->Html->link(__('New Qquestion'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Qquestions') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('question') ?></th>
                    <th><?= $this->Paginator->sort('is_correct') ?></th>
                    <th><?= $this->Paginator->sort('quiz_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($qquestions as $qquestion): ?>
                <tr>
                    <td><?= $this->Number->format($qquestion->id) ?></td>
                    <td><?= h($qquestion->question) ?></td>
                    <td><?= $qquestion->is_correct === null ? '' : $this->Number->format($qquestion->is_correct) ?></td>
                    <td><?= $qquestion->quiz_id === null ? '' : $this->Number->format($qquestion->quiz_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $qquestion->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $qquestion->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $qquestion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $qquestion->id)]) ?>
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
