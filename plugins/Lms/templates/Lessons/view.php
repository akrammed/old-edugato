<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $lesson
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Lesson'), ['action' => 'edit', $lesson->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Lesson'), ['action' => 'delete', $lesson->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lesson->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Lessons'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Lesson'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="lessons view content">
            <h3><?= h($lesson->lesson) ?></h3>
            <table>
                <tr>
                    <th><?= __('Lesson') ?></th>
                    <td><?= h($lesson->lesson) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($lesson->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($lesson->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Course Id') ?></th>
                    <td><?= $this->Number->format($lesson->course_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($lesson->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($lesson->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Courses') ?></h4>
                <?php if (!empty($lesson->courses)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Background Picture') ?></th>
                            <th><?= __('Vedio Description') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Content') ?></th>
                            <th><?= __('Study Time') ?></th>
                            <th><?= __('Video Time') ?></th>
                            <th><?= __('Exams Number') ?></th>
                            <th><?= __('Is Active') ?></th>
                            <th><?= __('Is Paid') ?></th>
                            <th><?= __('Rating Id') ?></th>
                            <th><?= __('Category Id') ?></th>
                            <th><?= __('Level Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($lesson->courses as $courses) : ?>
                        <tr>
                            <td><?= h($courses->id) ?></td>
                            <td><?= h($courses->title) ?></td>
                            <td><?= h($courses->background_picture) ?></td>
                            <td><?= h($courses->vedio_description) ?></td>
                            <td><?= h($courses->description) ?></td>
                            <td><?= h($courses->content) ?></td>
                            <td><?= h($courses->study_time) ?></td>
                            <td><?= h($courses->video_time) ?></td>
                            <td><?= h($courses->exams_number) ?></td>
                            <td><?= h($courses->is_active) ?></td>
                            <td><?= h($courses->is_paid) ?></td>
                            <td><?= h($courses->rating_id) ?></td>
                            <td><?= h($courses->category_id) ?></td>
                            <td><?= h($courses->level_id) ?></td>
                            <td><?= h($courses->created) ?></td>
                            <td><?= h($courses->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Courses', 'action' => 'view', $courses->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Courses', 'action' => 'edit', $courses->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Courses', 'action' => 'delete', $courses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $courses->id)]) ?>
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
