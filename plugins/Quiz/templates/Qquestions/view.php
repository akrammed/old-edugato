<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $qquestion
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Qquestion'), ['action' => 'edit', $qquestion->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Qquestion'), ['action' => 'delete', $qquestion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $qquestion->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Qquestions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Qquestion'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="qquestions view content">
            <h3><?= h($qquestion->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Question') ?></th>
                    <td><?= h($qquestion->question) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($qquestion->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Correct') ?></th>
                    <td><?= $qquestion->is_correct === null ? '' : $this->Number->format($qquestion->is_correct) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quiz Id') ?></th>
                    <td><?= $qquestion->quiz_id === null ? '' : $this->Number->format($qquestion->quiz_id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
