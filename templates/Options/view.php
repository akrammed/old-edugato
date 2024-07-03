<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Option $option
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Option'), ['action' => 'edit', $option->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Option'), ['action' => 'delete', $option->id], ['confirm' => __('Are you sure you want to delete # {0}?', $option->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Options'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Option'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="options view content">
            <h3><?= h($option->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Qoption') ?></th>
                    <td><?= h($option->qoption) ?></td>
                </tr>
                <tr>
                    <th><?= __('Oorder') ?></th>
                    <td><?= h($option->oorder) ?></td>
                </tr>
                <tr>
                    <th><?= __('Palette') ?></th>
                    <td><?= h($option->palette) ?></td>
                </tr>
                <tr>
                    <th><?= __('ImageName') ?></th>
                    <td><?= h($option->imageName) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($option->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Correct') ?></th>
                    <td><?= $option->is_correct === null ? '' : $this->Number->format($option->is_correct) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quiz Id') ?></th>
                    <td><?= $option->quiz_id === null ? '' : $this->Number->format($option->quiz_id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
