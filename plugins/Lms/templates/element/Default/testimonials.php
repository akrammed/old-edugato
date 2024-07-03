<div class="position-relative home-sections testimonials-container" style="margin-bottom: 68px;">

    <div id="parallax1" class="ltr">
        <div data-depth="0.2" class="gradient-box left-gradient-box"></div>
    </div>

    <section class="container home-sections home-sections-swiper">
        <div class="text-center">
            <h2 class="section-title text-dark testimonial-title">شهادات من طلابنا</h2>
            <span class="underline-style">—</span>
        </div>

        <div class="position-relative">
            <div class="swiper-container testimonials-swiper px-12">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div
                            class="testimonials-card position-relative py-15 py-lg-30 px-10 px-lg-20 rounded-sm shadow bg-white text-center">
                            <div class="d-flex flex-column align-items-center">
                                <div class="testimonials-user-avatar">

                                    <?= $this->Html->image('Testimonials1.jpg', [
                                        'alt' => 'Ryan Newman',
                                        'class' => 'img-cover rounded-circle',
                                    ]) ?>

                                </div>
                                <h4 class="font-16 font-weight-bold text-secondary mt-30">Anis Raissi</h4>
                                <span class="d-block font-14 text-gray">مهندس معماري</span>
                                <div class="stars-card d-flex align-items-center  mt-15">

                                    <i data-feather="star" width="20" height="20" class="active"></i>
                                    <i data-feather="star" width="20" height="20" class="active"></i>
                                    <i data-feather="star" width="20" height="20" class="active"></i>
                                    <i data-feather="star" width="20" height="20" class="active"></i>
                                    <i data-feather="star" width="20" height="20" class="active"></i>

                                </div>
                            </div>

                            <p class="mt-25 text-gray font-14">
                                هذه المنصة جد فعالة! لقد سمحت لي بتحسين مستواي في اللغة الإنجليزية ، وتعلمت الكثير من
                                الآخرين. أحب حقًا التنوع في التمارين على المنصة. وكل هذا أثناء المكوث في المنزل !!
                                إنه أمر رائع حقًا</p>

                            <div class="bottom-gradient"></div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div
                            class="testimonials-card position-relative py-15 py-lg-30 px-10 px-lg-20 rounded-sm shadow bg-white text-center">
                            <div class="d-flex flex-column align-items-center">
                                <div class="testimonials-user-avatar">
                                    <?= $this->Html->image('Testimonials2.jpg', [
                                        'alt' => 'Ryan Newman',
                                        'class' => 'img-cover rounded-circle',
                                    ]) ?>
                                </div>
                                <h4 class="font-16 font-weight-bold text-secondary mt-30">Chaima Abdelli</h4>
                                <span class="d-block font-14 text-gray">Enseignante</span>
                                <div class="stars-card d-flex align-items-center  mt-15">

                                    <i data-feather="star" width="20" height="20" class="active"></i>
                                    <i data-feather="star" width="20" height="20" class="active"></i>
                                    <i data-feather="star" width="20" height="20" class="active"></i>
                                    <i data-feather="star" width="20" height="20" class="active"></i>
                                    <i data-feather="star" width="20" height="20" class="active"></i>

                                </div>
                            </div>

                            <p class="mt-25 text-gray font-14">Cette formation était l’une des meilleures choses que
                                j’ai fait pour m’améliorer et pour développer mes capacités dans la langue anglaise.
                            </p>

                            <div class="bottom-gradient"></div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div
                            class="testimonials-card position-relative py-15 py-lg-30 px-10 px-lg-20 rounded-sm shadow bg-white text-center">
                            <div class="d-flex flex-column align-items-center">
                                <div class="testimonials-user-avatar">
                                    <?= $this->Html->image('Testimonials3.jpg', [
                                        'alt' => 'Ryan Newman',
                                        'class' => 'img-cover rounded-circle',
                                    ]) ?>
                                </div>
                                <h4 class="font-16 font-weight-bold text-secondary mt-30">Mohamed Fares</h4>
                                <span class="d-block font-14 text-gray">Flight Attendant</span>
                                <div class="stars-card d-flex align-items-center  mt-15">

                                    <i data-feather="star" width="20" height="20" class="active"></i>
                                    <i data-feather="star" width="20" height="20" class="active"></i>
                                    <i data-feather="star" width="20" height="20" class="active"></i>
                                    <i data-feather="star" width="20" height="20" class="active"></i>
                                    <i data-feather="star" width="20" height="20" class="active"></i>

                                </div>
                            </div>

                            <p class="mt-25 text-gray font-14">Honestly, I really appreciate the method in which you
                                present the lessons. Also we realy feel the improvement day by day , all this without
                                moving!</p>

                            <div class="bottom-gradient"></div>
                        </div>
                    </div>

                </div>

            </div>


        </div>
    </section>

    <div id="parallax2" class="ltr">
        <div data-depth="0.4" class="gradient-box right-gradient-box"></div>
    </div>

    <div id="parallax3" class="ltr">
        <div data-depth="0.8" class="gradient-box bottom-gradient-box"></div>
    </div>
</div>

<script>

</script>
<style>
.underline-style {
    font-size: 114px;
    color: rgb(219, 84, 97);
    display: block;
    margin-bottom: -101px;
    margin-top: -70px;
}

.testimonial-title {
    font-size: 40px !important;
    color: #003F91 !important;
}

@media (max-width: 450px) {
    .section-title {
        font-size: 32px !important;
        margin-right: -60%;
        margin-top: -11%;
    }

    .underline-style {
        margin-left: -6% !important;
    }
}
</style>