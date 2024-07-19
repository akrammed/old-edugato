<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Candostatment $candostatment
 * @var iterable<\App\Model\Entity\Candostatment> $candostatments
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
                                <h3 class="pb-1 mb-4 mt-4 text-dark canDSTitle">Manage Can Do Statemnts For : <?= $learningpath->path ?> <span></span></h3>

                                <div class="d-flex align-items-center">
                                    <div class="icon-container">
                                        <?= $this->element('icons/plus') ?>
                                    </div>
                                    <div class="d-flex mt-3 ms-2">
                                        <button style="background: none; border:none">
                                            <h5 class="titleAddSection" data-bs-toggle="modal" data-bs-target="#modalAddCanDo">Add can do statment</h5>
                                        </button>
                                        <h6 class="" style="font-size: 14px;font-style: normal;font-weight: 400;line-height: 24px;"> Or </h6>
                                        <button style="background: none; border:none">
                                            <h5 class="titleAddSection">Preview path</h5>
                                        </button>
                                    </div>

                                </div>
                                <div class="ms-4 mt-3">
                                    <?php
                                    $i = 1;
                                    foreach ($candostatments as $cd) {
                                        echo $this->element('candostatment-line', ['type' => "candostatments", 'cd' => $cd, 'i' => $i]);
                                        $i++;
                                    }
                                    ?>
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
<?= $this->element('modals/add-cando', ['candostatment' => $candostatment, 'id' => $learningpath->id]) ?>
<style>
    .titleAddSection {
        color: #5C17E5;

        /* Title/Medium */
        font-family: "Poppins";
        font-size: 16px;
        font-style: normal;
        font-weight: 600;
        line-height: 18px;
        /* 112.5% */
    }

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