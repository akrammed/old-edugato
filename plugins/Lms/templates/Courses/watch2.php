<style>
    .vd {
        width: 100%;
        height: 100%;
    }

    .learning-page-content {
        padding: 0;
    }

    .learning-page-tabs {
        background-color: #333a46;
        color: white !important;
        padding: 0;
        overflow-y: auto;
        overflow-x: hidden;
    }

    .rounded-sm {
        border-radius: 0rem !important;
    }

    .font-weight-bold {
        font-weight: 500 !important;
    }

    .costum-btn {
        transition: transform 0.3s ease;
    }



    .costum-btn:active {
        background-color: #DB5461 !important;
    }

    .custum-hover-gray {
        transition: transform 0.3s ease;
    }



    a.active {
        transition: transform 0.3s ease;
    }

    .custom-video {
        height: 100%;
        width: 100%;
    }

    .highlighted {
        background-color: #2B313B !important;
        transform: scale(1);
    }

    .contentControle {
        margin-top: 0;
        background-color: white;
        /* Semi-transparent black background */
        color: #f1f1f1;
        /* Text color */
        width: 100%;
        padding: 20px;
        z-index: 9999999999999;
    }





    /* Style the button used to pause/play the video */
    .plyBtn {
        font-size: 36px;
        border: none;
        cursor: pointer;
        background-color: white;
    }

    .plyBtn:hover {
        /* Dark gray background on hover */
        color: black;
        /* Black text color on hover */
    }

    #volumeSlider {
        width: 50%;
        /* Initial width (adjust as needed) */
        height: 5px;
        background-color: #DB5461;
        /* Choose your desired slider color */
        /* Add any other styling properties for the slider */
    }

    .progressBar {
        margin-bottom: 10px;
        border-radius: 5px;
        height: 5px;
        /* Set the height of the progress bar */
        background-color: #DB5461;
        /* Choose your desired color */
        width: 0;
        /* Initially, the progress is 0% */
        transition: width 0.2s ease;
        /* Add a smooth transition effect */
    }

    .cntrlBtn {
        background: none;
        font-size: 25px;
        border: none;
    }

    .couseProgresse {
        background-color: #DB5461;
        width: 70%;
        height: 3px;
    }

    .speedValues {
        cursor: pointer;
    }

    .prev {
        margin-left: 150px;
    }

    @media (max-width: 767px) {

        #toggelBtn {
            display: block !important;
        }

        .prev {
            margin-left: 90px;
            margin-top: -24px;
        }


    }
</style>

<script>
    var isOpen = false;
    function changeBackgroundColorLesson(element) {
        // Remove 'highlighted' class from all elements with class 'chap'
        $('.chap').removeClass('highlighted');

        // Toggle 'highlighted' class for the clicked element
        $(element).toggleClass('highlighted');

        // Get the value of 'data-red' attribute
        var redId = $(element).data('red');

        // Find the element with ID 'chapter{redId}' and change its background color
        $('#chapter' + redId).css('background-color', '#DB5461');
    }



