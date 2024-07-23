<div class="max-w-xl mx-auto">
    <div class="d-flex flex-column gap-12">
        <div class="space-y-2">
            <a class="link color-muted d-flex align-items-center gap-3 text-lg" href="<?= $this->Url->build('/admin') ?>"><i class="fa-solid fa-chevron-left"></i> Back to Dashboard</a>
            <h2 class="text-3xl"><?= __('Edit Profile') ?></h2>
        </div>
        <?= $this->Form->create($user ,['type'=>'file']) ?>
            <div class="d-flex flex-column align-items-center gap-4">
                <?php
                    $profile =  $currentSessionUser->profile_picture != null ? '/uploads/pictures/' . $currentSessionUser->profile_picture : 'profile.png';
                    echo $this->Html->image($profile, ['alt' => 'textalternatif','id'=>'pathImage', 'class' => 'img-fluid rounded-lg w-40 h-40 object-cover']);
                ?>
                <?= $this->Form->control('profile_picture', [
                        'class' => 'form-control',
                        'label' => ['text' => __('Change Photo'), 'class' => 'btn btn-white--shadow btn-sm'],
                        'type' => 'file',
                        'hidden' => true,
                        'id' => 'profile-picture']);?>
            </div>
            <div class="mt-12 space-y-4">
                <div class="d-flex justify-content-between gap-4">
                    <?= $this->Form->control('first_name', [
                        'class' => 'form-control mt-2',
                        'lable' => __('First Name'),
                        'type' => 'text',
                        'placeholder' => __('Enter first name here...')]);?>
                    <?= $this->Form->control('last_name', [
                        'label' => __('Last Name'),
                        'class' => 'form-control mt-2',
                        'type' => 'text',
                        'placeholder' => __('Enter last name here...')]); ?>
                </div>
                <div class="position-relative">
                    <?= $this->Form->control('email', [
                        'type' => 'email',
                        'class' => 'form-control mt-2 changed-input',
                        'label' => __('Email'),
                        'placeholder' => __('Enter email here...'),
                        'readonly' => true,
                        'id' => 'email'
                    ]); ?>
                    <button type="button" class="position-absolute toggle-btn text-base color-primary btn px-0" style="right: 1rem; bottom: 0px;">Change</button>
                </div>
                <div class="position-relative">
                    <?= $this->Form->control('password', [
                        'type' => 'password',
                        'class' => 'form-control mt-2 changed-input',
                        'label' => __('Password'),
                        'placeholder' => __('Enter password here...'),
                        'readonly' => true,
                        'id' => 'password',
                        'value' => ''
                    ]); ?>
                    <button type="button" class="position-absolute toggle-btn text-base color-primary btn px-0" style="right: 1rem; bottom: 0;">Change</button>
                </div>
            </div>
            <?= $this->Form->button(__('Save Changes'), ['id' => 'saveUser', 'class' => 'btn btn-primary mt-6']); ?>
        <?= $this->Form->end() ?>
    </div>
</div>
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
        $('.toggle-btn').click(function() {
            var $input = $(this).siblings('.input').find('input');
            var isReadonly = $input.prop('readonly');
            if (isReadonly) {
                $input.prop('readonly', false).removeClass('changed-input');
                $(this).text('Save');
            } else {
                $input.prop('readonly', true).addClass('changed-input');
                $(this).text('Change');
            }
        });
    });
</script>