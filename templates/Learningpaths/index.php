<?php

/**
 * @var \App\View\AppView $this
 * 
 * @var iterable<\App\Model\Entity\Learningpath> $learningpath
 */
?>
<div class="container-xxl flex-grow-1 mt-3 content-container" id="scContent">
    <div class="row">
        <div class="col-md-10 flex" style="max-height:619px!important; border-radius: 16px">
            <div class="card mb-3 add-short-card ">
                <div class="row ">
                    <section class="sec" id="section">
                        <div class="card-body h-100" id="take-quiz-2">
                            <div class="conversation h-100 w-100">
                                <h3 class="pb-1 mb-4 mt-4 text-dark canDSTitle">Manage learning paths</h3>

                                <div class="row row-cols-1 row-cols-md-4 g-4 mb-5">
                                    <?php

                                    foreach ($learningpaths as $lp) {
                                        echo $this->element('course-card', ['img' => $lp->picture, 'title' => $lp->path, 'controller' => 'candostatments', 'id' => $lp->id, 'type' => "learningpaths"]);
                                    }


                                    echo $this->element('add-new', ["canvas" => "#offcanvasEndAddLearningPath"]) ?>


                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="card mb-3 " style="min-height: 499px !important; border-radius: 16px; ">
                <div class="row g-0">

                </div>
            </div>

        </div>
    </div>
</div>
<style>
    .canDSTitle {
        font-family: "Poppins" !important;
        font-size: 22px;
        font-style: normal;
        font-weight: 600;
        line-height: 24px;
    }

    .add-short-card {
        width: 98%;
        margin-left: 2%;
    }
</style>