</script>
<!--<link rel="stylesheet" href="httpss://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">-->
<div class="learning-page">
    <div class="row">
        <div id="side-bar" class="learning-page-tabs col-md-3  d-md-block show"
            style="z-index:1;background-color: #333a46 !important;">
            <div class="row p-3 d-flex justify-content-between align-items-center">
                <div>
                    <h4>
                        <?= $this->Html->link(__('<< Go to previous page'), ['plugin' => 'Lms', 'controller' => 'Courses', 'action' => 'view', $course->id], ['class' => 'text-white']) ?>

                    </h4>
                </div>
                <div>
                    <button class="toggelBtn" type="button" style="background:none;border:none;"><i
                            class="bi bi-caret-left-fill" style="color:white;font-size:30px;"></i></button>
                </div>



            </div>

            <div class="row p-3 d-flex justify-content-center">
                <p style="color:white !important; font-size:30px !important; ">
                    <?= $course->title ?>
                </p>
            </div>
            <div class="row mb-3 d-flex justify-content-center align-items-center">
                <div class="couseProgresse"></div><span class="text-white" style="margin-left:5px;">100%</span>
            </div>

            <ul class="nav nav-tabs d-flex align-items-center justify-content-around" id="tabs-tab" role="tablist">
                <li class="nav-item">
                    <a class="position-relative font-14 d-flex align-items-center active" id="content-tab"
                        data-toggle="tab" href="#content" role="tab" aria-controls="content" aria-selected="true">

                        <span class="learning-page-tabs-link-text" style="color:white;font-weight: 700;">Content</span>
                    </a>
                </li>

            </ul>

            <div class="tab-content " id="nav-tabContent"
                style="background-color: #F7F0F5 !important; height:67vh; overflow-y:auto; margin-top:20px; color:black !important;">
                <div class="pb-20 tab-pane fade show active h-100" id="content" role="tabpanel"
                    aria-labelledby="content-tab">
                    <div class="content-tab  ">
                        <div class="accordion-content-wrapper " id="chapterAccordion" role="tablist"
                            aria-multiselectable="true">
                            <?php
                            $idForRedColor = 1;
                            $num = 1;
                            $firstVideo = null;
                            foreach ($lessons as $lesson) {
                                if (!$firstVideo) {
                                    $firstVideo = $lesson->chapters[0]->vedio;
                                }
                                ?>
                                <div <?php if($lesson->is_paid == 1 && $course->id != $currentSessionUser['course_id']){?> style=" pointer-events: none;"<?php } ?> class="accordion-row  rounded-sm" style="background-color:rgb(253,253,253);">
                                    <div class="d-flex align-items-center justify-content-between p-10 costum-btn"
                                        role="tab" style="cursor:pointer;border-bottom: 1px solid;" id="x<?= $lesson->id ?>"
                                        href="#collapse<?= $lesson->id ?>" aria-controls="collapse<?= $lesson->id ?>"
                                        data-parent="#chapterAccordion" role="button" data-toggle="collapse"
                                        aria-expanded="true">
                                        <div class="d-flex align-items-center costum-btn">
                                            <span class="mr-10 costum-btn">
                                                <?= $num ?>
                                            </span>
                                            <div>
                                                <span class="chtcolor<?= $lesson->id ?> "
                                                    style="color:black;font-weight: 400 !important; font-size:20px; ">
                                                    <?= $lesson->lesson ?>
                                                </span>
                                                <span class="chtcolor<?= $lesson->id ?> font-12 d-block"
                                                    style="color:black">
                                                    <?= count($lesson->chapters) ?> Topic
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <?php

                                    foreach ($lesson->chapters as $chap) {
                                        ?>

                                        <div id="collapse<?= $lesson->id ?>" aria-labelledby="<?php $lesson->id ?>"
                                            role="button" data-video="" class="collapse" role="tabpanel">
                                            <div id="chapter<?php $idForRedColor ?>"
                                                style="background-color:#1C2026 !important; color:black !important;">
                                                <div class="chap p-2  d-flex align-items-center justify-content-between p-10 custum-hover-gray"
                                                    role="tab" id="video<?= $chap->id ?>" <?php if ($chap->quizz_title) {
                                                          ?>
                                                        data-quizze="<?= $chap->quizz ?>" <?php
                                                      } else {
                                                          ?>
                                                        data-video="<?= $chap->vedio ?>" <?php
                                                      }
                                                      ?>
                                                    onclick="changeBackgroundColorLesson(this)"
                                                    data-red="<?php $idForRedColor ?>" style="margin-left:20px">
                                                    <div class="d-flex align-items-center" aria-controls=""
                                                        aria-expanded="true">
                                                        <span class=" mr-10">
                                                            <?php if ($chap->quizz_title) {
                                                                ?>
                                                                <i class="bi bi-question-circle"
                                                                    style="color:white;font-size:30px;"></i>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <i class="bi bi-play-circle"
                                                                    style="color:white;font-size:30px;"></i>
                                                                <?php
                                                            }
                                                            ?>


                                                        </span>

                                                        <div class="">

                                                            <span class=" font-20  d-block" style="color:white;">
                                                                <?= $chap->chapter ?>
                                                            </span>
                                                            <?php if ($chap->quizz_title) {
                                                                ?>
                                                       <small>Quizz</small>
                                                                <?php
                                                            } else {
                                                                ?>
                                                             <small>Video</small>
                                                                <?php
                                                            }
                                                            ?>



                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>


                                        <?php
                                        $idForRedColor++;
                                    }

                                    ?>
                                </div>
                                <?php
                                $num++;
                            }
                            ?>


                        </div>
                    </div>
                </div>


                <div class="pb-20 tab-pane fade h-100" id="certificates" role="tabpanel"
                    aria-labelledby="certificates-tab">
                    <div class="content-tab  ">
                        <div class="course-certificate-item cursor-pointer p-10 border border-gray200 rounded-sm mb-15"
                            data-course-certificate="">
                            <div class="d-flex align-items-center">
                                <span class=" bg-gray300 mr-10">
                                    <i data-feather="award" class="text-gray" width="16" height="16"></i>
                                </span>

                                <div class="flex-grow-1">
                                    <span class="font-weight-500 font-14 text-dark-blue d-block">Course
                                        certificate</span>

                                    <div class="d-flex align-items-center">
                                        <span class="font-12 text-gray">Not Achieved!</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="learning-page-content bg-dark col-md-9 bg-info-light" id="vid">
            <div class=" row header bg-dark">
                <div class="col-6 d-flex   align-items-center p-3 text-white text-center" id="prev"
                    style="cursor:pointer;font-weight: 700; background-color: #1C2026;">

                    <button class="toggelBtn" id="toggelBtn" type="button"
                        style="background:none;border:none;display:none;"><i class="bi bi-caret-right-fill"
                            style="color:white;font-size:30px;"></i></button>

                    <div class="prev">
                        <strong>

                            << </strong> previous

                    </div>


                </div>
                <div class="col-6 p-3 text-white text-center" id="next"
                    style="cursor:pointer;font-weight: 700; background-color: #1C2026;">
                    next <strong>>></strong>

                </div>
            </div>
            <div class="learning-content" style="height: 76vh; width:100%; display: flex; flex-direction: column;"
                id="learningPageContent">

                <video class="custom-video" style="flex-grow: 1;  " width="" id="vdd" height="" disablePictureInPicture
                    controlslist="nodownload noplaybackrate">
                    <source id="sr" src=<?php echo $this->Url->webroot('img/uploads/video/' . $firstVideo); ?>
                        type="video/mp4">
                </video>

                <div class="contentControle" style="flex-shrink: 0;">
                    <div class="progressBar"></div>
                    <div class="cntrlContent d-flex justify-content-between">
                        <div class="timeVideo">
                            <span id="currentTime" style="color:black;"><strong>0:00</strong></span> / <span
                                id="totalDuration" style="color:black;"><strong>0:00</strong></span>
                        </div>
                        <div class="plypauseBtn d-flex" style="background-color:none;">
                            <button class="plyBtn"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#DB5461" class="bi bi-skip-backward-fill" viewBox="0 0 16 16">
  <path d="M.5 3.5A.5.5 0 0 0 0 4v8a.5.5 0 0 0 1 0V8.753l6.267 3.636c.54.313 1.233-.066 1.233-.697v-2.94l6.267 3.636c.54.314 1.233-.065 1.233-.696V4.308c0-.63-.693-1.01-1.233-.696L8.5 7.248v-2.94c0-.63-.692-1.01-1.233-.696L1 7.248V4a.5.5 0 0 0-.5-.5"/>
