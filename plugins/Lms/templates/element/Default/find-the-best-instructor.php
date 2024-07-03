<section class="section-mobile">
    <div class="home-sections home-sections-swiper container find-instructor-section position-relative">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6 custom-mrg-mobile-section">
                <div class="">
                    <h2 class="font-36 font-weight-bold text-white text-center">EduGato <br>
                        في جيبك
                    </h2>

                    <div style="color:white" class=" font-20 text-center">بوسعك التعلم من كل مكان وفي أي وقت</div>


                    <div class="mt-35 d-flex align-items-center mob-icon">
                        <?= $this->Html->link(
                        $this->Html->image('app-store.png', [
                            'alt' => 'App Store',
                            'class' => 'btn  ', 
                        ]),
                        '/comming-lms',
                        ['escape' => false],
                    ) ?>

                        <?= $this->Html->link(
                        $this->Html->image('play-store.png', [
                            'alt' => 'Play Store',
                            'class' => 'btn  ', 
                        ]),
                        '/comming-lms',
                        ['escape' => false],
                    ) ?>
                    </div>
                    <br><br>
                    <h2 class="font-36 font-weight-bold text-white text-center">تطبيقنا متاح على كل من
                        <br>iOS و Android
                    </h2>
                </div>
            </div>

            <div class="col-12 col-lg-6 mt-20 mt-lg-0 custom-mrg-mobile-section">
                <div class="position-relative ">


                    <?=
                    $this->Html->image('app.png', [
                        'alt' => 'app mobile',
                        'class'=>'img-mobile'
                    ])?>


                </div>
            </div>
        </div>
    </div>
</section>

<script>

</script>
<style>
.custom-mrg-mobile-section {
    margin-top: 50px !important;
    margin-bottom: 50px;
}

.section-mobile {
    background-color: #DB5461 !important;
}

.img-mobile {
    width: 332px;
    margin-left: 79px;
}

.mob-icon {
    margin-left: 9%;
}

@media (max-width: 450px) {
    .mob-icon {
        margin-left: 0%;
    }

    .img-mobile {
        width: 332px;
        margin-left: 9px;
        margin-top: -20%;
    }

}
</style>