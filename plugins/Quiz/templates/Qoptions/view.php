<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $qoption
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Qoption'), ['action' => 'edit', $qoption->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Qoption'), ['action' => 'delete', $qoption->id], ['confirm' => __('Are you sure you want to delete # {0}?', $qoption->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Qoptions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Qoption'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="qoptions view content">
            <h3><?= h($qoption->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Qoption') ?></th>
                    <td><?= h($qoption->qoption) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($qoption->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Correct') ?></th>
                    <td><?= $qoption->is_correct === null ? '' : $this->Number->format($qoption->is_correct) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quiz Id') ?></th>
                    <td><?= $qoption->quiz_id === null ? '' : $this->Number->format($qoption->quiz_id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
