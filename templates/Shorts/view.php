<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Short $short
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Short'), ['action' => 'edit', $short->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Short'), ['action' => 'delete', $short->id], ['confirm' => __('Are you sure you want to delete # {0}?', $short->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Shorts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Short'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="shorts view content">
            <h3><?= h($short->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($short->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($short->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Video') ?></th>
                    <td><?= h($short->video) ?></td>
                </tr>
                <tr>
                    <th><?= __('Short Type') ?></th>
                    <td><?= $short->hasValue('short_type') ? $this->Html->link($short->short_type->id, ['controller' => 'ShortTypes', 'action' => 'view', $short->short_type->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($short->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
