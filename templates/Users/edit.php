<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var string[]|\Cake\Collection\CollectionInterface $roles
 * @var string[]|\Cake\Collection\CollectionInterface $locations
 * @var string[]|\Cake\Collection\CollectionInterface $courses
 */
?>


<a href="<?= $this->Url->build('/admin') ?>">Back to Dashboard</a>

<div class="card users-card">
    <h5 class="card-header users-headr"><?= __('Edit Profile') ?></h5>
    <div class="container">
        <?= $this->Form->create($user ,['type'=>'file']) ?>


        <?php
    $profile =  $currentSessionUser->profile_picture != null ? '/img/uploads/picture/' . $currentSessionUser->profile_picture : 'profile.png';
    echo $this->Html->image($profile, ['alt' => 'textalternatif','id'=>'pathImage']);
    ?>
 <?= $this->Form->control('profile_picture', [
                        'class' => 'form-control',
                        'lable' => __('Change Photo'),
                        'type' => 'file',
                        'hidden' => true,
                        'id' => 'profile-picture',   
                    ]);
                    ?>

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
                    <?= $this->Form->control('password', [
                        'class' => 'form-control',
                        'lable' => __('Password'),
                        'placeholder' => __('Enter password here...'),


                    ]);

                    ?>

                </div>
            </div>

        </div>
       
        <div class="row">
            <div class="col-6 mt-3 mb-3">
                <?= $this->Form->button(__('Save Changes'), ['id' => 'saveUser', 'class' => 'btn btn-md btn-primary']); ?>
            </div>
        </div>



    </div>
    <?= $this->Form->end() ?>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(function() {
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#pathImage').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]); 
                }
            }

            $("#profile-picture").change(function() {
                readURL(this);
            });
        });
</script>