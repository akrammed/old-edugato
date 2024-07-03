<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" style="border-radius:4%;">
    <div class="container-xxl flex-grow-1 container-p-y" style="margin-bottom: -11%;">
        <div class="d-flex form-switch align-items-center">
            <label class="form-check-label me-2" for="flexSwitchCheckDefault" style="font-size: 11px;">Dark
                mode</label>
            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"
                style="margin-left: 27%;height: 15px;">
        </div>
    </div>

    <div class="app-brand demo">

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card mb-4" style="width: 218px;margin-left: -22%;">
                <div class="card-body">

                    <div class="text-dark  fw-semibold" style="margin-bottom: 1%;font-size: 14px;">
                        <?= $course->title ?></div>
                    <div class="demo-vertical-spacing">
                        <span class="activities-count">75 % Completed</span>
                        <div class="progress" style="height: 5px;">
                            <div class="progress-bar w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0"
                                aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>
    <div class="card-body" style="margin-top: -13%;margin-bottom: -8%;">
        <div class="text-dark  fw-semibold">Lessons</div>
    </div>
    <ul class="menu-inner py-1">

        <?php $countC = 0; $countL = 0; $firstTitle = null ;  $firstVideo = null; foreach ($lessons as $l) {
                    $countL++;
                    
                    if (!$firstVideo) {
                        $firstVideo = $l->chapters[0]->vedio;
                        $firstTitle = $l->chapters[0]->chapter;
                    }
                    ?>
        <?php foreach ($l->chapters as $chap) { 
                            $countC++;
                     }?>



        <li class="menu-item custom-menu-item active" style="width: 100%;">
            <a href="javascript:void(0);" class="menu-link menu-toggle " style="border-radius: 6%;">
                <h3 class="circle"><?= $countL ?></h3>
                <div data-i18n="Layouts" style="margin-left: 6%;"><?= $l->lesson?><br>
                    <span class="activities-count"><?= $countC ?> Activities</span>
                </div>

            </a>

            <ul class="menu-sub">
                <?php foreach ($l->chapters as $chap) { 
                            $countC++;?>
                <li class="menu-item  ">
                    <a href="#" id="<?= $countC ?>" class="menu-link chapter-element chap "
                        style="border-bottom: 2px solid #CBD4E1;" data-count="<?= $countC ?>"
                        <?php if ($chap->vedio) { ?> data-video="<?= $chap->vedio ?>" <?php } else { ?>
                        data-quizze="<?= $chap->quizz ?>" <?php } ?> data-title="<?= $chap->chapter ?>">
                        <?php if ($chap->vedio) {
                                  ?>
                        <?php echo $this->element('icons/video');?>
                        <?php }else{?>
                        <?php echo $this->element('icons/quiz');?>
                        <?php }?><span style="margin-left: 5%;font-size: 14px;"> <?= $chap->chapter ?></span>

                    </a>
                </li>
                <?php } ?>

            </ul>
        </li>
        <?php  }?>

    </ul>
</aside>
<!-- / Menu -->