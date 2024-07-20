<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\CoursesUser> $coursesUsers
 */
?>
<div class="coursesUsers index content">
    <?= $this->Html->link(__('New Courses User'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Courses Users') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('course_id') ?></th>
                    <th><?= $this->Paginator->sort('learningpath_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($coursesUsers as $coursesUser): ?>
                <tr>
                    <td><?= $this->Number->format($coursesUser->id) ?></td>
                    <td><?= $coursesUser->user_id === null ? '' : $this->Number->format($coursesUser->user_id) ?></td>
                    <td><?= $coursesUser->hasValue('course') ? $this->Html->link($coursesUser->course->title, ['controller' => 'Courses', 'action' => 'view', $coursesUser->course->id]) : '' ?></td>
                    <td><?= $coursesUser->hasValue('learningpath') ? $this->Html->link($coursesUser->learningpath->id, ['controller' => 'Learningpaths', 'action' => 'view', $coursesUser->learningpath->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $coursesUser->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $coursesUser->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $coursesUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $coursesUser->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
