<section class="section-profile-style">
    <div class="container container-style">
        <div class="row">
            <div class="col col-sm-style">
                <div class="header-icon">
                    <?= $this->Html->image('book.png', ['alt' => 'textalternatif']);?>
                </div>
                <div class="col-body">
                    <span class="col-number">
                        <?php if ($currentSessionUser['course_id'] != null) {
                       ?>
                        1
                        <?php }else{
                       ?>
                        0
                        <?php }
                       ?>
                    </span>
                    <h3 class="col-text text-center">الدروس</h3>
                </div>
            </div>
            <div class="col col-sm-style">
                <div class="header-icon">
                    <?= $this->Html->image('temps.png', ['alt' => 'textalternatif']);?>
                </div>
                <div class="col-body">
                    <span class="col-number">
                        0
                    </span>
                    <h3 class="col-text text-center">ساعات</h3>
                </div>
            </div>
            <div class="col col-sm-style-profile">
                <div class="header-icon">


                    <?php
                    if($currentSessionUser['profile_picture'] != ''){
                    echo $this->Html->image($currentSessionUser['profile_picture'], [
        'class' => 'profil-picture profile-img',
        'id' => 'profile-picture',
        'alt' => $currentSessionUser['first_name']
    ]); } else{
        echo $this->Html->image('profile.png', [
            'class' => 'profil-picture profile-img',
            'id' => 'profile-picture'
        ]);

    }?>
                </div>

                <h3 style="color: white !important;" class="profile-name text-center">
                    <?= $currentSessionUser['first_name'] ?> <br>
                    <?= $currentSessionUser['last_name'] ?>
                </h3>
                <button data-popup="edit-profile-pop-up" class="edit-btn show-popup-white">تعديل</button>

            </div>
            <div class="col col-sm-style">
                <div class="header-icon">
                    <?= $this->Html->image('messages.png', ['alt' => 'textalternatif']);?>
                </div>
                <div class="col-body">
                    <span class="col-number">
                        0
                    </span>
                    <h3 class="col-text text-center">المنشورات</h3>
                </div>
            </div>
            <div class="col col-sm-style">
                <div class="header-icon">
                    <?= $this->Html->image('tro.png', ['alt' => 'textalternatif']);?>
                </div>
                <div class="col-body">
                    <span class="col-number">
                    <?= number_format($totalPoints) ?>
                    </span>
                    <h3 class="col-text text-center">الإنجازات</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="user-courses">
    <div class="home-sections home-sections-swiper container">
        <div class="d-flex justify-content-between ">
            <div class="px-20 px-md-0" style="margin-left:28% !important" >
                <h2 class="section-title text-center" >الدروس التي تم الاشتراك فيها</h2>
            </div>

        </div>

        <div class="mt-10 position-relative">
            <div
                class="swiper-container latest-webinars-swiper px-12 swiper-container-initialized swiper-container-horizontal">
                <div class="swiper-wrapper py-20 card-style">
                    <?php foreach ($courses as $c) {
                        if ($c['id'] ==  $currentSessionUser['course_id'] ) {


          ?>

                    <div class="swiper-slide" style="width: 291.333px; margin-right: 16px;">
                        <div class="webinar-card">
                            <figure>
                                <div class="image-box">

                                    <?= $this->Html->link(
                                $this->Html->image('uploads/picture/'. $c['picture'] , ['class' => 'img-cover']),
                                ['plugin'=> 'Lms','controller' => 'Courses', 'action' => 'watch',$c->id],
                                ['escape' => false]
                                ) ?>
                                </div>

                                <div class="webinar-card-body">


                                    <a>
                                        <h3
                                            class="d-flex justify-content-center mt-15 webinar-title font-weight-bold font-16 text-dark-blue">
                                            <?= $c['title']?></h3>
                                    </a>




                                    <div class="d-flex justify-content-center webinar-price-box mt-25">
                                        <?= $this->Html->link( __('ابدأ التعلم'),['plugin'=> 'Lms','controller' => 'Courses', 'action' => 'watch',$c->id],['class' => 'btn  mr-15 view-cours-btn']) ?>
                                    </div>
                                </div>
                            </figure>
                        </div>
                    </div>
                    <?php
                 }}?>

                </div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>


        </div>
    </div>
</section>


<script>

</script>
<style>
.view-cours-btn {
    height: 56px;
    border-color: #003F91;
    border-radius: 0px;
    margin-left: 4%;
    background-color: #003F91;
    color: #FFFFFF;
    font-size: 22px;
}

.view-cours-btn:hover {
    border: 2px solid #003F91;
    background-color: #FFFFFF;
    color: #003F91;
    font-size: 22px;
}


.user-courses {
    height: 600px;
}

.profile-name {
    color: white;
    margin-top: 26px;
    font-size: 16px;
}

.edit-btn {
    color: white;
    width: 101px;
    height: 40px;
    margin-top: 17%;
    border: 2px solid #DB5461;
    background-color: #DB5461;
}

.edit-btn:hover {
    color: #DB5461;
    background-color: white;
}

.profil-picture {
    margin-left: 0px;
    width: 101px;
    border: 2px solid white;
    border-radius: 50%;
}
.col-sm-style-profile,
.col-sm-style {
    margin: 6%;
    margin-top: 10%;
}

.container-style {}

.header-icon {}

.col-body {
    margin-top: 26px;
}

.col-number {
    color: white;
    margin: 18px;
    margin-top: 47px;
    font-size: 17px;
}

.col-text {
    color: white !important;
    margin-top: 20px;
    font-size: 16px;
}

.section-profile-style {
    height: 438px;
    background-color: #003F91 !important;
}


.section-title{
font-size: 52px !important;
}

@media (max-width: 450px) {
.col-sm-style {
    display: none;
}
.profil-picture {
    margin-left: 35%;
    margin-top: 27%;
}
.edit-btn {
    margin-top: 17%;
    margin-left: 34%;
}
.sub-title-sec-1{
    font-size: 29px;
}

.section-title{
    font-size: 23px !important;
}


}

</style>