</svg></button>
                            <button class="plyBtn" id="myBtn" style="font-size:48px;"><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#DB5461" class="bi bi-play-circle-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814z"/>
</svg></button>
                            <button class="plyBtn"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#DB5461" class="bi bi-fast-forward-fill" viewBox="0 0 16 16">
  <path d="M7.596 7.304a.802.802 0 0 1 0 1.392l-6.363 3.692C.713 12.69 0 12.345 0 11.692V4.308c0-.653.713-.998 1.233-.696z"/>
  <path d="M15.596 7.304a.802.802 0 0 1 0 1.392l-6.363 3.692C8.713 12.69 8 12.345 8 11.692V4.308c0-.653.713-.998 1.233-.696z"/>
</svg></button>
                        </div>
                        <div class="cntrl">
                            <div class="speedValue p-2 d-none position-absolute"
                                style="background-color:white;height:fit-content; color:black !important; z-index:999999999999 !important; margin-top:-100px; border-radius:25px">

                                <p class="speedValues" data-speed="2"><strong>2</strong></p>
                                <p class="speedValues" data-speed="1.5"><strong>1.5</strong></p>
                                <p class="speedValues" data-speed="1.25"><strong>1.25</strong></p>
                                <p class="speedValues" data-speed="1"><strong>1</strong></p>
                                <p class="speedValues" data-speed="0.75"><strong>0.75</strong></p>

                            </div>
                            <div class="cntrlBtns d-flex justify-content-between">
                                <button type="button" class="cntrlBtn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
  <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
