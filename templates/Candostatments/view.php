<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Candostatment $candostatment
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Candostatment'), ['action' => 'edit', $candostatment->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Candostatment'), ['action' => 'delete', $candostatment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $candostatment->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Candostatments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Candostatment'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="candostatments view content">
            <h3><?= h($candostatment->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($candostatment->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Learningpath') ?></th>
                    <td><?= $candostatment->hasValue('learningpath') ? $this->Html->link($candostatment->learningpath->id, ['controller' => 'Learningpaths', 'action' => 'view', $candostatment->learningpath->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($candostatment->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Shorts') ?></h4>
                <?php if (!empty($candostatment->shorts)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Video') ?></th>
                            <th><?= __('Quiz Id') ?></th>
                            <th><?= __('Candostatment Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($candostatment->shorts as $short) : ?>
                        <tr>
                            <td><?= h($short->id) ?></td>
                            <td><?= h($short->title) ?></td>
                            <td><?= h($short->description) ?></td>
                            <td><?= h($short->video) ?></td>
                            <td><?= h($short->quiz_id) ?></td>
                            <td><?= h($short->candostatment_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Shorts', 'action' => 'view', $short->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Shorts', 'action' => 'edit', $short->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Shorts', 'action' => 'delete', $short->id], ['confirm' => __('Are you sure you want to delete # {0}?', $short->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
