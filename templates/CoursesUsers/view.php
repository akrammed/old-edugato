<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CoursesUser $coursesUser
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Courses User'), ['action' => 'edit', $coursesUser->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Courses User'), ['action' => 'delete', $coursesUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $coursesUser->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Courses Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Courses User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="coursesUsers view content">
            <h3><?= h($coursesUser->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Course') ?></th>
                    <td><?= $coursesUser->hasValue('course') ? $this->Html->link($coursesUser->course->title, ['controller' => 'Courses', 'action' => 'view', $coursesUser->course->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Learningpath') ?></th>
                    <td><?= $coursesUser->hasValue('learningpath') ? $this->Html->link($coursesUser->learningpath->id, ['controller' => 'Learningpaths', 'action' => 'view', $coursesUser->learningpath->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($coursesUser->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('User Id') ?></th>
                    <td><?= $coursesUser->user_id === null ? '' : $this->Number->format($coursesUser->user_id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Users') ?></h4>
                <?php if (!empty($coursesUser->users)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('First Name') ?></th>
                            <th><?= __('Last Name') ?></th>
                            <th><?= __('Gender') ?></th>
                            <th><?= __('Phone Number') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Username') ?></th>
                            <th><?= __('Password') ?></th>
                            <th><?= __('Birth Date') ?></th>
                            <th><?= __('Profile Picture') ?></th>
                            <th><?= __('Marital Status') ?></th>
                            <th><?= __('Is Active') ?></th>
                            <th><?= __('Bio') ?></th>
                            <th><?= __('Role Id') ?></th>
                            <th><?= __('Location Id') ?></th>
                            <th><?= __('Course Id') ?></th>
                            <th><?= __('Product Id') ?></th>
                            <th><?= __('Attachment Id') ?></th>
                            <th><?= __('Courses User Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($coursesUser->users as $users) : ?>
                        <tr>
                            <td><?= h($users->id) ?></td>
                            <td><?= h($users->first_name) ?></td>
                            <td><?= h($users->last_name) ?></td>
                            <td><?= h($users->gender) ?></td>
                            <td><?= h($users->phone_number) ?></td>
                            <td><?= h($users->email) ?></td>
                            <td><?= h($users->username) ?></td>
                            <td><?= h($users->password) ?></td>
                            <td><?= h($users->birth_date) ?></td>
                            <td><?= h($users->profile_picture) ?></td>
                            <td><?= h($users->marital_status) ?></td>
                            <td><?= h($users->is_active) ?></td>
                            <td><?= h($users->bio) ?></td>
                            <td><?= h($users->role_id) ?></td>
                            <td><?= h($users->location_id) ?></td>
                            <td><?= h($users->course_id) ?></td>
                            <td><?= h($users->product_id) ?></td>
                            <td><?= h($users->attachment_id) ?></td>
                            <td><?= h($users->courses_user_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
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
