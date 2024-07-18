<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Register -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center">
                        <a href="index.html" class="app-brand-link gap-2">
                            <span class="app-brand-text demo text-body fw-bolder">
                                <?= $this->Html->link(
                                    $this->Html->image('logo.png', ['style' => 'width: 100px;']),
                                    '/home',
                                    ['escape' => false, 'class' => '']
                                ) ?>

                            </span>
                        </a>
                    </div>
                    <!-- /Logo -->
                    <h4 class="mb-2">Welcome to Edugato! 👋</h4>
                    <p class="mb-4">Please sign-in to your account and start the adventure</p>

                    <?= $this->Form->create(null, [
                        'class' => 'mt-35',
                        'id' => 'login-form'
                    ]) ?>
                    <div class="mb-3">

                        <?= $this->Form->control('email', [
                            'label' => __('Email'),
                            'id' => 'email',
                            'class' => 'form-control',
                            'placeholder' => 'Enter your email',
                            'autofocus' => true,
                            'required' => true,
                        ]); ?>
                    </div>
                    <div class="mb-3 form-password-toggle">
                        <div class="d-flex justify-content-between">
                            <a href="auth-forgot-password-basic.html">
                                <small>Forgot Password?</small>
                            </a>
                        </div>
                        <?= $this->Form->control('password', [
                            'label' => __('Password'),
                            'id' => 'password',
                            'class' => 'form-control',
                            'aria-describedby' => 'password',
                            'required' => true,
                        ]); ?>

                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember-me" />
                            <label class="form-check-label" for="remember-me"> Remember Me </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                    </div>



                    <?= $this->Form->end() ?>

                    <p class="text-center">
                        <span>New on our platform?</span>
                        <a href="<?= $this->Url->build(['controller'=>'Users', 'action'=>'create']) ?>">
                            <span>Create an account</span>
                        </a>
                    </p>
                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
</div>
<style>
.btn-primary {
    color: #fff;
    background-color: #696cff;
    border-color: #696cff;
    box-shadow: 0 0.125rem 0.25rem 0 rgba(105, 108, 255, 0.4);
}
</style>