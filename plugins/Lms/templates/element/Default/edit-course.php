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
    <div class="row">
        <div class="col-4 p-3" style="color:black !important; height:800px; background-color:#F9F9F9;">
            <section class="nameDesc">
                <div class="card" style="height:fit-content !important; margin-top:100px;">

                    <div class="card-header" style="padding:0 !important;">
                        <img id="courseImageEdit"
                            src="https://th.bing.com/th/id/OIP.hRXzfT4tS2O-p--lIw8cBwAAAA?rs=1&pid=ImgDetMain"
                            class="course-img img-fluid courseImage" alt="">
                    </div>
                    <div class="card-body">
                        <h3 class="displayTitile">
                            Course Name
                        </h3>
                        <p class="displayDescription">
                            Course Description
                        </p>
                    </div>
                </div>
            </section>
            <section class="slugSection" style="display:none;">
                <div class="card"
                    style="background-image: url(https://cdn.mycourse.app/v3.5.8-rc1/author/images/wizards/course-wizard-1.svg); background-position:center; background-size: cover; height:400px;">
                    <input type="text" id="slugTextEdit" value=".../courses/" style="border:none !important;" read-only>
                </div>
            </section>
            <section class="courseType" style="display:none;">
                <div class="card" style="height:250px !important; margin-top:100px;">

                    <div class="card-header">
                        <img id="" src="https://th.bing.com/th/id/OIP.hRXzfT4tS2O-p--lIw8cBwAAAA?rs=1&pid=ImgDetMain"
                            class="course-img img-fluid courseImage" alt="">
                    </div>
                    <div class="card-body">
                        <h3 class="displayTitile">
                            Course Name
                        </h3>
                        <p class="displayDescription">
                            Course Description
                        </p>
                    </div>
                </div>
            </section>



        </div>
        <div class="col-8 p-3" style="color:black !important;">
            <form action="<?= $this->Url->build([
            'plugin'=> 'Lms',
            'controller' => 'Courses',
            'action' => 'edit']) ?>" method="post" class="needId" enctype="multipart/form-data">
            <input type="hidden" name="_csrfToken" value="<?= $this->request->getAttribute('csrfToken') ?>">
                <div class="d-flex p-3 mt-3">
                    <div id="st1" class="step done">&nbsp</div>
                    <div id="st2" class="step">&nbsp</div>
                    <div id="st3" class="step">&nbsp</div>
                </div>


                <section class="p-3 nameDesc" id="nameDesc">
                    <h4>Let’s set up your course</h4>
                    <div class=" mt-3 mb-3">
                        <label for="" class="form-label">What is the name of your course?</label>
                        <input type="text" class="form-control" name="title" id="titleEdit" aria-describedby="helpId"
                            placeholder="e.g Intro to UX design" />
                    </div>
                    <div class=" mt-3 mb-3">
                        <label for="" class="form-label">What is the level of your course?</label>
                        <select name="level_id" id="levelSelectEdit" class="form-control">

                        </select>
                        <!-- <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId"
                            placeholder="e.g Intro to UX design" /> -->
                    </div>
                    <div class=" mt-3 mb-3">
                        <label for="" class="form-label">What is the category of your course?</label>
                        <select name="category_id" id="categorySelectEdit" class="form-control">

                        </select>
                        <!-- <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId"
                            placeholder="e.g Intro to UX design" /> -->
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">How would you describe the content? (optional)</label>
                        <input type="text" class="form-control" name="description" id="descriptionEdit" aria-describedby="helpId"
                            placeholder="e.g An introduction to the user experience" />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Upload course image</label>
                        <input type="file" class="form-control" name="picture" id="imgCEdit"
                            aria-describedby="fileHelpId" />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Upload a cover image (optional)</label>
                        <input type="file" class="form-control" name="background_picture" id="backImgEdit" placeholder=""
                            aria-describedby="fileHelpId" />
                    </div>
                    <div id="" class="d-flex justify-content-start">
                        <button type="button" class="btn btn-primary" onclick="nextPrev('nameDesc','slugSection',1)"
                            style="height:30px !important;">
                            Next
                        </button>
                    </div>
                </section>
                <section class="slugSection" id="slugSection" style="display:none">
                    <h4>Create your course URL</h4>
                    <div class=" mt-3 mb-3">
                        <label for="" class="form-label">What is the course URL?</label><br>
                        <small>https://www.edugato.net/courses/</small>
                        <input type="text" class="form-control" name="slug" id="slugEdit" aria-describedby="helpId"
                            placeholder="Slug" />

                    </div>
                    <div id="" class="d-flex justify-content-start">
                        <button type="button" class="btn cntrl" id="backBtn"
                            onclick="nextPrev('slugSection','nameDesc',-1)"
                            style="height:30px !important;border-color: #DB5461 !important; margin-right:10px;">
                            Back
                        </button>
                        <button onclick="nextPrev('slugSection','courseType',1)" type="button" class="btn btn-primary"
                            style="height:30px !important;">
                            Next
                        </button>
                    </div>
                </section>
                <section class="courseType" style="display:none;">
                <h4 class="mb-3">Create your course URL</h4>
                <small >How will the users access the course?</small>
                    <div class="form-check mt-3 mb-3">
                        <input class="form-check-input" type="radio" name="is_paid" id="exampleRadios1" value="0"
                            checked>
                        <h6 class="form-check-label" for="exampleRadios1">
                            Free
                        </h6>
                        <small>The course will be accessible to all for free.</small>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" name="is_paid" id="exampleRadios1" value="1"
                            checked>
                        <h6 class="form-check-label" for="exampleRadios1">
                            Paid
                        </h6>

                        <small>The course will be available only to users who have purchased it.</small>
                    </div>
                    <div id="" class="d-flex justify-content-start">
                        <button type="button" class="btn cntrl" id="backBtn"
                            onclick="nextPrev('courseType','slugSection',-1)"
                            style="height:30px !important;border-color: #DB5461 !important; margin-right:10px;">
                            Back
                        </button>
                        <button type="submit" class="btn btn-primary" style="height:30px !important;">
                            Edit
                        </button>
                    </div>
                </section>


            </form>


        </div>
    </div>
</div>
<script>
    var step = 2;
    function nextPrev(classPrev, classNext, type) {
        $(`.${classPrev}`).css('display', 'none');
        $(`.${classNext}`).css('display', 'block');
        if (type == -1) {
            step--;
            $(`#st${step}`).css('background-color', 'grey');

        } else {
            $(`#st${step}`).css('background-color', 'rgb(219,84,97)');
            step++;

        }
    }
    $(document).ready(function () {

        $('#titleEdit').change(function () {
            $('.displayTitile').text($('#titleEdit').val());
        });
        $('#descriptionEdit').change(function () {
            $('.displayDescription').text($('#descriptionEdit').val());
        });
        $('#slugEdit').change(function (){
            $('#slugTextEdit').val(`.../courses/${$('#slugEdit').val()}`);
        })

        $(function () {
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('.courseImage').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                }
            }

            $("#imgCEdit").change(function () {
                readURL(this);
            });
        });
    });
</script>
