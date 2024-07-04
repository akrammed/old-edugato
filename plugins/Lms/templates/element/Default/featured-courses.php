<section class="section-style">
    <div class="home-sections home-sections-swiper container">
        <div class="d-flex justify-content-between ">
            <div class="px-20 px-md-0" style="margin-left: 80%;">
                <h2 class="section-title text-left" style="font-size: 52px;">الدروس</h2>
                <span class="underline-style-curs">—</span>
            </div>

        </div>

        <div class="mt-10 position-relative">
            <div
                class="swiper-container latest-webinars-swiper px-12 swiper-container-initialized swiper-container-horizontal">
                <div class="swiper-wrapper py-20 card-style">
                    <?php foreach ($courses as $c) {
          ?>

                    <div class="swiper-slide" style="width: 291.333px; margin-right: 16px;">
                        <div class="webinar-card">
                            <figure>
                                <div class="image-box">

                                    <?= $this->Html->link(
                                $this->Html->image('uploads/picture/'. $c['picture'] , ['class' => 'img-cover']),
                                ['plugin'=> 'Lms','controller' => 'Courses', 'action' => 'View',$c->id],
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
                                        <?= $this->Html->link( __('معاينة الدرس'),['plugin'=> 'Lms','controller' => 'Courses', 'action' => 'View',$c->id],['class' => 'btn  mr-15 view-cours-btn']) ?>
                                    </div>
                                </div>
                            </figure>
                        </div>
                    </div>
                    <?php 
                }?>

                </div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>


        </div>
    </div>
</section>
<script>

</script>
<style>
.underline-style-curs {
    font-size: 114px;
    color: rgb(219, 84, 97);
    display: block;
    margin-bottom: -101px;
    margin-top: -70px;
}

.section-title {
    font-size: 52px;
    margin-top: 40px;
    color: white !important;
}

.card-style {
    margin-top: 63px;
    margin-bottom: 52px;
    width: 351.333px;
    margin-right: 16px;
}

.section-style {
    background-color: #003F91;
}

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


.webinar-title {
    font-size: 24px !important;

}

@media (max-width: 450px) {
    .section-title {
        font-size: 37px !important;
        margin-left: -66%;
        margin-top: 14% !important;

    }
    .underline-style-curs {
        margin-left: -84% !important;
}



}
</style>