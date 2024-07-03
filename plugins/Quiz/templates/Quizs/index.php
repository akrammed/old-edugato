<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\Cake\Datasource\EntityInterface> $quizs
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
                    <th><?= $this->Paginator->sort('question') ?></th>
                    <th><?= $this->Paginator->sort('question_2') ?></th>
                    <th><?= $this->Paginator->sort('question_3') ?></th>
                    <th><?= $this->Paginator->sort('question_4') ?></th>
                    <th><?= $this->Paginator->sort('question_5') ?></th>
                    <th><?= $this->Paginator->sort('question_6') ?></th>
                    <th><?= $this->Paginator->sort('question_7') ?></th>
                    <th><?= $this->Paginator->sort('is_q_true') ?></th>
                    <th><?= $this->Paginator->sort('is_q2_true') ?></th>
                    <th><?= $this->Paginator->sort('is_q3_true') ?></th>
                    <th><?= $this->Paginator->sort('is_q4_true') ?></th>
                    <th><?= $this->Paginator->sort('is_q7_true') ?></th>
                    <th><?= $this->Paginator->sort('is_q5_true') ?></th>
                    <th><?= $this->Paginator->sort('is_q6_true') ?></th>
                    <th><?= $this->Paginator->sort('option_1') ?></th>
                    <th><?= $this->Paginator->sort('option_2') ?></th>
                    <th><?= $this->Paginator->sort('option_3') ?></th>
                    <th><?= $this->Paginator->sort('option_4') ?></th>
                    <th><?= $this->Paginator->sort('option_5') ?></th>
                    <th><?= $this->Paginator->sort('option_6') ?></th>
                    <th><?= $this->Paginator->sort('option_7') ?></th>
                    <th><?= $this->Paginator->sort('option_8') ?></th>
                    <th><?= $this->Paginator->sort('correct') ?></th>
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
                    <td><?= h($quiz->question) ?></td>
                    <td><?= h($quiz->question_2) ?></td>
                    <td><?= h($quiz->question_3) ?></td>
                    <td><?= h($quiz->question_4) ?></td>
                    <td><?= h($quiz->question_5) ?></td>
                    <td><?= h($quiz->question_6) ?></td>
                    <td><?= h($quiz->question_7) ?></td>
                    <td><?= $quiz->is_q_true === null ? '' : $this->Number->format($quiz->is_q_true) ?></td>
                    <td><?= $quiz->is_q2_true === null ? '' : $this->Number->format($quiz->is_q2_true) ?></td>
                    <td><?= $quiz->is_q3_true === null ? '' : $this->Number->format($quiz->is_q3_true) ?></td>
                    <td><?= $quiz->is_q4_true === null ? '' : $this->Number->format($quiz->is_q4_true) ?></td>
                    <td><?= $quiz->is_q7_true === null ? '' : $this->Number->format($quiz->is_q7_true) ?></td>
                    <td><?= $quiz->is_q5_true === null ? '' : $this->Number->format($quiz->is_q5_true) ?></td>
                    <td><?= $quiz->is_q6_true === null ? '' : $this->Number->format($quiz->is_q6_true) ?></td>
                    <td><?= h($quiz->option_1) ?></td>
                    <td><?= h($quiz->option_2) ?></td>
                    <td><?= h($quiz->option_3) ?></td>
                    <td><?= h($quiz->option_4) ?></td>
                    <td><?= h($quiz->option_5) ?></td>
                    <td><?= h($quiz->option_6) ?></td>
                    <td><?= h($quiz->option_7) ?></td>
                    <td><?= h($quiz->option_8) ?></td>
                    <td><?= h($quiz->correct) ?></td>
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
