<div class="layout-wrapper layout-content-navbar">
    <d class="layout-container">

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme custom-aside-width">


            <div class="app-brand demo">

                <div class="container-xxl mb-4" style="margin-left: -17%;">
                    <div class="center-element">
                        <div class="card-body" style="padding: 0%;">

                            <div class="text-dark  fw-semibold" style="margin-bottom: 1%;font-size: 14px;">
                                <?= $course->title ?></div>
                            <div class="demo-vertical-spacing" style="margin-top: 6%;">
                                <span class="activities-count">75 % Completed</span>
                                <div class="progress" style="height: 5px;margin-top: 4% !important;">
                                    <div class="progress-bar w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
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
            <div class="card-body" style="margin-top: -20%;margin-bottom: -8%;">
                <div class="text-dark  fw-semibold">Lessons</div>
            </div>
            <ul class="menu-inner py-1">

                <?php $countC = 0;
                $countL = 0;
                $firstTitle = null;
                $firstVideo = null;
                foreach ($lessons as $l) {
                    $countL++;

                    if (!$firstVideo) {
                        $firstVideo = $l->chapters[0]->vedio;
                        $firstTitle = $l->chapters[0]->chapter;
                    }
                ?>
                    <?php foreach ($l->chapters as $chap) {
                        $countC++;
                    } ?>



                    <li class="menu-item custom-menu-item active parent-lesson-element">
                        <a href="javascript:void(0);" class="menu-link menu-toggle lesson-element-style">
                            <h3 class="circle"><?= $countL ?></h3>
                            <div data-i18n="Layouts" style="margin-left: 12%;"><?= $l->lesson ?><br>
                                <span class="activities-count"><?= $countC ?> Activities</span>
                            </div>

                        </a>

                        <ul class="menu-sub">
                            <?php foreach ($l->chapters as $chap) {
                                $countC++; ?>
                                <li class="menu-item  ">
                                    <a style="height: 48px !important;" href="#" id="<?= $countC ?>" class="menu-link sub-menu-link chapter-element chap " data-count="<?= $countC ?>" <?php if ($chap->vedio) { ?> data-video="<?= $chap->vedio ?>" <?php } else { ?> data-quizze="<?= $chap->quizz ?>" <?php } ?> data-title="<?= $chap->chapter ?>">

                                        <?php if ($chap->vedio) {
                                        ?>
                                          <span style="margin-left: -13%;">  <?php echo $this->element('icons/video'); ?></span>
                                        <?php } else { ?>

                                            <span style="margin-left: -13%;"> <?php echo $this->element('icons/quiz'); ?></span>
                                           
                                        <?php } ?><span class="course-title-style">
                                            <?= $chap->chapter ?>
                                        </span>
                                    </a>

                                </li>
                            <?php }
                            $countC = 0; ?>

                        </ul>
                    </li>
                <?php  } ?>

            </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">



            <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme custom-navbar-style custom-header" id="layout-navbar">
                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                        <i class="bx bx-menu bx-sm"></i>
                    </a>
                </div>

                <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                    <div class="navbar-nav align-items-center">
                        <div class="nav-item d-flex align-items-center">
                            <span class="navbar-title"><?= $course->title ?></span>
                        </div>
                    </div>


                    <ul class="navbar-nav flex-row align-items-center ms-auto">

                        <li class="nav-item lh-1 me-3 custom-display">
                            <?php echo $this->element('icons/score'); ?>

                        </li>
                        <li class="nav-item lh-1 me-3 custom-display">
                            <?php echo $this->element('icons/points'); ?>

                        </li>

                        <li class="nav-item lh-1 me-3 custom-display">
                            <?php echo $this->element('icons/notification'); ?>

                        </li>
                        <!-- User -->
                        <li class="nav-item navbar-dropdown dropdown-user dropdown custom-margin">
                            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                <div class="avatar avatar-online">
                                    <?= $this->Html->image('profile.png', ['class' => 'w-px-40 h-auto rounded-circle']) ?>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">

                                <li>
                                    <a class="dropdown-item" href="https://www.edugato.net/profile" style="color:black">
                                        <i class="bx bx-user me-2"></i>
                                        <span class="align-middle">My Profile</span>
                                    </a>
                                </li>

                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="https://www.edugato.net/logout" style="color:black">
                                        <i class="bx bx-power-off me-2"></i>
                                        <span class="align-middle">Log Out</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>





            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y content-container">
                    <div class="row" id="section-1">

                        <div class="card-group" style="height: 460px;">

                            <div class="card custom-height sub-content-container border-radius-16">
                                <div class="text-center center-element">
                                    <h5 class="card-title">Welcome to <?= $course->title ?> </h5>
                                    <h6 class="card-subtitle text-muted"></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="section-2">
                        <div class="card-group " style="height: 460px;">
                            <div class="card border-radius-31">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <div class="d-flex flex-column align-items-start" style="margin-left: 16.5%;">
                                        <button id="prev" type="button" class="btn  custom-btn">
                                            <?php echo $this->element('icons/previous'); ?>
                                            <span class="custom-display prev-title">Previous</span> </button>
                                    </div>
                                    <div class="text-center">
                                        <h5 class="card-title"><?= $firstTitle ?></h5>
                                        <h6 class="card-subtitle text-muted subtitle"></h6>
                                    </div>
                                    <div class="d-flex flex-column align-items-end " style="margin-right: 16.5%;">
                                        <button id="next" type="button" class="btn custom-btn"><span class="custom-display next-title">Next</span>

                                            <?php echo $this->element('icons/next'); ?>
                                        </button>
                                    </div>
                                </div>

                                <div class="video-container">
                                    <video class="custom-video" id="vdd" disablePictureInPicture controls controlslist="nodownload">
                                        <source id="sr" src="<?= $this->Url->webroot('img/uploads/video/' . $firstVideo); ?>" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>

                                </div>

                                <iframe src="" frameborder="0" id="iframe" class="custom-quiz-iframe"></iframe>

                                <div class="card-footer">

                                </div>
                            </div>
                        </div>



                    </div>

                </div>


                <div class="content-backdrop fade"></div>
            </div>
        </div>
        <!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>


