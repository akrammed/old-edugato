<style>
.step {
    min-width: 40px !important;
    background-color: grey;
    color: black !important;
    margin-right: 10px;
    height: 3px;
    border-radius: 10px;


}

.done {
    background-color: #DB5461 !important;
}
</style>

<div class="container">
    <div class="row ">
        <div class="col-4 p-3 " style="color:black !important; background-color:#F9F9F9;">
            <section class="nameDesc">
                <div class="card" style="height:fit-content !important; margin-top:63px;">

                    <div class="card-header" style="padding:0 !important; height:300px">


                        <source>
                        <video style="width :100%; height:300px" class="courseImage course-img img-fluid" src=""
                            autoplay controls></video>
                        </source>

                    </div>
                    <div class="card-body">
                        <h3 class="displayTitile">
                            Short Title
                        </h3>
                        <p class="displayDescription">
                            short Description
                        </p>
                    </div>
                </div>
            </section>
            <section class="slugSection" style="display:none;">
                <div class="card"
                    style="background-image: url(https://cdn.mycourse.app/v3.5.8-rc1/author/images/wizards/course-wizard-1.svg); background-position:center; background-size: cover; height:400px;">
                    <input type="text" id="slugText" value=".../courses/" style="border:none !important;" read-only>
                </div>
            </section>



        </div>
        <div class="col-8 p-3" style="color:black !important; height: 83%;">
            <form type="file" action="<?= $this->Url->build([
            'plugin'=> null,
            'controller' => 'Shorts',
            'action' => 'add']) ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_csrfToken" value="<?= $this->request->getAttribute('csrfToken') ?>">


                <section class="p-3 nameDesc" id="nameDesc">
                    <h4>Let’s set up your short</h4>
                    <div class=" mt-3 mb-3">
                        <label for="" class="form-label">What is the title of the short?</label>
                        <input type="text" class="form-control" name="title" id="titleS" />
                    </div>
                    <div class=" mt-3 mb-3">
                        <label for="" class="form-label">What is the description of the short?</label>
                        <input type="text" class="form-control" name="description" id="descriptionS" />
                    </div>

                    <div class="mb-3">
                        <?= $this->Form->control('video', [
                                'class' => 'form-control',
                                'type' => 'file',
                                'id' => 'vidS',
                                'label' => 'Upload short'    

                            ]);
                            ?>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-sm-6">

                                <?= $this->Form->control('quiztitle', [
                                'class' => 'form-control',
                                'type'=>'text',
                                 'value'=> '',   
                                'id' => 'quiz-short',
                                'label' => 'Add quiz'    
                            ]);
                            ?>
                             <?= $this->Form->control('quiz_id', [
                                'class' => 'form-control',
                                'type'=>'text',
                                 'value'=> '',   
                                'id' => 'quiz-id',
                                'hidden'=> true,
                                'label' => ''    
                            ]);
                            ?>
                            </div>
                            <div class="col-sm-6">
                                <a class="show-popup"  id="exm-short" href="#" data-popup="add-activity-pop-up"> <img style="width: 94px;
    margin-left: 6%;
    margin-top: 11%;
" src="https://th.bing.com/th/id/OIP.byDYmHnervKPKUPSLBDgrgHaEK?rs=1&pid=ImgDetMain" class="img-fluid" alt=""
                                        srcset=""></a>

                            </div>
                        </div>

                    </div>


                    <div id="" class="d-flex justify-content-start">
                        <button type="submit" id="short-save" class="btn btn-primary" style="height:30px !important;border-radius: 0%;">
                            Save
                        </button>
                    </div>

                </section>


            </form>


        </div>
    </div>
</div>
<script>
$(document).ready(function() {

    $('#titleS').change(function() {
        $('.displayTitile').text($('#titleS').val());
    });
    $('#descriptionS').change(function() {
        $('.displayDescription').text($('#descriptionS').val());
    });

    $(function() {
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.courseImage').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#vidS").change(function() {
            readURL(this);
        });
    });

    $('#exm-short').click(function() {
        $('#add-short-pop-up').css('display', 'none');
        $('#mult').css('display', 'none');
        $('#exams').css('display', 'block');
        $('#short-add').css('display', 'block');
        $('#QuizzeType').css('display', 'block');
        $('#multimidia').css('display', 'none');
        $('.typeQuiz').css('display', 'none');
    });
    $('#short-add').click(function() {
        $('#add-short-pop-up').css('display', 'block');
        $('#add-activity-pop-up').css('display', 'none');
    });

})
</script>