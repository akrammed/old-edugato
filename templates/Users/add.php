<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var \Cake\Collection\CollectionInterface|string[] $roles
 * @var \Cake\Collection\CollectionInterface|string[] $locations
 * @var \Cake\Collection\CollectionInterface|string[] $courses
 */
?>

<div class="container">
    <?= $this->Form->create($user) ?>
    <div class="row">
        <div class="col-6">
            <div class="form-group mt-3">
                <?= $this->Form->control('first_name', [
                    'class' => 'form-control',
                    'lable' => __('First Name'),
                    'type' => 'text',
                    'placeholder' => __('Enter first name here...'),

                ]);
                ?>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group mt-3">
                <?= $this->Form->control('last_name', [
                    'label' => __('Last Name'),
                    'class' => 'form-control',
                    'type' => 'text',
                    'placeholder' => __('Enter last name here...'),
                ]); ?>

            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-6">
            <div class="form-group mt-3">
                <?= $this->Form->control('gender', [
                    'class' => 'form-control',
                    'lable' => __('Gender'),
                    'placeholder' => __('Enter gender here...'),
                ]);

                ?>

            </div>
        </div>
        <div class="col-6">
            <div class="form-group mt-3">
                <?= $this->Form->control('phone_number', [
                    'label' => __('Phone number'),
                    'class' => 'form-control',
                    'placeholder' => __('Enter phone number here...'),
                ]); ?>

            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group mt-3">
                <?= $this->Form->control('email', [
                    'class' => 'form-control',
                    'lable' => __('Email'),
                    'placeholder' => __('Enter email here...'),


                ]);

                ?>

            </div>
        </div>
        <div class="col-6">
            <div class="form-group mt-3">
                <?= $this->Form->control('username', [
                    'label' => __('Username'),
                    'class' => 'form-control',
                    'placeholder' => __('Enter username here...'),
                ]); ?>

            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group mt-3">
                <?= $this->Form->control('password', [
                    'class' => 'form-control',
                    'lable' => __('Password'),
                    'placeholder' => __('Enter password here...'),


                ]);

                ?>

            </div>
        </div>
        <div class="col-6">
            <div class="form-group mt-3">
                <?= $this->Form->control('birth_date', [
                    'label' => __('Birth date'),
                    'class' => 'form-control',
                ]); ?>

            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group mt-3">
                <?= $this->Form->control('course_id', ['options' => $courses, "empty" => "Select a course", 'label' => 'Course', 'class' => 'form-select',]);

                ?>

            </div>
        </div>
        <div class="col-6">
            <div class="form-group mt-3">
                <?= $this->Form->control('role_id', [
                    'label' => __('Role'),
                    'class' => 'form-select',
                ]); ?>

            </div>
        </div>

    </div>
    <div class="row">

        <div class="col-6">
            <div class="form-group mt-3">
                <?= $this->Form->control('bio', [
                    'type' => 'textarea',
                    'class' => 'form-control',
                    'label' => __('Bio'),
                    'rows' => 2,
                    'placeholder' => __('Enter your bio here...'),
                ]); ?>


            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-6 mt-3">
            <?= $this->Form->button(__('Save'), ['id' => 'saveUser', 'class' => 'btn btn-md btn-primary']); ?>
        </div>
    </div>



</div>
<?= $this->Form->end() ?>
</div>