<?php echo $this->element('watch-video-style'); ?>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#section-1').show();
        $('#section-2').hide();
        $('#pause-icon').hide();


        $('.menu-link').first().css('background-color', '#E3E9F3');
        $('.menu-link').on('click', function(e) {
            e.preventDefault();
            $('.menu-link').removeClass('active');
            $(this).addClass('active');
        });
        $('.menu-link.chapter-element').click(function(event) {
            event.preventDefault();
            var title = $(this).data('title');
            $('.card-title').text(title);
        });



        const video = document.getElementById('vdd');
        const progress = document.getElementById('progress');

        video.addEventListener('timeupdate', updateProgress);

        function updateProgress() {
            const progressPercent = (video.currentTime / video.duration) * 100;
            progress.style.width = progressPercent + '%';
        }


        function setContent(video, quizz, title) {
            $('.card-title').text(title);
            if (video) {
                var videoSrc = "<?= $this->Url->webroot('img/uploads/video/') ?>" + video;
                $('#sr').attr('src', videoSrc);
                $('#iframe').hide();
                $('#vdd').show().get(0).load();
                var videoElement = document.getElementById('vdd');
                videoElement.addEventListener('loadedmetadata', function() {
                    var durationInSeconds = videoElement.duration;
                    var minutes = Math.floor(durationInSeconds / 60);
                    var seconds = Math.floor(durationInSeconds - minutes * 60);
                    var formattedSeconds = seconds < 10 ? '0' + seconds : seconds;
                    $('.card-subtitle').text('Video lesson(' + minutes + ':' + formattedSeconds +
                        ' minutes)');
                    $('.card-subtitle-2').text(minutes + ':' + formattedSeconds +
                        ' minutes)');
                });


            } else if (quizz) {
                $('.card-subtitle').text('');
                var quizSrc = "<?php echo $this->Url->build('/quizs/view/'); ?>" + quizz;
                console.log("Quiz source: " + quizSrc); // Debugging
                $('.learning-content').css('height', '100vh');
                $('#iframe').attr('src', quizSrc);
                $('#iframe').show().css('height', '460px');
                $('#vdd').hide();
                $('.contentControle').hide();
            }
        }
        $(document).on('click', '.chapter-element', function(e) {
            e.preventDefault();
            $('#section-1').hide();
            $('#section-2').show();

            var video = $(this).data('video');
            var quizz = $(this).data('quizze');
            var title = $(this).data('title');
            $('#vdd').get(0).pause();

            setContent(video, quizz, title);
        });

        var items = $('.chap');
        var currentIndex = 0;
        $('[class^=chap]').on('click', function() {
            var id = $(this).attr('id');
            currentIndex = items.index(this);
            var video = $(this).attr('data-video');
            var quizz = $().attr('data-quizze');
            var title = $(this).data('title');
            setContent(video, quizz, title);
        });

        $('.sub-menu-link').click(function() {
            console.log(1)
            $('#quiz-icon-stat').val('');
        });


        $('.chap').click(function() {
            var id = $(this).attr('id');
            currentIndex = items.index(this);

            var video = $('#' + id).attr('data-video');
            var quizz = $('#' + id).attr('data-quizze');
            var title = $('#' + id).attr('data-title');

            setContent(video, quizz, title);
        });

        $('#next , #skip').click(function() {
            if (currentIndex < items.length - 1) {
                currentIndex++;
                var video = $(items[currentIndex]).attr('data-video');
                var quizz = $(items[currentIndex]).attr('data-quizze');
                var title = $(items[currentIndex]).attr('data-title');
                var count = $(items[currentIndex]).attr('data-count');
                $('.menu-link').removeClass('active');
                $('#' + count).addClass('active');
                setContent(video, quizz, title);
            }
        });

        $('#prev').click(function() {
            if (currentIndex > 0) {
                currentIndex--;
                var video = $(items[currentIndex]).attr('data-video');
                var quizz = $(items[currentIndex]).attr('data-quizze');
                var title = $(items[currentIndex]).attr('data-title');
                var count = $(items[currentIndex]).attr('data-count');
                $('.menu-link').removeClass('active');
                $('#' + count).addClass('active');
                setContent(video, quizz, title);
            }
        });
    });
