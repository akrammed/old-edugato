<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\Cake\Datasource\EntityInterface> $quiztypes
 */
?>
<div class="quiztypes index content">
    <?= $this->Html->link(__('New Quiztype'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Quiztypes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('type') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($quiztypes as $quiztype): ?>
                <tr>
                    <td><?= $this->Number->format($quiztype->id) ?></td>
                    <td><?= h($quiztype->type) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $quiztype->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $quiztype->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $quiztype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quiztype->id)]) ?>
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
