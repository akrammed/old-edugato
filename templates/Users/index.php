<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>


<div class="card users-index-card">
    <h5 class="card-header users-headr-index"><?= __('Users List')?></h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead class="table-light">
                <tr>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('role') ?></th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                        <strong  class=" text-dark"><?= h($user->first_name) .' '. h($user->last_name) ?></strong>
                    </td>
                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong class=" text-dark"><?= h($user->email) ?></strong>
                    </td>
                    <td><span class="badge bg-label-primary me-1">
                            <?= $user->hasValue('role') ? $this->Html->link($user->role->role, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?>
                        </span></td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item"
                                    href="<?php echo $this->Url->build(['controller'=>'Users', 'action'=>'edit',$user->id]); ?>"><i
                                        class="bx bx-edit-alt me-1"></i>
                                    Edit</a>
                                <a class="dropdown-item"
                                    href="<?php echo $this->Url->build(['controller'=>'Users', 'action'=>'delete',$user->id]); ?>"><i
                                        class="bx bx-trash me-1"></i>
                                    Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


<style>
.users-index-card {
    width: 96%;
    margin-left: 2%;
    margin-top: 2%;
    margin-bottom: 2%;
    border-radius: 16px;
}

.users-headr-index {
    font-weight: 600;
    color: black;
}
</style>