</script>


<style>
    .navbar-title {
        color: black;
    }

    .custom-navbar-style {
        border-radius: 31px !important;
    }

    .video-container {
        display: flex;
        justify-content: center;
    }

    .custom-video {
        width: 90%;
        height: auto;
        border-radius: 31px;
    }

    .custom-btn {
        background-color: #F6F8FB;
        border-color: #F6F8FB;
        box-shadow: none;
        color: #5C17E5;
        border-radius: 18px !important;
    }

    .content-container {
        width: 100%;
        margin: 0%;
    }

    .sub-content-container {
        border-radius: 31px !important;
    }

    .center-element {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 592px;
        width: 100%;
    }

    .border-radius-31 {
        border-radius: 31px !important;
    }

    .next-title {
        margin-right: 6px;
        font-size: 17px;
        font-weight: 500;
    }

    .prev-title {
        margin-left: 6px;
        font-size: 17px;
        font-weight: 500;
    }

    .custom-header {
        height: 48px;
        border-radius: 16px !important;
    }

    .navbar-title {
        color: black;
        font-size: 22px;
        text-align: center;
    }

    .container-p-y:not([class^=pt-]):not([class*=" pt-"]) {
        padding-top: 1.225rem !important;
    }

    .border-radius-16 {
        border-radius: 16px !important;
    }

    .custom-aside-width {
        border-radius: 19px;
        width: 320px;
    }

    .lesson-element-style {
        border-radius: 16px !important;
        background-color: #F7F8FB !important;
    }

    .parent-lesson-element {
        margin-bottom: 4%;
        border-radius: 16px;
    }

    .course-title-style {
        margin-left: 5%;
        font-size: 14px;
        font-weight: 600;
    }
</style>