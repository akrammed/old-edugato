<nav class="navbar navbar-expand-lg navbar-light bg-light edugato-navbar fixed-top">
    <div class="container-fluid">
        <?= $this->Html->link(
                   $this->Html->image('logo.png', ['style'=>'width: 100px;']),
                   '/home',
                  ['escape' => false, 'class' => 'navbar-brand edugato-navbar-logo']
                ) ?>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php if ($currentSessionUser == null) {
                ?>
                <li class="nav-item">
                    <?= $this->Html->link( __('الرئيسية'),'/home',['class' => 'nav-link edugato-link']) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link( __('حول المؤسسة'),'/about',['class' => 'nav-link edugato-link']) ?>
                </li>
                <?php }?>
                <li class="nav-item">
                    <?= $this->Html->link( __('دروسنا'),'/courses',['class' => 'nav-link edugato-link']) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link( __('إتصل بنا'),'/contact',['class' => 'nav-link edugato-link']) ?>
                </li>

            </ul>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <?php if ($currentSessionUser == null) {
            ?>
                <li class="nav-item">
                    <?= $this->Html->link( __('إختبر مستواك'),'https://test.edugato.net',['class' => ' nav-btn btn me-md-4 edugato-btn-bleu']) ?>
                </li>
                <li class="nav-item">
                <button data-popup="login-pop-up" class="btn nav-btn edugato-btn-light show-popup "><?= __('تسجيل الدخول')?></button>
               </li>
                <li class="nav-item">
                <button data-popup="register-pop-up" class="btn nav-btn btn-primary edugato-btn show-popup"><?=__('إنشاء حساب')?></button>
                 </li>
                   
                <?php
             }else {
            ?>
                <div class="dropdown show">
                    <a class="btn nav-btn  me-md-4 edugato-btn-bleu dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        حسابي
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <?php
                    if ($currentSessionUser != null ) {
                        if (($currentSessionUser['role_id'] == 2)) {
                    ?>
                        <?= $this->Html->link(__('Dashboard'),'/dashboard',['class'=>'dropdown-item']) ?>
                        <?php
                        }}
                    ?>
                    <?php
                    if ($currentSessionUser != null ) {
                        if (($currentSessionUser['course_id'] != 0)) {
                    ?>
                                                <?= $this->Html->link(__('دروسي'), ['plugin'=>'Lms','controller' => 'Courses', 'action' => 'Watch', $currentSessionUser['course_id'] ],['class'=>'dropdown-item']) ?>
                                                <?php
                        }else {

                            echo $this->Html->link(__('دروسي'), ['plugin'=>'Lms','controller' => 'Homes', 'action' => 'Courses' ],['class'=>'dropdown-item']);

                        }

                    }
                    ?>
                     <?= $this->Html->link(__('صفحة شخصية'),'/profile',['class'=>'dropdown-item']) ?>
                     <?= $this->Html->link(__('تسجيل خروج'),'/logout',['class'=>'dropdown-item']) ?>
                      </div>
                </div>
                <?php
             }
            ?>

            </div>

        </div>
    </div>
</nav>

<script>
<?= $this->element('Lms.Default/Scripts/bootstrap-5-3-0') ?>
</script>
<style>
.dropdown-item {
    text-align: center !important;
}
.dropdown-item:hover{
    background-color:#DB5461 !important;
    color: white !important;

}


.navbar .nav-item .nav-link {
   font-size: 14px !important;
    text-align: center;
    color: #003F91;
}


.nav-link:hover {
    color: #DB5461 !important;
}
.edugato-btn-bleu {
    background-color: white !important;
    color: #003F91 !important;
    border: 2px solid #003F91;
}

.edugato-btn-bleu:hover {
    background-color: #003F91 !important;
    color: white !important;
    border: 2px solid #003F91;
}

.edugato-link {
    text-decoration: underline;
    font-size: 20px !important;
    font-weight: 700;
    letter-spacing: 0.01em;
}

.edugato-btn-light {
    background-color: white !important;
    color: #DB5461;
    border: 2px solid #DB5461;
}

.edugato-btn-light:hover {
    background-color: #DB5461 !important;
    color: white;
    border: 2px solid #DB5461;
}

.edugato-btn-bleu,
.edugato-btn-light,
.edugato-btn {
    font-size: 12px;
    margin: 2px;
    border-radius: 0px;
}

.edugato-navbar {
    height: 88px;
}


<?php if ($currentSessionUser == null) {
                ?>
.edugato-navbar-logo {
    margin-right: 19%;
    margin-left: 10%;
}
<?php }else{ ?>
               
.edugato-navbar-logo {
    margin-right: 47%;
    margin-left: 10%;
}
<?php } ?>

@media (max-width: 991px) {
    .navbar .navbar-nav>li .nav-link {
        margin-right: 29px;
        text-align: right;
    }

    .nav-btn{
        margin-left: 72%;
    }

}

.navbar-collapse {
    background-color: #f9f9f9 !important;
}
</style>