</svg></button>
                                <button type="button" id="speedBtn" class="cntrlBtn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-speedometer" viewBox="0 0 16 16">
  <path d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2M3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707M2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8m9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5m.754-4.246a.39.39 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.39.39 0 0 0-.029-.518z"/>
  <path fill-rule="evenodd" d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.95 11.95 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0"/>
</svg></button>
                                <button type="button" id="fullScreen" class="cntrlBtn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-fullscreen" viewBox="0 0 16 16">
  <path d="M1.5 1a.5.5 0 0 0-.5.5v4a.5.5 0 0 1-1 0v-4A1.5 1.5 0 0 1 1.5 0h4a.5.5 0 0 1 0 1zM10 .5a.5.5 0 0 1 .5-.5h4A1.5 1.5 0 0 1 16 1.5v4a.5.5 0 0 1-1 0v-4a.5.5 0 0 0-.5-.5h-4a.5.5 0 0 1-.5-.5M.5 10a.5.5 0 0 1 .5.5v4a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 0 14.5v-4a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v4a1.5 1.5 0 0 1-1.5 1.5h-4a.5.5 0 0 1 0-1h4a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 1 .5-.5"/>
</svg></button>
                            </div>
                            <div class="voice d-flex align-items-center">
                                <span class="cntrlBtn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-volume-up-fill" viewBox="0 0 16 16">
  <path d="M11.536 14.01A8.47 8.47 0 0 0 14.026 8a8.47 8.47 0 0 0-2.49-6.01l-.708.707A7.48 7.48 0 0 1 13.025 8c0 2.071-.84 3.946-2.197 5.303z"/>
  <path d="M10.121 12.596A6.48 6.48 0 0 0 12.025 8a6.48 6.48 0 0 0-1.904-4.596l-.707.707A5.48 5.48 0 0 1 11.025 8a5.48 5.48 0 0 1-1.61 3.89z"/>
  <path d="M8.707 11.182A4.5 4.5 0 0 0 10.025 8a4.5 4.5 0 0 0-1.318-3.182L8 5.525A3.5 3.5 0 0 1 9.025 8 3.5 3.5 0 0 1 8 10.475zM6.717 3.55A.5.5 0 0 1 7 4v8a.5.5 0 0 1-.812.39L3.825 10.5H1.5A.5.5 0 0 1 1 10V6a.5.5 0 0 1 .5-.5h2.325l2.363-1.89a.5.5 0 0 1 .529-.06"/>
</svg></span>
                                <div id="volumeSlider"></div>
                            </div>

                        </div>
                    </div>


                </div>

                <iframe class="custom-video" src="" style="width:100%;height:100%;display:none" frameborder="0"
                    id="iframe"></iframe>


            </div>


        </div>


    </div>
