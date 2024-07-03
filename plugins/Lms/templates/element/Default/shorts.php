<section class="section-mobile" style="    margin-top: -7%;">
    <div class="home-sections home-sections-swiper container find-instructor-section position-relative">
        <div class="row align-items-center">
            <div class="col-12 col-lg-12 custom-mrg-mobile-section">

                <div class="col-sm-6" style="color: white;
    font-size: 31px;
    margin-left: 71%;
    margin-bottom: 1%;">لمزيد من
                    المحتوى<?= $this->Html->link(' اضغط هنا ',['controller'=>'Shorts', 'action'=>'watch'],['escape'=>false,'class'=>'more-content-title']); ?>
                </div>
                <div class="row">

                    <?php
shuffle($shorts);
$k = 0;
foreach ($shorts as $short): ?>
                    <?php

            ?>

                    <div class="col-lg-2 col-md-6 col-sm-12 " style="margin-top: 1%;
margin-bottom: 2%;padding: 0%;">

                        <a href="<?= $this->Url->build(['controller'=>'Shorts', 'action'=>'watch',$short->id]);?>">
                            <div class="card-header" style="padding:0 !important; max-height:295px !important;">
                                <source>
                                <video style="height: 297px;" class="courseImage course-img img-fluid" src="
                <?php echo $this->Url->build('/img/uploads/video/' . $short['video'], ['class' => 'course-img img-fluid']) ?>
                " autoplay muted loop disablePictureInPicture controlslist="nodownload noplaybackrate"></video>
                                </source>
                            </div>

                        </a>

                    </div>

                    <?php $k++;
                if ($k == 6) {
                    break;
                }
                endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</section>

<script>

</script>
<style>
.more-content-title {

    text-decoration: underline;
    font-weight: 800;
    font-size: 38px;
    color: white;

}

@media (max-width: 450px) {

    .more-content-title {
        margin-left: -75%;
    }
}
</style>