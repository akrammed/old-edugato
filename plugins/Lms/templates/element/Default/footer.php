









<footer class="footer bg-secondary position-relative user-select-none">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class=" footer-subscribe d-block d-md-flex align-items-center justify-content-between">
                    <div class="flex-grow-1">
                        <strong><?= __('Join us today') ?></strong>
                        <span class="d-block mt-5 text-white">
                            <?= __('We will send the best deals and offers to your email.') ?>
                        </span>
                    </div>
                    <div class="subscribe-input bg-white p-10 flex-grow-1 mt-30 mt-md-0">
                        <form action="/newsletters" method="post">


                            <div class="form-group d-flex align-items-center m-0">
                                <div class="w-100">
                                    <input type="text" name="newsletter_email" class="form-control border-0 " placeholder="Enter your email here" />
                                </div>

                                <?= $this->Html->link(__('Join'), '/comming-lms', ['class' => 'btn btn-primary rounded-pill']) ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">

            <div class="col-6 col-md-6"  style="margin-top: 40px;">
                <span class="header d-block text-dark font-weight-bold"><?= __('ABOUT US') ?></span>

                <div class="mt-20">
                    <p class="text-dark">
                        <font>We are a passionate and dedicated team of education and information technology professionals who share a common vision: to provide an exceptional online English learning experience.</font>
                    </p>
                </div>
            </div>
            <div class="col-6 col-md-3" style="margin-top: 40px;">
                <span class="header d-block text-dark font-weight-bold"><?= __('ADDITIONAL LINKS') ?></span>

                <div class="mt-20">

                    <p>

                        <?= $this->Html->link(__('LOGIN'), ['plugin' => null, 'controller' => 'Users', 'action' => 'login'], ['style' => 'color:#003F91']) ?>
                    </p>
                    <p>
                        <?= $this->Html->link(__('CREAT NEW ACCOUNT'), '/create', ['style' => 'color:#003F91']) ?>
                    </p>

                    <p>
                        <?= $this->Html->link(__('CONTACT'), '/contact', ['style' => 'color:#003F91']) ?>
                    </p>
                    <p>
                        <?= $this->Html->link(__('ABOUT US'), '/about', ['style' => 'color:#003F91']) ?>
                    </p>

                </div>
            </div>

            <div class="col-6 col-md-3">
                <span class="header d-block text-white font-weight-bold"></span>

                <div class="mt-20">
                    <p>

                        <?=
                        $this->Html->image('logo-2.png', ['style' => 'width: 200px;']) ?>


                    </p>
                </div>
            </div>

        </div>

        <div class="mt-40 border-blue py-25 d-flex align-items-center justify-content-between">
            <div class="footer-logo">

                <?=
                $this->Html->image('logo.png', ['class' => 'img-cover', 'style' => 'width: 100px;']) ?>



            </div>
            <div class="footer-social">
                <a href="https://www.instagram.com/englishminute/" target="_blank">
                    <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox="0 0 24 24">
                        <title>ins_line</title>
                        <g id="ins_line" fill='none' fill-rule='evenodd'>
                            <path d='M24 0v24H0V0h24ZM12.593 23.258l-.011.002-.071.035-.02.004-.014-.004-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01-.017.428.005.02.01.013.104.074.015.004.012-.004.104-.074.012-.016.004-.017-.017-.427c-.002-.01-.009-.017-.017-.018Zm.265-.113-.013.002-.185.093-.01.01-.003.011.018.43.005.012.008.007.201.093c.012.004.023 0 .029-.008l.004-.014-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014-.034.614c0 .012.007.02.017.024l.015-.002.201-.093.01-.008.004-.011.017-.43-.003-.012-.01-.01-.184-.092Z' />
                            <path fill='#FFFFFFFF' d='M16 3a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5V8a5 5 0 0 1 5-5h8Zm0 2H8a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8a3 3 0 0 0-3-3Zm-4 3a4 4 0 1 1 0 8 4 4 0 0 1 0-8Zm0 2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm4.5-3.5a1 1 0 1 1 0 2 1 1 0 0 1 0-2Z' />
                        </g>
                    </svg>
                </a>

                </a>
                <a href="https://www.facebook.com/EduGatoDZ" target="_blank">
                    <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox="0 0 24 24">
                        <title>facebook_line</title>
                        <g id="facebook_line" fill='none' fill-rule='evenodd'>
                            <path d='M24 0v24H0V0h24ZM12.593 23.258l-.011.002-.071.035-.02.004-.014-.004-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01-.017.428.005.02.01.013.104.074.015.004.012-.004.104-.074.012-.016.004-.017-.017-.427c-.002-.01-.009-.017-.017-.018Zm.265-.113-.013.002-.185.093-.01.01-.003.011.018.43.005.012.008.007.201.093c.012.004.023 0 .029-.008l.004-.014-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014-.034.614c0 .012.007.02.017.024l.015-.002.201-.093.01-.008.004-.011.017-.43-.003-.012-.01-.01-.184-.092Z' />
                            <path fill='#FFFFFFFF' d='M4 12a8 8 0 1 1 9 7.938V14h2a1 1 0 1 0 0-2h-2v-2a1 1 0 0 1 1-1h.5a1 1 0 1 0 0-2H14a3 3 0 0 0-3 3v2H9a1 1 0 1 0 0 2h2v5.938A8.001 8.001 0 0 1 4 12Zm8 10c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10Z' />
                        </g>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <div class="footer-copyright-card">
        <div class="container d-flex align-items-center justify-content-between py-15">
            <div class="font-14 text-dark">EduGato 2024 - All Rights Reserved</div>

            <div class="d-flex align-items-center justify-content-center">
                

                <div class="border-left mx-5 mx-lg-15 h-100"></div>

                <div class="d-flex align-items-center text-dark font-14">
                    <i data-feather="mail" width="20" height="20" class="mr-10"></i>
                    contact@edugato.net
                </div>
            </div>
        </div>
    </div>

</footer>


<script>

</script>

<style>
    .footer .footer-subscribe {
        border-radius: 7px !important;
    }

    .rounded-pill {
        border-radius: 7px !important;
    }

    .footer .footer-subscribe .subscribe-input {
        border-radius: 0px !important;
    }
    .bg-secondary{
        background-color: white !important;
        color: #003F91 !important;
    }
    .footer-copyright-card{
        background-color: #DB5461 !important;
        color: white !important;
    }
  
</style>