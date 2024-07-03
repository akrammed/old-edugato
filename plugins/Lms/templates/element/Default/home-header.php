<section class="home-sections home-sections-swiper container find-instructor-section position-relative">
    <div class="row align-items-center header-margin">
        <div class="col-12 col-lg-6 mt-20 mt-lg-0">
            <div class="position-relative ">
                <div id="vid-container">
                    <video id="vid" autoplay muted controls disablePictureInPicture
                        controlslist="nodownload noplaybackrate">
                        <source src="<?php echo $this->Url->webroot('img/home.mp4'); ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>


                <?= $this->Html->image('dt.jpeg', [
                    'alt' => 'dotes',
                    'class' => 'find-instructor-section-dots',
                ]) ?>
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="">
                <h2 class="font-36 font-weight-bold text-dark text-center header-title" dir="rtl">تعلّم اللغة <span
                        style="color:#DB5461 !important">الإنجليزية</span>
                    تحكم في لغة العلم</h2>
                <p class="font-16 font-weight-normal text-gray mt-10 text-center sub-header-title" dir="rtl">نحن نوفر لك
                    البيئة المثالية لتعلم اللغة بسرعة وسهولة</p>

                <div class="mt-35 d-flex align-items-center">
                    <?= $this->Html->link(__('إختبر مستواك'), 'https://test.edugato.net', ['class' => 'btn btn-primary mr-15 header-btn']) ?>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
$(document).ready(function() {
    $('#vid')[0].play();
});
</script>
<style>
.header-btn {
    margin-left: 36%;
    height: 56px;
    border-radius: 0px;
    font-size: 27px;
}

.header-title {
    font-size: 50px;
    margin-left: 71px;
    margin-right: 70px;
}

.header-margin {
    margin-top: -52px;
}

.find-instructor-section .find-instructor-section-hero {
    max-width: 451px;
}


#vid {
    display: block;
    width: 100%;
    height: auto;
    border-radius: 0px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
}

#vid-container {
    max-width: 800px;
    margin: 50px auto;
    overflow: hidden;
}

@media (max-width: 450px) {
    .header-title {
        font-size: 31px;
        width: 100%;
        margin-left: 0px;
        margin-right: 0px;
    }

    .sub-header-title {
        font-size: 24px;
    }

    .header-btn {
        width: 39%;
        margin-left: 30%;
        margin-bottom: -49px;
    }


}
</style>