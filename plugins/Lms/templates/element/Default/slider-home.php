<style>
.find-instructor-section .find-instructor-section-hero {
    max-width: 451px;
}


#vid {
    display: block;
    width: 100%;
    height: auto;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
}

#vid-container {
    max-width: 800px;
    margin: 50px auto;
    overflow: hidden;
}
</style>

<section class="home-sections home-sections-swiper container find-instructor-section position-relative">
    <div class="row align-items-center">
        <div class="col-12 col-lg-6 mt-20 mt-lg-0">
            <div class="position-relative ">
                <div id="vid-container">
                    <video id="vid" autoplay muted controls  disablePictureInPicture controlslist="nodownload noplaybackrate" >
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
                <h2 style="font-size: 40px" class="font-36 font-weight-bold text-dark">Learn English <br> Master the language of science.</h2>
                <p class="font-16 font-weight-normal text-gray mt-10">We provide you with the perfect environment to learn the language quickly and easily.</p>

                <div class="mt-35 d-flex align-items-center">
                    <?= $this->Html->link(__('Free Level Test'), '/comming-lms', ['class' => 'btn btn-primary mr-15', 'style' => 'height: 39px;']) ?>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
$(document).ready(function() {
    $('#vid')[0].play(); // Use [0] to access the DOM element from jQuery object
});
</script>