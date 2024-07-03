<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Quiz> $quizs
 */
?>
<div class="quizs index content">
    <?= $this->Html->link(__('New Quiz'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Quizs') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th><?= $this->Paginator->sort('quiztype_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($quizs as $quiz): ?>
                <tr>
                    <td><?= $this->Number->format($quiz->id) ?></td>
                    <td><?= h($quiz->title) ?></td>
                    <td><?= h($quiz->description) ?></td>
                    <td><?= $quiz->hasValue('quiztype') ? $this->Html->link($quiz->quiztype->type, ['controller' => 'Quiztypes', 'action' => 'view', $quiz->quiztype->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $quiz->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $quiz->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $quiz->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quiz->id)]) ?>
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