</div>
<script>

    $(document).ready(function () {
        $('.toggelBtn').click(function () {
            var sidebar = $('#side-bar');
            var mainContent = $('#vid');

            sidebar.toggleClass('d-md-block d-none');
            $('#toggelBtn').toggle();
            $('.prev').css('margin-top', sidebar.hasClass('d-none') ? '0px' : '-20px');
            $("#learningPageContent").css("height", sidebar.hasClass('d-none') ? "" : "76vh");
            $("#iframe").css("height", "85vh");
            $("#vdd").css("margin-left", sidebar.hasClass('d-none') ? "5%" : "");
            $("#vdd").css("width", sidebar.hasClass('d-none') ? "90%" : "");

            $("#learningPageContent").css("display", sidebar.hasClass('d-none') ? "block" : "flex");

            mainContent.toggleClass('col-md-9 col-md-12');
        });

        // Get the video element
        var video = document.getElementById("vdd"); // Replace with your video ID
        var volumeSlider = $("#volumeSlider");
        var fullscreenButton = $('#fullScreen');
        var speedButton = $("#speedBtn");
        fullscreenButton.click(function () {
            if (video.requestFullscreen) {
                video.requestFullscreen();
            } else if (video.mozRequestFullScreen) { // Firefox
                video.mozRequestFullScreen();
            } else if (video.webkitRequestFullscreen) { // Chrome, Safari and Opera
                video.webkitRequestFullscreen();
            } else if (video.msRequestFullscreen) { // IE/Edge
                video.msRequestFullscreen();
            }
        });

        speedButton.click(function () {
            speedDiv = $('.speedValue');
            if (speedDiv.hasClass('d-none')) {
                speedDiv.removeClass('d-none').addClass('d-block');
            } else {
                speedDiv.removeClass('d-block').addClass('d-none');
            }
        })
        $('[class^=speedValues]').on('click', function () {
            var speed = $(this).attr('data-speed');
            video.playbackRate = speed;
        });

        // Add an event listener to the speed button
        // speedButton.click(function () {
        //     if (video.playbackRate == 1) {
        //         video.playbackRate = 1.5; // Increase speed to 1.5x
        //     } else {
        //         video.playbackRate = 1; // Reset speed to normal
        //     }
        // });

        // Update volume when slider is dragged
        volumeSlider.on("mousedown", function (e) {
            var position = e.pageX - volumeSlider.offset().left;
            var percentage = (position / volumeSlider.width()) * 100;
            $("#volumeSlider").css('width', `${percentage}px`);
            video.volume = percentage / 100;
        });
        // Update the progress bar as the video plays
        video.addEventListener("timeupdate", function () {
            var currentTime = video.currentTime;
            var duration = video.duration;
            var progress = (currentTime / duration) * 100;
            $(".progressBar").css("width", progress + "%");
            var formattedCurrentTime = formatTime(currentTime);
            $("#currentTime").text(formattedCurrentTime);

            var totalDuration = this.duration;
            var formattedTotalDuration = formatTime(totalDuration);
            $("#totalDuration").text(formattedTotalDuration);
        });
        function formatTime(seconds) {
            var minutes = Math.floor(seconds / 60);
            var remainingSeconds = Math.floor(seconds % 60);
            return minutes.toString().padStart(2, "0") + ":" + remainingSeconds.toString().padStart(2, "0");
        }
        var video = $("#vdd")[0]; // Convert to DOM element

        // Get the button element
        var btn = $("#myBtn");

        // Pause and play the video, and change the button text
        btn.click(function () {
            if (video.paused) {
                video.play();
                btn.html(`<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#DB5461" class="bi bi-pause-circle-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M6.25 5C5.56 5 5 5.56 5 6.25v3.5a1.25 1.25 0 1 0 2.5 0v-3.5C7.5 5.56 6.94 5 6.25 5m3.5 0c-.69 0-1.25.56-1.25 1.25v3.5a1.25 1.25 0 1 0 2.5 0v-3.5C11 5.56 10.44 5 9.75 5"/>
</svg>`);
            } else {
                video.pause();
                btn.html(`<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#DB5461" class="bi bi-play-circle-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814z"/>
</svg>`);
            }
        });
        $(".clickable-div").click(function () {
            $(this).css(" transform", "scale(1.2)");
        });

    });



    function isValueInString(str, value) {
        return str.indexOf(value) !== -1;
    }
    function normalizeColor(color) {
        return color.replace(/\s/g, '');
    }
    $(document).ready(function () {
        function changeBackgroundColor(id) {
            element = $('#x' + id);
            elements = $('.chtcolor' + id);
            elementsChapters = $(`#collapse${id} .chap`);
            if (normalizeColor(element.css('background-color')) === "rgb(219,84,97)") {
                element.css('background-color', 'rgb(253,253,253)');
                elements.css('color', 'black');
            } else {
                element.css('background-color', 'rgb(219,84,97)');
                elementsChapters.css('background-color', '#1C2026');
                elementsChapters.css('color', 'white');
                elements.css('color', 'white');
            }
        }

        $('[id^=x]').on('click', function () {
            var id = $(this).attr('id').substring(1);
            changeBackgroundColor(id);
        });
        var items = $('.chap');
        var currentIndex = 0;
        $('[class^=chap]').on('click', function () {
            var id = $(this).attr('id');
            currentIndex = items.index(this);
            // console.log("sd");
            var video = $(this).attr('data-video');
            var quizz = $().attr('data-quizze');
            // console.log("adsjwsd");
            if (video != null) {
                $('.learning-content').css('height', '76vh');
                $('#sr').attr('src', "/img/uploads/video/" + video);
                $('#iframe').css('display', 'none');
                $('#vdd').css('display', 'block');
                $('#vdd').get(0).load();
            } else {
                $('.learning-content').css('height', '100vh');
                $('#iframe').attr('src', `http://localhost/edugato-v-1.4.3/quizs/view/${quizz}`);
                $('#iframe').css('display', 'block');
                $('#vdd').css('display', 'none');
                $('.contentControle').css('display', 'none');
            }







        });



        $('.chap').click(function () {
             var id = $(this).attr('id');
            currentIndex = items.index(this);

            var video = $('#' + id).attr('data-video');
            var quizz = $('#' + id).attr('data-quizze');

            if (video != null) {
                $('#sr').attr('src', "/img/uploads/video/" + video);
                $('#iframe').css('display', 'none');
                $('#vdd').css('display', 'block');
                $('#vdd').get(0).load();
            } else {

                $('#iframe').attr('src', `http://localhost/edugato-v-1.4.3/quizs/view/${quizz}`);
                $('#iframe').css('display', 'block');
                $('#vdd').css('display', 'none');
                $('.contentControle').css('display', 'none');
            }
        });

        $('#next').click(function () {
            if (currentIndex < items.length - 1) {
                currentIndex++;
                var video = $(items[currentIndex]).attr('data-video');
                var quizz = $(items[currentIndex]).attr('data-quizze');
                // console.log(quizz);
                if (video != null) {
                                        $('.contentControle').css('display','block');
                    $('.learning-content').css('height', '76vh');
                    $('#sr').attr('src', "/img/uploads/video/" + video);
                    $('#iframe').css('display', 'none');
                    $('#vdd').css('display', 'block');
                    $('#vdd').get(0).load();
                } else {
                              $('.contentControle').css('display','none');
                    $('.learning-content').css('height', '100vh');
                    $('#iframe').attr('src', `http://localhost/edugato-v-1.4.3/quizs/view/${quizz}`);
                    $('#iframe').css('display', 'block');
                    $('#vdd').css('display', 'none');
                    $('.contentControle').css('display', 'none');
                }
            }
        });

        $('#prev, #skip').click(function () {
            if (currentIndex > 0) {
                currentIndex--;
                var video = $(items[currentIndex]).attr('data-video');
                var quizz = $(items[currentIndex]).attr('data-quizze');
                // console.log(quizz);
                if (video != null) {
                    $('.contentControle').css('display','block');
                    $('.learning-content').css('height', '76vh');
                    $('#sr').attr('src', "/img/uploads/video/" + video);
                    $('#iframe').css('display', 'none');
                    $('#vdd').css('display', 'block');
                    $('#vdd').get(0).load();
                } else {
                       $('.contentControle').css('display','none');
                    $('.learning-content').css('height', '100vh');
                    $('#iframe').attr('src', `http://localhost/edugato-v-1.4.3/quizs/view/${quizz}`);
                    $('#iframe').css('display', 'block');
                    $('#vdd').css('display', 'none');
                    $('.contentControle').css('display', 'none');
                }
            }
        });
    });
</script>
