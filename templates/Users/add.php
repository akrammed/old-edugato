<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var \Cake\Collection\CollectionInterface|string[] $roles
 * @var \Cake\Collection\CollectionInterface|string[] $locations
 * @var \Cake\Collection\CollectionInterface|string[] $courses
 */
?>
<div class="panel-content">

    <div class="webinar-progress d-block d-lg-flex align-items-center p-15 panel-shadow bg-white rounded-sm"
        style="margin-top:20px;">
        <div class="col-12 col-md-12 mt-15">
            <?= $this->Form->create($user) ?>
            <div class="row">
                <div class="col-6">
                    <div class="form-group mt-15">
                        <?= $this->Form->control('first_name', [
                            'class' => 'form-control',
                            'lable' => __('First Name'),
                            'type' => 'text'

                        ]);

                        ?>

                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group mt-15">
                        <?= $this->Form->control('last_name', [
                            'label' => __('Last Name'),
                            'class' => 'form-control',
                            'type' => 'text'
                        ]); ?>

                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group mt-15">
                        <?= $this->Form->control('gender', [
                            'class' => 'form-control',
                            'lable' => __('Gender'),


                        ]);

                        ?>

                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group mt-15">
                        <?= $this->Form->control('phone_number', [
                            'label' => __('Phone number'),
                            'class' => 'form-control',
                        ]); ?>

                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group mt-15">
                        <?= $this->Form->control('email', [
                            'class' => 'form-control',
                            'lable' => __('Email'),


                        ]);

                        ?>

                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group mt-15">
                        <?= $this->Form->control('username', [
                            'label' => __('Username'),
                            'class' => 'form-control',
                        ]); ?>

                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group mt-15">
                        <?= $this->Form->control('password', [
                            'class' => 'form-control',
                            'lable' => __('Password'),


                        ]);

                        ?>

                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group mt-15">
                        <?= $this->Form->control('birth_date', [
                            'label' => __('Birth date'),
                            'class' => 'form-control',
                        ]); ?>

                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group mt-15">
                        <?= $this->Form->control('bio', [
                            'class' => 'form-control',
                            'lable' => __('Bio'),


                        ]);

                        ?>

                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group mt-15">
                        <?= $this->Form->control('role_id', [
                            'label' => __('Role'),
                            'class' => 'form-control',
                        ]); ?>

                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group mt-15">
                        <?=$this->Form->control('course_id', ['options' => $courses, "empty" => "Select a course",'label'=>'Course', 'class' => 'form-control',]);

                        ?>

                    </div>
                </div>

            </div>
            <?php


            ?>

                <div class="mt-20 mt-md-0">

                <?= $this->Form->button(__('Save'),['id'=>'saveUser','class'=>'btn btn-sm btn-primary']); ?>


                </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
