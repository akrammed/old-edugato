<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Learningpath $learningpath
 */
?>
<div class="container-xxl flex-grow-1 mt-3 content-container" id="scContent">
    <div class="row">
        <div class="col-md-10 flex" style="max-height:400px!important; border-radius: 16px; overflow-y:hidden;">
            <div class="card mb-3 add-short-card ">
                <div class="row ">
                    <section class="sec" id="section">
                        <div class="card-body h-100" id="take-quiz-2">
                            <div class="conversation h-100 w-100">
                                <h3 class="pb-1 mb-4 mt-4 text-dark canDSTitle">Edit learning paths</h3>
                                <?= $this->Form->create($learningpath, ['type' => 'file']) ?>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="card">
                                            <div class="card-img" style="width: 100%;">
                                                <?= $this->Html->image('uploads/learningpaths/' . $learningpath['picture'], ['class' => '', 'id' => 'pathImage', 'style' => "width:100%;height:180px"]) ?>
                                            </div>
                                            <div class="card-body">
                                                <h5 id="cardTitle" class="text-center p-2 cardTitle"><?= $learningpath->path ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="form-group mt-3">
                                            <?= $this->Form->control('path', [
                                                'class' => 'form-control',
                                                'lable' => __('Path'),
                                                'id' => "idPath",
                                                'type' => 'text',
                                                'placeholder' => __('Enter the paht name here...'),

                                            ]);
                                            ?>
                                        </div>

                                        <div class="form-group mt-3">
                                            <?= $this->Form->control('picture', [
                                                'label' => __('Picture '),
                                                'class' => 'form-control',
                                                'type' => 'file',
                                                'id' => 'idPicPath'
                                            ]); ?>

                                        </div>
                                        <div class="d-flex justify-content-between mt-4">
                                            <?= $this->Form->button(__('Back'), ['class' => 'btn btn-md ','style' => 'background-color:#E0EDFF;color: #5C17E5']); ?>
                                            <?= $this->Form->button(__('Save'), ['class' => 'btn btn-md ','style'=>'background-color:#5C17E5;color: #FFF']); ?>
                                        </div>

                                    </div>



                                </div>





                            </div>
                            <?= $this->Form->end() ?>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#idPath").on("input", function() {
            if ($(this).val() == "") {
                $("#cardTitle").text("Path name");
            } else {
                $("#cardTitle").text($(this).val());
            }
        });

        $(function() {
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#pathImage').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                }
            }

            $("#idPicPath").change(function() {
                readURL(this);
            });
        });
    });
</script>

<style>
    .cardTitle {
        color: #000;
        font-family: "Poppins";
        font-size: 17.026px;
        font-style: normal;
        font-weight: 600;
        line-height: 18.574px;
        /* 109.091% */
    }

    .canDSTitle {
        font-family: "Poppins" !important;
        font-size: 22px;
        font-style: normal;
        font-weight: 600;
        line-height: 24px;
    }


</style>