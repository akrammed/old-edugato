<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Learningpath $learningpath

 */
?>
<div class="container">
    <?= $this->Form->create($learningpath,['type' => 'file']) ?>
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-img">
                    <img src="https://th.bing.com/th/id/OIP.hRXzfT4tS2O-p--lIw8cBwAAAA?rs=1&pid=ImgDetMain" alt="" id="pathImage" class="img-fluid">
                </div>
                <div class="card-body">
                    <h5 id="cardTitle" class="text-center p-2 cardTitle">Path Name</h5>
                </div>
            </div>
        </div>
        <div class="col-6">
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
            <div class="col-12 mt-4">
            <?= $this->Form->button(__('Save'), ['id' => 'saveUser', 'class' => 'btn btn-md',"style" => 'background-color:#5C17E5;color: #FFF']); ?>

    </div>
        </div>



    </div>





</div>
<?= $this->Form->end() ?>
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
</style>