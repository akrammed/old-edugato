<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quiztype $quiztype
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Quiztype'), ['action' => 'edit', $quiztype->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Quiztype'), ['action' => 'delete', $quiztype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quiztype->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Quiztypes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Quiztype'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="quiztypes view content">
            <h3><?= h($quiztype->type) ?></h3>
            <table>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= h($quiztype->type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($quiztype->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Quizs') ?></h4>
                <?php if (!empty($quiztype->quizs)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Quiztype Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($quiztype->quizs as $quizs) : ?>
                        <tr>
                            <td><?= h($quizs->id) ?></td>
                            <td><?= h($quizs->title) ?></td>
                            <td><?= h($quizs->description) ?></td>
                            <td><?= h($quizs->quiztype_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Quizs', 'action' => 'view', $quizs->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Quizs', 'action' => 'edit', $quizs->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Quizs', 'action' => 'delete', $quizs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quizs->id)]) ?>
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
