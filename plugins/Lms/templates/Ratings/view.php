<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $rating
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Rating'), ['action' => 'edit', $rating->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Rating'), ['action' => 'delete', $rating->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rating->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Ratings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Rating'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="ratings view content">
            <h3><?= h($rating->rating) ?></h3>
            <table>
                <tr>
                    <th><?= __('Rating') ?></th>
                    <td><?= h($rating->rating) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($rating->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($rating->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($rating->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Courses') ?></h4>
                <?php if (!empty($rating->courses)) : ?>
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
                            <th><?= __('Lesson Id') ?></th>
                            <th><?= __('Rating Id') ?></th>
                            <th><?= __('Category Id') ?></th>
                            <th><?= __('Level Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($rating->courses as $courses) : ?>
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
                            <td><?= h($courses->lesson_id) ?></td>
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
