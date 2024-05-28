<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Short> $shorts
 */
?>

<div class="panel-content">


    <section class="mt-35" style="margin-top: 55px !important;">

        <div class="row">
            <div class="col-sm-6">
                <h2 class="section-title" style="font-weight: 600;
    font-size: 31px;color:#DB5461">
                    <?= __('Shorts List') ?>
                </h2>
            </div>
            <div class="col-sm-6">

                <a class="show-popup"  id="shortadd" href="#" data-popup="add-short-pop-up"> <img style="width: 94px;
    margin-left: 81%;" src="https://th.bing.com/th/id/OIP.byDYmHnervKPKUPSLBDgrgHaEK?rs=1&pid=ImgDetMain"
                        class="img-fluid" alt="" srcset=""></a>

            </div>
        </div>




    </section>

    <div class="row">

        <?php

        foreach ($shorts as $short): ?>
        <?php

                    ?>

        <div class="col-lg-3 col-md-6 col-sm-12 " style="margin-top: 1%;
    margin-bottom: 2%;">
            <div class="position-absolute" style="display:flex; z-index:999999; " id="cntrlCourse<?= $short->id ?>">
                <form action="<?= $this->Url->build([
                                'plugin' => null,
                                'controller' => 'Shorts',
                                'action' => 'delete',
                                $short->id
                            ]) ?>" method="post">
                    <input type="hidden" name="_csrfToken" value="<?= $this->request->getAttribute('csrfToken') ?>">
                    <button class="bg-gray  border-none" type="submit"><i
                            class="bi bi-trash-fill text-white"></i></button>
                </form>

            </div>
            <a class="card" href="">
                <div class="card-header" style="padding:0 !important; max-height:300px !important;">
                    <source>
                    <video style="width: 100%; height:270px" class=" course-img img-fluid" src="
                        <?php echo $this->Url->build('/webroot/img/uploads/video/' . $short['video'], ['class' => 'course-img img-fluid']) ?>
                        " autoplay muted controls></video>
                    </source>
                </div>
                <div class="card-body">
                    <h3>
                        <?= $short->title; ?>
                    </h3>
                </div>
            </a>

        </div>

        <?php endforeach; ?>

    </div>




</div>

<style>
.py-20-custom {
    padding-bottom: 58px !important;
}
</style>