<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Learningpath $learningpath
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Learningpath'), ['action' => 'edit', $learningpath->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Learningpath'), ['action' => 'delete', $learningpath->id], ['confirm' => __('Are you sure you want to delete # {0}?', $learningpath->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Learningpaths'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Learningpath'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="learningpaths view content">
            <h3><?= h($learningpath->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Path') ?></th>
                    <td><?= h($learningpath->path) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($learningpath->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Picture') ?></th>
                    <td><?= $learningpath->picture === null ? '' : $this->Number->format($learningpath->picture) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Candostatments') ?></h4>
                <?php if (!empty($learningpath->candostatments)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Learningpath Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($learningpath->candostatments as $candostatment) : ?>
                        <tr>
                            <td><?= h($candostatment->id) ?></td>
                            <td><?= h($candostatment->title) ?></td>
                            <td><?= h($candostatment->learningpath_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Candostatments', 'action' => 'view', $candostatment->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Candostatments', 'action' => 'edit', $candostatment->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Candostatments', 'action' => 'delete', $candostatment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $candostatment->id)]) ?>
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
