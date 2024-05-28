<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\Cake\Datasource\EntityInterface> $courses
 */

$totalCourses = 0;
$totalHours = 0;
$totalLiveClass = 0;
$totalSales = 0;
?>

<div class="panel-content">
<section class="mt-35" style="margin-top: 55px !important;">

<div class="row">
    <div class="col-sm-6">
        <h2 class="section-title" style="font-weight: 600;
font-size: 31px;color:#DB5461">
            <?= __('Courses List') ?>
        </h2>
    </div>
    <div class="col-sm-6">

        <a class="show-popup" href="#" data-popup="add-course-pop-up"> <img style="width: 94px;
margin-left: 81%;" src="https://th.bing.com/th/id/OIP.byDYmHnervKPKUPSLBDgrgHaEK?rs=1&pid=ImgDetMain"
                class="img-fluid" alt="" srcset=""></a>

    </div>
</div>




</section>


    <section class="mt-35">

        <div class="row">

            <?php

            foreach ($courses as $course): ?>
                <?php

                ?>

                <div class="col-lg-3 col-md-6 col-sm-12 ">

                    <div class="position-absolute" style="display:flex; z-index:999999; "
                        id="cntrlCourse<?= $course->id ?>">
                        <button class=" bg-gray border-none show-popup" data-popup="edit-course-pop-up"
                            data-courseId="<?= $course->id ?>"><i class="bi bi-pencil-square text-white"></i></button>
                        <form action="<?= $this->Url->build([
                            'plugin' => 'Lms',
                            'controller' => 'Courses',
                            'action' => 'delete',
                            $course->id
                        ]) ?>" method="post">
                            <input type="hidden" name="_csrfToken" value="<?= $this->request->getAttribute('csrfToken') ?>">
                            <button class="bg-gray  border-none" type="submit"><i
                                    class="bi bi-trash-fill text-white"></i></button>
                        </form>

                    </div>
                    <a class="card" href="<?= $this->Url->build([
                        'plugin' => 'Lms',
                        'controller' => 'Courses',
                        'action' => 'manage',
                        $course->id
                    ]) ?>">
                        <div class="card-header" style="padding:0 !important; max-height:200px !important;">
                            <?= $this->Html->image('uploads/picture/' . $course['background_picture'], ['class' => 'course-img img-fluid']) ?>
                        </div>
                        <div class="card-body">
                            <h3>
                                <?= $course->title; ?>
                            </h3>
                        </div>
                    </a>

                </div>

            <?php endforeach; ?>

        </div>





    </section>


</div>
