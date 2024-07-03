<?php 

$this->assign('title', 'Courses');

?>

<style>
.img-cover {
    object-position: 0% 0% !important;
}
</style>
<div id="app" class="">




    <div class="container mt-30">



        <section class="mt-lg-50 pt-lg-20 mt-md-40 pt-md-40">
            <div id="filtersForm">



                <div class="row mt-20">
                    <div class="col-12 col-lg-12">


                        <div class="d-flex justify-content-between ">
                            <div class="px-20 px-md-0">
                                <h1 style="font-size:32px" class="section-title">Our Courses</h1>

                            </div>

                        </div>

                        <br><br>
                        <div class="row custom-swipe">
                            <?php foreach ($courses as $c) {
          ?>

                            <div class="swiper-slide" style="width:320px; margin-right: 16px;margin-bottom:25px">
                                <div class="webinar-card">
                                    <figure>
                                        <div class="image-box">

                                            <?= $this->Html->link(
                                $this->Html->image('uploads/picture/'. $c['picture'] , ['class' => 'img-cover']),
                                ['plugin'=> 'Lms','controller' => 'Courses', 'action' => 'View',$c->id],
                                ['escape' => false]
                                ) ?>
                                        </div>

                                        <figcaption class="webinar-card-body">


                                            <a>
                                                <h3
                                                    class="d-flex justify-content-center mt-15 webinar-title font-weight-bold font-16 text-dark-blue">
                                                    <?= $c['title']?></h3>
                                            </a>




                                            <div class="d-flex justify-content-center webinar-price-box mt-25">
                                                <?= $this->Html->link( __('View Course'),['plugin'=> 'Lms','controller' => 'Courses', 'action' => 'View',$c->id],['class' => 'btn btn-primary mr-15','style'=>'height: 39px;']) ?>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                            <?php 
                }?>


                        </div>
                    </div>


                </div>

            </div>

        </section>
    </div>


    <script>

    </script>

    <style>
    @media (max-width: 450px) {
        .custom-swipe {
            margin-left: 7%;
        }

    }
    </style>