<div class="layout-wrapper layout-content-navbar">
    <d class="layout-container">

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme custom-aside-width">


            <div class="app-brand demo">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row" style="margin-left: -8%;">
                            <div class="col-sm-12">
                                <h6 class="cours-title-aside"> <a
                                        href="http://localhost/edugato/profile"><?php echo $this->element('icons/return'); ?></a><span>&nbsp;&nbsp;&nbsp;&nbsp;<?= $course->title ?></span>
                                </h6>
                            </div>

                        </div>
                        <div class="row" style="margin-bottom: -13px;">
                            <div class="col-sm-12">
                                <h6 class="cours-completed-aside">75 % Completed</h6>
                            </div>
                        </div>
                        <div class="row" style="width: 132%;margin-bottom: -8px;">
                            <div class="col-sm-12">
                                <div class="progress" style="height: 5px;margin-top: 4% !important;">
                                    <div class="progress-bar w-75" role="progressbar" aria-valuenow="75"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


            </div>

            <div class="menu-inner-shadow"></div>

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
                        <?php echo $this->element('icons/not-watched-state'); ?>
                        <div data-i18n="Layouts" style="margin-left: 4%;"><?= $l->lesson ?><br>
                            <span class="activities-count"><?= $countC ?> Activities</span>
                        </div>

                    </a>

                    <ul class="menu-sub">
                        <?php foreach ($l->chapters as $chap) {
                                $countC++; ?>
                        <li class="menu-item  ">
                            <a style="height: 48px !important;" href="#" id="<?= $countC ?>"
                                class="menu-link sub-menu-link chapter-element chap" data-count="<?= $countC ?>"
                                <?php if ($chap->vedio) { ?> data-video="<?= $chap->vedio ?>" <?php } else { ?>
                                data-quizze="<?= $chap->quizz ?>" <?php } ?> data-title="<?= $chap->chapter ?>">

                                <?php if ($chap->vedio) { ?>
                                <span class="icon-video" style="margin-left: -13%;">
                                    <?php echo $this->element('icons/video'); ?></span>
                                <?php } else { ?>
                                <span class="icon-quiz" style="margin-left: -13%;">
                                    <?php echo $this->element('icons/quiz'); ?></span>
                                <?php } ?>
                                <span class="course-title-style"><?= $chap->chapter ?></span>
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



            <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme custom-navbar-style custom-header"
                id="layout-navbar">
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
                            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                data-bs-toggle="dropdown">
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
                                    <div class="text-center" style="margin-left: -2%;">
                                        <h5 class="card-title"><?= $firstTitle ?></h5>
                                        <h6 class="card-subtitle text-muted subtitle"></h6>
                                    </div>
                                    <div class="d-flex flex-column align-items-end " style="margin-right: 16.5%;">
                                        <button id="next" type="button" class="btn custom-btn"><span
                                                class="custom-display next-title">Next</span>

                                            <?php echo $this->element('icons/next'); ?>
                                        </button>
                                    </div>
                                </div>

                                <div class="video-container">
                                    <video class="custom-video" id="vdd" disablePictureInPicture controls
                                        controlslist="nodownload">
                                        <source id="sr"
                                            src="<?= $this->Url->webroot('img/uploads/video/' . $firstVideo); ?>"
                                            type="video/mp4">
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

    $('.chapter-element').on('click', function(e) {
        e.preventDefault();

        var $this = $(this);
        $('.chapter-element').each(function() {
            if ($(this).data('quizze')) {
                $(this).find('.icon-quiz').html(`<svg style=" margin-left: -25%;" width="25" height="24" viewBox="0 0 25 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M7.53906 15.412C7.53906 15.0297 7.84902 14.7197 8.23137 14.7197H14.896C15.2783 14.7197 15.5883 15.0297 15.5883 15.412C15.5883 15.7944 15.2783 16.1043 14.896 16.1043H8.23137C7.84902 16.1043 7.53906 15.7944 7.53906 15.412Z"
                                                    fill="#27313F" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M7.53906 11.9413C7.53906 11.559 7.84902 11.249 8.23137 11.249H14.896C15.2783 11.249 15.5883 11.559 15.5883 11.9413C15.5883 12.3237 15.2783 12.6336 14.896 12.6336H8.23137C7.84902 12.6336 7.53906 12.3237 7.53906 11.9413Z"
                                                    fill="#27313F" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M7.53931 8.4716C7.53931 8.08925 7.84926 7.7793 8.23161 7.7793H10.7747C11.157 7.7793 11.467 8.08925 11.467 8.4716C11.467 8.85395 11.157 9.16391 10.7747 9.16391H8.23161C7.84926 9.16391 7.53931 8.85395 7.53931 8.4716Z"
                                                    fill="#27313F" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5.01385 4.86466C6.42794 3.30577 8.62154 2.76953 11.5777 2.76953C14.5344 2.76953 16.728 3.30576 18.142 4.86469C19.5374 6.40321 20.0156 8.77113 20.0156 12.0003C20.0156 15.2295 19.5374 17.5974 18.142 19.1359C16.728 20.6949 14.5344 21.2311 11.5777 21.2311C8.62154 21.2311 6.42794 20.6949 5.01385 19.136C3.61823 17.5974 3.13989 15.2295 3.13989 12.0003C3.13989 8.77107 3.61823 6.40318 5.01385 4.86466ZM6.03939 5.79494C5.01447 6.92482 4.52451 8.82615 4.52451 12.0003C4.52451 15.1745 5.01447 17.0758 6.03939 18.2057C7.04584 19.3151 8.72501 19.8465 11.5777 19.8465C14.431 19.8465 16.1101 19.3151 17.1164 18.2057C18.1412 17.0758 18.631 15.1745 18.631 12.0003C18.631 8.82609 18.1412 6.92477 17.1164 5.79492C16.1101 4.68546 14.431 4.15415 11.5777 4.15415C8.72501 4.15415 7.04584 4.68544 6.03939 5.79494Z"
                                                    fill="#27313F" />
                                                </svg>`);
            }
            if ($(this).data('video')) {
                $(this).find('.icon-video').html(`<svg style="margin-left: -25%;" width="25" height="24" viewBox="0 0 25 24" fill="none"
        xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd"
        d="M12.0228 15.2058C11.7348 15.3249 11.4055 15.4372 11.0983 15.4372C10.8602 15.4372 10.6365 15.37 10.4541 15.1876C10.3207 15.0542 9.91078 14.6452 9.9223 11.9438C9.93286 9.25671 10.3255 8.86503 10.4541 8.73543C10.9073 8.28327 11.657 8.59143 11.9777 8.72487C12.7687 9.05223 15.8657 10.7582 15.8657 11.962C15.8657 13.185 12.7015 14.9246 12.0228 15.2058ZM12.2599 2.74023C5.34982 2.74023 2.8999 5.19015 2.8999 12.1002C2.8999 19.0103 5.34982 21.4602 12.2599 21.4602C19.1709 21.4602 21.6199 19.0103 21.6199 12.1002C21.6199 5.19015 19.1709 2.74023 12.2599 2.74023Z"
        fill="#27313F" />
        </svg>`);
            }
        });
        if ($this.data('quizze')) {

            $this.find('.icon-quiz').html(`
                <svg style=" margin-left: -25%;" width="25" height="24" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.86572 12.8834C5.86572 12.5648 6.12402 12.3065 6.44265 12.3065H11.9965C12.3151 12.3065 12.5734 12.5648 12.5734 12.8834C12.5734 13.2021 12.3151 13.4604 11.9965 13.4604H6.44265C6.12402 13.4604 5.86572 13.2021 5.86572 12.8834Z" fill="#5C17E5"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.86572 9.99123C5.86572 9.67261 6.12402 9.41431 6.44265 9.41431H11.9965C12.3151 9.41431 12.5734 9.67261 12.5734 9.99123C12.5734 10.3098 12.3151 10.5682 11.9965 10.5682H6.44265C6.12402 10.5682 5.86572 10.3098 5.86572 9.99123Z" fill="#5C17E5"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.86621 7.09951C5.86621 6.78088 6.1245 6.52258 6.44313 6.52258H8.56238C8.881 6.52258 9.1393 6.78088 9.1393 7.09951C9.1393 7.41813 8.881 7.67643 8.56238 7.67643H6.44313C6.1245 7.67643 5.86621 7.41813 5.86621 7.09951Z" fill="#5C17E5"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3.76183 4.09372C4.94023 2.79465 6.76823 2.34778 9.23174 2.34778C11.6956 2.34778 13.5236 2.79463 14.702 4.09374C15.8648 5.37585 16.2633 7.34911 16.2633 10.0401C16.2633 12.7311 15.8648 14.7043 14.702 15.9864C13.5236 17.2856 11.6956 17.7324 9.23174 17.7324C6.76823 17.7324 4.94023 17.2856 3.76183 15.9865C2.59881 14.7043 2.2002 12.7311 2.2002 10.0401C2.2002 7.34906 2.59881 5.37582 3.76183 4.09372ZM4.61644 4.86896C3.76234 5.81052 3.35404 7.39496 3.35404 10.0401C3.35404 12.6852 3.76234 14.2696 4.61644 15.2112C5.45515 16.1358 6.85446 16.5786 9.23174 16.5786C11.6094 16.5786 13.0087 16.1358 13.8473 15.2112C14.7013 14.2697 15.1094 12.6852 15.1094 10.0401C15.1094 7.39491 14.7013 5.81048 13.8473 4.86893C13.0087 3.94439 11.6094 3.50162 9.23174 3.50162C6.85446 3.50162 5.45515 3.94437 4.61644 4.86896Z" fill="#5C17E5"/>
                </svg>
            `);
        }
        if ($this.data('video')) {
            $this.find('.icon-video').html(`
            <svg style="margin-left: -25%;" width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
            d="M12.0228 15.2058C11.7348 15.3249 11.4055 15.4372 11.0983 15.4372C10.8602 15.4372 10.6365 15.37 10.4541 15.1876C10.3207 15.0542 9.91078 14.6452 9.9223 11.9438C9.93286 9.25671 10.3255 8.86503 10.4541 8.73543C10.9073 8.28327 11.657 8.59143 11.9777 8.72487C12.7687 9.05223 15.8657 10.7582 15.8657 11.962C15.8657 13.185 12.7015 14.9246 12.0228 15.2058ZM12.2599 2.74023C5.34982 2.74023 2.8999 5.19015 2.8999 12.1002C2.8999 19.0103 5.34982 21.4602 12.2599 21.4602C19.1709 21.4602 21.6199 19.0103 21.6199 12.1002C21.6199 5.19015 19.1709 2.74023 12.2599 2.74023Z"
            fill="#5C17E5" />
            </svg>

            `);
        }
    });


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
.cours-completed-aside {
    font-weight: 500;
    color: black;
    font-size: 14px;
}

.cours-title-aside {
    font-weight: 600;
    color: black;
    font-size: 17px;
    margin-bottom: 12px;
}

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
    border-radius: 16px;
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