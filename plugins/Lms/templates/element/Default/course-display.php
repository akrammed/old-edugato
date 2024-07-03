<section class="section-style">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 custom-col">
                <div class="header justify-content-center">
                    <?php  if ($currentSessionUser != null) {
    if (($course['id'] == $currentSessionUser['course_id'])) {
?>
                    <?= $this->Html->link(__('ابدأ التعلم'), ['action' => 'Watch', $course['id']], ['class' => 'edugato-button-normal full-width text-white bg-color mb-1', 'style' => 'display: flex; justify-content: center; align-items: center;']) ?>
                    <?php }
}
if ($currentSessionUser == null || ($course['id'] != $currentSessionUser['course_id'])) {
    $isTrue = false;
    foreach ($course->lessons as $l) {
        if($l->is_paid == 0){
            $isTrue = true;
        }
    }
    if($isTrue){
        ?>
                    <?= $this->Html->link(__(' ابدأ التعلم لديك درس مجاني'), ['action' => 'Watch', $course['id']], ['class' => 'edugato-button-normal full-width text-white bg-color mb-1', 'style' => 'display: flex; justify-content: center; align-items: center;']) ?>
        <?php
    }
    ?>

                    <?= $this->Html->link(__('سجّل الآن
                        3.300 دج'), ['plugin' => 'Lms', 'controller' => 'Homes', 'action' => 'payment', $course->id], ['class' => 'edugato-button-normal full-width text-white bg-color mb-1', 'style' => 'display: flex; justify-content: center; align-items: center;']) ?>

                    <?php } ?>


                    <?=  $this->Html->image('nacer.png', ['class' => 'edugato-framed-image-circle m-2 ']) ?>
                </div>
                <div class="body">
                    <ul class="custom-ul ">
                        <li
                            class="custom-li edugato-main-text-normal d-flex align-items-center justify-content-between">
                            <?= $this->Html->image('teacher.png') ?>
                            <span class="custom-mr">Author</span>
                            <div class="text-right">
                                <p>Nacer Abdeli</p>
                            </div>
                        </li>
                        <li
                            class="custom-li edugato-main-text-normal d-flex align-items-center justify-content-between">
                            <?= $this->Html->image('level.png') ?>
                            <span class="custom-mr-level">Level</span>
                            <div class="text-right">
                                <p><?= $course->level->level ?></p>
                            </div>
                        </li>
                        <li
                            class="custom-li edugato-main-text-normal d-flex align-items-center justify-content-between">
                            <?= $this->Html->image('time.png') ?>
                            <span class="custom-mr-time">Study time</span>
                            <div class="text-right">
                                <p><?= $course->study_time ?> Hours</p>
                            </div>
                        </li>
                        <li
                            class="custom-li edugato-main-text-normal d-flex align-items-center justify-content-between">
                            <?= $this->Html->image('vid.png') ?>
                            <span class="custom-mr-video">Video time</span>
                            <div class="text-right">
                                <p><?= $course->vedio_time ?> Minutes</p>
                            </div>
                        </li>
                        <li
                            class="custom-li edugato-main-text-normal d-flex align-items-center justify-content-between">
                            <?= $this->Html->image('exam.png') ?>
                            <span class="custom-mr-exam">Exam </span>
                            <div class="text-right">
                                <p><?= $course->exams_number ?> </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-8 custom-col-2 ">
                <h1 class="edugato-heading-normal"> <?= $course->title ?></h1>
                <?= $this->Html->image('uploads/picture/' . $course['background_picture'], ['class' => 'course-img']) ?>


            </div>
        </div>
    </div>
</section>
<section class="section-style-2">
    <div class="container">
        <div class="row">
            <div class="col-12 " style="margin-bottom: 46px;">
                <div class="accordion-content-wrapper" id="chaptersAccordion" role="tablist"
                    aria-multiselectable="true">
                    <?php foreach ($course->lessons as $l) {
                                                ?>
                    <div class="accordion-row rounded-sm  mt-20 p-15 ">
                        <h1 class="custom-title" style="margin-bottom: 46px;"><?= $l->lesson ?></h1>

                        <?php foreach ($chapters as $chap) {
                                                            if ($chap->lesson_id == $l->id) {
                                                        ?>
                        <div class="d-flex mt-3 custom-border-bottom" style="margin-left:20px;">
                            <svg style="width: 20px;margin-right:10px;" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 30 30" data-icon="video" class="lw-contents-svg small">
                                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke-width="1.2"
                                        d="M12.5 11.59v6.82a.85.85 0 001.32.71l5.12-3.41a.86.86 0 000-1.42l-5.12-3.41a.85.85 0 00-1.32.71z">
                                    </path>
                                    <circle stroke-width="1.6" cx="15" cy="15" r="11.87"></circle>
                                </g>
                            </svg>
                            <i class="bi bi-play-circle" style="margin-right:10px;"></i>
                            <span><?= $chap->chapter ?></span>
                        </div>
                        <div class="d-flex mt-3 custom-border-bottom" style="margin-left:20px;">
                            <svg style="width: 20px;margin-right:10px;" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 30 30" data-icon="exam" class="lw-contents-svg small">
                                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="15" cy="15" r="11.87" stroke-width="1.6"></circle>
                                    <circle cx="15" cy="21" r="1" stroke-width="1.2"></circle>
                                    <path d="M15 17.42c0-3.75 3.19-3.21 3.19-6.39 0-2.57-5-4.17-6.39 0"
                                        stroke-width="1.6"></path>
                                </g>
                            </svg>
                            <span><?= $chap->quizz_title ?></span>
                        </div>
                        <?php
                                                            }
                                                        }
                                                        ?>

                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-style-3 d-flex">
    <div class="container">
        <div class="head">
            <h1 class="edugato-heading-normal">Votre Formateur</h1>
        </div>
        <div class="row">
            <div class="col-sm-4"><?=  $this->Html->image('nacer.png',['class'=>'custom-im-teacher']) ?></div>
            <div class="col-sm-8">
                <h1 class="edugato-heading3-normal">Nasser Abdelli</h1>
                <br>
                <span class="rol-user">English Teacher</span>
                <br><br>
                <p class="main-text-large">
                    Nasser Abdelli est un enseignant d'anglais exercé avec 15 ans d'expérience . Il a une expertise en
                    enseignement de l'anglais général, de l'anglais des affaires et de l'anglais spécialisé. Avec son
                    expertise et ses compétences, Nasser vous a préparé des leçons captivantes et efficaces qui vous
                    aideront à atteindre vos objectifs de langue.
                </p>

            </div>
        </div>
    </div>

</section>

<script>

</script>
<style>
.lw-brand-text {
    color: #DB5461;
}

.edugato-heading3-normal {
    font-weight: bold;
    font-size: 2.3rem;
    opacity: 1;
    letter-spacing: 0rem;
    line-height: 1.4;
    text-transform: none;
}

.main-text-large {

    font-size: 1.3rem;
    font-weight: normal;
    letter-spacing: 0rem;
    line-height: 1.6;
    text-transform: none;
}

.section-style-3 {
    margin-top: 50px;
}

.custom-im-teacher {
    width: 300px;
    height: 270px;
}

.custom-border-bottom {
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.custom-title {
    font-weight: 900;
    color: white !important;
    font-size: 43px;
}

.section-style-2 {
    background-color: #003F91;
    color: white;
}

.custom-ul {
    margin-top: 35px !important;
}

.custom-mr {
    margin-right: 30%;
}

.edugato-main-text-normal {
    font-weight: normal;
    font-size: 1.3rem;
    letter-spacing: 0rem;
    line-height: 1.65;
    text-transform: none;
}

.course-img {
    object-fit: contain;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 20px;
    height: 48%;


}

.edugato-heading-normal {
    font-weight: bold;
    font-size: 3.8rem;
    opacity: 1;
    letter-spacing: 0rem;
    line-height: 1.25;
    text-transform: none;
    margin-bottom: 2.5rem;
}

.section-style {
    margin-top: 10%;
    height: 600px;
}

.custom-col,
.custom-col-2 {
    padding-left: 25px;
    padding-right: 25px;
}


.edugato-framed-image-circle {
    border-radius: 50%;
    width: 111px;
    height: 111px;
    margin-top: 4% !important;
    margin-left: 32% !important;
}



.edugato-button-normal {
    box-shadow: none;
    font-weight: bold;
    font-size: 1.6rem;
    letter-spacing: 0rem;
    text-transform: none;
    border-radius: 4px;
    border-color: #DB5461;
    padding-top: 15px;
    padding-right: 30px;
    padding-bottom: 15px;
    padding-left: 30px;
}

.edugato-button-normal:hover {
    background-color: #dd757f;
}

.bg-color {
    background-color: #DB5461;
}

.full-width {
    width: 100%;
}



.custom-mr-level {
    margin-right: 62%;
}

.custom-mr-time {
    margin-right: 32%;
}

.custom-mr-video {
    margin-right: 33%;
}

.custom-mr-exam {
    margin-right: 67%;
}


@media (max-width: 450px) {
    .edugato-framed-image-circle {
        border-radius: 50%;
        width: 136px;
        height: 128px;
        margin-top: 4% !important;
        margin-left: 32% !important;
    }

    .section-style {
        height: 325px;
    }

    .custom-title {
        font-size: 19px;
    }

    .custom-im-teacher {
        width: 100%;
    }

    .edugato-heading-normal {
        font-size: 1.8rem;
        text-align: center !important;
    }

    .course-img {
        margin-bottom: 0px;
        width: 100%;
    }

    .rol-user {
        margin-left: 35%;
    }

    .edugato-heading3-normal {
        text-align: center !important;
    }

    .custom-col,
    .custom-col-2 {
        margin-bottom: 10%;
        height: 370px;
        margin-top: 15%;
    }

    .custom-mr {
        margin-right: 41%;
    }

    .custom-mr-level {
        margin-right: 63%;
    }

    .custom-mr-time {
        margin-right: 38%;
    }

    .custom-mr-video {
        margin-right: 40%;
    }

    .custom-mr-exam {
        margin-right: 66%;

    }

    .section-style-2 {
        margin-top: 559px;
    }

    .main-text-large {
        font-size: 1.1rem;
        text-align: center;
        margin-bottom: 11%;
    }

    .edugato-main-text-normal {
        font-size: 1.1rem;
        margin-top: 0%;
    }
}
</style>
