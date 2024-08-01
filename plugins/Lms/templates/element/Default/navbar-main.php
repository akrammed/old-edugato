<nav id="main-navbar" class="navbar navbar-expand-lg position-absolute top-0 left-0 w-100 z-3" style="height: 100px;">
    <div class="container-xl d-flex justify-content-between gap-4">
        <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'display', '']) ?>" style="padding-bottom: 2px;">
            <?= $this->Html->image('new-dark-logo.svg', ['class' => 'img-fluid']) ?>
        </a>
        <ul class="gap-2 d-flex reset-list">
            <?php if ($currentSessionUser == null) { ?>
                <li class="nav-item dropdown" style="margin-right: 1.5rem;">
                    <button class="btn px-0 dropdown-toggle gap-1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-globe" style="margin-right: 0.25rem;"></i>
                        English
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Arabic</a></li>
                        <li><a class="dropdown-item" href="#">French</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= $this->Url->build(['controller'=>'Users', 'action'=>'login']) ?>" class="btn btn-border--secondary">Log in</a>
                </li>
                <li class="nav-item">
                    <a href="<?= $this->Url->build(['controller'=>'Users', 'action'=>'create']) ?>" class="btn btn-secondary">Sign up</a>
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
        </ul>
    </div>
</nav>
<script>
    $(document).ready(function() {
        var $navbar = $('#main-navbar');
        var scrollThreshold = 400;
        function checkScroll() {
            if ($(window).scrollTop() > scrollThreshold) {
                $navbar.addClass('position-fixed bg-background shadow-sm border-b').removeClass('position-absolute');
            } else {
                $navbar.removeClass('position-fixed bg-background shadow-sm border-b').addClass('position-absolute');
            }
        }
        checkScroll();
        $(window).scroll(checkScroll);
    });
</script>