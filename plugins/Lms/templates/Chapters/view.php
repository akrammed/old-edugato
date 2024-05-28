<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $chapter
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Chapter'), ['action' => 'edit', $chapter->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Chapter'), ['action' => 'delete', $chapter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $chapter->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Chapters'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Chapter'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="chapters view content">
            <h3><?= h($chapter->chapter) ?></h3>
            <table>
                <tr>
                    <th><?= __('Chapter') ?></th>
                    <td><?= h($chapter->chapter) ?></td>
                </tr>
                <tr>
                    <th><?= __('Vedio') ?></th>
                    <td><?= h($chapter->vedio) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quizz') ?></th>
                    <td><?= h($chapter->quizz) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($chapter->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Content') ?></th>
                    <td><?= h($chapter->content) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($chapter->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Lesson Id') ?></th>
                    <td><?= $this->Number->format($chapter->lesson_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($chapter->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($chapter->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Lessons') ?></h4>
                <?php if (!empty($chapter->lessons)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Lesson') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Course Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($chapter->lessons as $lessons) : ?>
                        <tr>
                            <td><?= h($lessons->id) ?></td>
                            <td><?= h($lessons->lesson) ?></td>
                            <td><?= h($lessons->description) ?></td>
                            <td><?= h($lessons->course_id) ?></td>
                            <td><?= h($lessons->created) ?></td>
                            <td><?= h($lessons->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Lessons', 'action' => 'view', $lessons->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Lessons', 'action' => 'edit', $lessons->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Lessons', 'action' => 'delete', $lessons->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lessons->id)]) ?>
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
