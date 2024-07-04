<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Location $location
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Location'), ['action' => 'edit', $location->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Location'), ['action' => 'delete', $location->id], ['confirm' => __('Are you sure you want to delete # {0}?', $location->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Locations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Location'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="locations view content">
            <h3><?= h($location->city) ?></h3>
            <table>
                <tr>
                    <th><?= __('City') ?></th>
                    <td><?= h($location->city) ?></td>
                </tr>
                <tr>
                    <th><?= __('State') ?></th>
                    <td><?= h($location->state) ?></td>
                </tr>
                <tr>
                    <th><?= __('Zip Code') ?></th>
                    <td><?= h($location->zip_code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Country') ?></th>
                    <td><?= h($location->country) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($location->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Users') ?></h4>
                <?php if (!empty($location->users)) : ?>
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
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($location->users as $users) : ?>
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
                            <td><?= h($users->created) ?></td>
                            <td><?= h($users->modified) ?></td>
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
