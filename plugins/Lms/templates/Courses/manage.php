<style>
    .custom-input {
        border: none;

        box-shadow: none;
        background-color: #FBFBFD !important;
        border-radius: 0 !important;
        width: 250px;
    }

    .borderRed {
        border-bottom: 2px solid #DB5461;
    }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<div class="panel-content">
    <div class="" style="margin-top:100px !important;">
        <div id="contentsSection" class="">
            <div class="-contents js-course-contents" style="margin-left:20px;">
                <?php
                $num = 1;
                ?>
                <?php foreach ($lessons as $lesson) {
                    ?>
                    <div class="course-chapter droppable  js-section-item mb-3">
                        <div class="chapter-wrapper" data-access="public">
                            <div class="chapter-box admin-editable" data-titleid="osjdo_fddfd"
                                title="Click to edit section">
                                <div class="" id="editLess<?= $lesson->id ?>">
                                    <div class="position-absolute" style="display:none;" id="cntrlLesson<?= $lesson->id ?>">
                                        <button class=" bg-gray border-none show-popup" data-popup="edit-lesson-popup"
                                            data-lessonId="<?= $lesson->id ?>"><i
                                                class="bi bi-pencil-square text-white"></i></button>
                                        <form action="<?= $this->Url->build([
                                            'plugin' => 'Lms',
                                            'controller' => 'Lessons',
                                            'action' => 'delete',
                                            $lesson->id
                                        ]) ?>" method="post">
                                            <input type="hidden" name="_csrfToken"
                                                value="<?= $this->request->getAttribute('csrfToken') ?>">
                                            <button class="bg-gray  border-none" type="submit"><i
                                                    class="bi bi-trash-fill text-white"></i></button>
                                        </form>

                                    </div>
                                    <div class="d-flex align-items-center mb-3">

                                        <h1 class="chapter-num" style="margin-right:20px; font-size: 3rem !important;">
                                            <?php

                                            echo str_pad($num, 2, '0', STR_PAD_LEFT);
                                            ;
                                            $num++;
                                            ?>
                                        </h1>

                                        <div class="chapter-title-wrapper">
                                            <h2 class="chapter-title" style="font-size: 2rem !important;">
                                                <?= $lesson->lesson ?>
                                            </h2>

                                        </div>
                                    </div>
                                </div>
                                <?php
                                foreach ($lesson->chapters as $chapter) {
                                    ?>
                                    <div class="edited mb-1 draggable" style="margin-left:20px;">
                                        <form action="/edit-chapter" method="post">
                                            <input type="hidden" name="_csrfToken"
                                                value="<?= $this->request->getAttribute('csrfToken') ?>">
                                            <input type="hidden" name="chapter_id" value=<?= $chapter->id ?>>
                                            <input type="hidden" name="course_id" value=<?= $course->id ?>>
                                            <div class="d-flex align-items-center">
                                                <div class="inputVideo d-flex align-items-center">
                                                    <div class="input-group align-items-center" id="c<?= $chapter->id ?>">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-transparent border-0"
                                                                style="background-color: transparent !important;">
                                                                <?php if ($chapter->quizz_title) {
                                                                    ?>
                                                                    <i class="bi bi-question-circle" style="font-size:2rem;"></i>
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <i class="bi bi-play-circle" style="font-size:2rem;"></i>
                                                                    <?php
                                                                } ?>
                                                            </span>
                                                        </div>
                                                        <input id="t<?= $chapter->id ?>" type="text"
                                                            class="form-control custom-input" name="chapter"
                                                            placeholder="Your text here" value="<?= $chapter->chapter ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="control d-none align-items-center" style="margin-left:10px;"
                                                    id="ct<?= $chapter->id ?>">
                                                    <button class="btn btn-primary" type="submit"
                                                        style="height:30px; border-radius:5px !important; width:70px !important; margin-right:2px; padding:0 !important;">Save</button>
                                                    <?php
                                                    if ($chapter->quizz == null) {
                                                        ?>
                                                        <button class="btn btn-primary show-popup" type="button"
                                                            data-popup="add-video-pop-up" data-chapterId="<?= $chapter->id ?>"
                                                            data-courseId="<?= $course->id ?>" data-lessonId="<?= $lesson->id ?>"
                                                            style="height:30px; border-radius:5px !important; width:150px !important; margin-right:2px; padding:0 !important;">Edit</button>
                                                        <?php



                                                    }
                                                    ?>

                                                    <button id="n<?= $chapter->id ?>" class="bg-gray" type="button"
                                                        style="height:30px; border-radius:5px !important; width:30px !important; padding:10px;margin-right:2px; padding:0 !important;"><i
                                                            class="bi bi-x-lg" style="color:white !important;"></i></button>
                                                    <button class="bg-gray" type="button" id="delteChapter<?= $chapter->id ?>"
                                                        style="height:30px; border-radius:5px !important; width:30px !important; padding:10px;margin-right:2px; padding:0 !important;"><i
                                                            class="bi bi-trash3" style="color:white !important;"></i></button>

                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                    <?php
                                }
                                ?>
                                <div class="videoActivity mb-3" style="margin-left:20px; display:none;"
                                    id=cntrl<?= $lesson->id ?>>
                                    <form action="/add-chapter" method="post">
                                        <input type="hidden" name="_csrfToken"
                                            value="<?= $this->request->getAttribute('csrfToken') ?>">
                                        <input type="hidden" name="lesson_id" value=<?= $lesson->id ?>>
                                        <input type="hidden" name="course_id" value=<?= $course->id ?>>
                                        <div class="d-flex align-items-center">
                                            <div class="inputVideo d-flex align-items-center">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-transparent border-0"
                                                            style="background-color: transparent !important;">


                                                            <i class="bi bi-play-circle" style="font-size:2rem;"></i>
                                                        </span>
                                                    </div>
                                                    <input id="txt<?= $lesson->id ?>" type="text"
                                                        class="form-control custom-input borderRed" name="chapter"
                                                        placeholder="Your text here">
                                                </div>
                                            </div>
                                            <div class="control d-flex align-items-center" style="margin-left:10px;">
                                                <button class="btn btn-primary show-popup" data-popup="add-video-pop-up"
                                                    data-lessonId="<?= $lesson->id ?>" type="button"
                                                    data-courseId="<?= $course->id ?>"
                                                    style="height:30px; border-radius:5px !important; width:100px !important; margin-right:2px; padding:0 !important;">Edit</button>
                                                <button class="btn btn-primary" type="submit"
                                                    style="height:30px; border-radius:5px !important; width:70px !important; margin-right:2px; padding:0 !important;">Save</button>
                                                <button id="d<?= $lesson->id ?>" class="bg-gray" type="button"
                                                    style="height:30px; border-radius:5px !important; width:30px !important; padding:10px;margin-right:2px; padding:0 !important;"><i
                                                        class="bi bi-trash3" style="color:white !important;"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div id="sectionButtons" class="flex j-c-sb gap-4">
                                    <a class="edit-btn moveup" title="Move section up"></a>
                                    <a class="edit-btn movedn" title="Move section down"></a>
                                    <a class="edit-btn add" title="Add section below"></a>

                                    <a class="edit-btn copy js-copy" title="Copy section"></a>
                                    <a class="edit-btn paste js-paste" title="Paste section below"></a>
                                    <a class="edit-btn import js-import-section" title="Import section below"></a>
                                    <a class="edit-btn delete" title="Delete section"></a>


                                </div>
                            </div>
                            <div class="chapter-contents mb-3" style="margin-left:20px;">
                                <ul class="chapter-cont-list ui-sortable" onclick="" style="user-select: none;">

                                </ul><span class="btn btn-primary show-popup" data-lessonId="<?= $lesson->id; ?>"
                                    style="height:25px; border-radius:5px !important; width:150px !important; margin-right:10px; padding:0 !important;"
                                    title="Click to add Activity" data-popup="add-activity-pop-up">
                                    <span>Add activity</span>
                                </span><small>Or</small> <span data-popup="import-activity-pop-up"
                                    class="p-5-15 inline-block cursor-pointer import-activity-btn js-import-activity-btn show-popup"
                                    data-lessonId="<?= $lesson->id; ?>" style="margin-right: -15px; margin-left:10px;"
                                    title="Click to import Activity">
                                    <span class="lbl-small weight-500 lbl-author undrln-onhover"
                                        style="color:#DB5461; font-weight:400 !important;">Import activity</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <?php
                }
                ?>

                <hr style="color:black; font-size:2rem !important;">
                <div class="chapter-wrapper d-flex align-items-center a-i-c flex-wrap flex-d-col-below-690 p-10-0 js-add-or-import-section-wrapper"
                    style="margin-left:20px;">
                    <div class="chapter-num with-icon flex a-i-c j-c-c show-popup cursor-pointer js-add-section"
                        data-popup="add-lesson-pop-up" data-courseId="<?= $course->id ?>">
                        <svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="//www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M13.7998 22.9998C13.7998 22.3371 14.3371 21.7998 14.9998 21.7998H30.9998C31.6625 21.7998 32.1998 22.3371 32.1998 22.9998C32.1998 23.6625 31.6625 24.1998 30.9998 24.1998H14.9998C14.3371 24.1998 13.7998 23.6625 13.7998 22.9998Z"
                                fill="#DB5461"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M22.9998 13.7998C23.6625 13.7998 24.1998 14.3371 24.1998 14.9998V30.9998C24.1998 31.6625 23.6625 32.1998 22.9998 32.1998C22.3371 32.1998 21.7998 31.6625 21.7998 30.9998V14.9998C21.7998 14.3371 22.3371 13.7998 22.9998 13.7998Z"
                                fill="#DB5461"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M4.33346 2.8668C3.94448 2.8668 3.57143 3.02132 3.29637 3.29637C3.02132 3.57143 2.8668 3.94448 2.8668 4.33346V7.00013C2.8668 7.66287 2.32954 8.20013 1.6668 8.20013C1.00406 8.20013 0.466797 7.66287 0.466797 7.00013V4.33346C0.466797 3.30796 0.874178 2.32446 1.59932 1.59932C2.32446 0.874178 3.30796 0.466797 4.33346 0.466797H7.00013C7.66287 0.466797 8.20013 1.00406 8.20013 1.6668C8.20013 2.32954 7.66287 2.8668 7.00013 2.8668H4.33346ZM19.1335 1.6668C19.1335 1.00406 19.6707 0.466797 20.3335 0.466797H25.6668C26.3295 0.466797 26.8668 1.00406 26.8668 1.6668C26.8668 2.32954 26.3295 2.8668 25.6668 2.8668H20.3335C19.6707 2.8668 19.1335 2.32954 19.1335 1.6668ZM37.8001 1.6668C37.8001 1.00406 38.3374 0.466797 39.0001 0.466797H41.6668C42.6923 0.466797 43.6758 0.874177 44.4009 1.59932C45.1261 2.32446 45.5335 3.30796 45.5335 4.33346V7.00013C45.5335 7.66287 44.9962 8.20013 44.3335 8.20013C43.6707 8.20013 43.1335 7.66287 43.1335 7.00013V4.33346C43.1335 3.94448 42.9789 3.57143 42.7039 3.29637C42.4288 3.02132 42.0558 2.8668 41.6668 2.8668H39.0001C38.3374 2.8668 37.8001 2.32954 37.8001 1.6668ZM1.6668 19.1335C2.32954 19.1335 2.8668 19.6707 2.8668 20.3335V25.6668C2.8668 26.3295 2.32954 26.8668 1.6668 26.8668C1.00406 26.8668 0.466797 26.3295 0.466797 25.6668V20.3335C0.466797 19.6707 1.00406 19.1335 1.6668 19.1335ZM44.3335 19.1335C44.9962 19.1335 45.5335 19.6707 45.5335 20.3335V25.6668C45.5335 26.3295 44.9962 26.8668 44.3335 26.8668C43.6707 26.8668 43.1335 26.3295 43.1335 25.6668V20.3335C43.1335 19.6707 43.6707 19.1335 44.3335 19.1335ZM1.6668 37.8001C2.32954 37.8001 2.8668 38.3374 2.8668 39.0001V41.6668C2.8668 42.0558 3.02132 42.4288 3.29637 42.7039C3.57143 42.9789 3.94448 43.1335 4.33346 43.1335H7.00013C7.66287 43.1335 8.20013 43.6707 8.20013 44.3335C8.20013 44.9962 7.66287 45.5335 7.00013 45.5335H4.33346C3.30796 45.5335 2.32446 45.1261 1.59932 44.4009C0.874177 43.6758 0.466797 42.6923 0.466797 41.6668V39.0001C0.466797 38.3374 1.00406 37.8001 1.6668 37.8001ZM44.3335 37.8001C44.9962 37.8001 45.5335 38.3374 45.5335 39.0001V41.6668C45.5335 42.6923 45.1261 43.6758 44.4009 44.4009C43.6758 45.1261 42.6923 45.5335 41.6668 45.5335H39.0001C38.3374 45.5335 37.8001 44.9962 37.8001 44.3335C37.8001 43.6707 38.3374 43.1335 39.0001 43.1335H41.6668C42.0558 43.1335 42.4288 42.9789 42.7039 42.7039C42.9789 42.4288 43.1335 42.0558 43.1335 41.6668V39.0001C43.1335 38.3374 43.6707 37.8001 44.3335 37.8001ZM19.1335 44.3335C19.1335 43.6707 19.6707 43.1335 20.3335 43.1335H25.6668C26.3295 43.1335 26.8668 43.6707 26.8668 44.3335C26.8668 44.9962 26.3295 45.5335 25.6668 45.5335H20.3335C19.6707 45.5335 19.1335 44.9962 19.1335 44.3335Z"
                                fill="#DB5461"></path>
                        </svg>
                    </div>
                    <div class="lbl-semi-large weight-bold lbl-author p-10-0 cursor-pointer ml-neg5 js-add-section undrln-onhover show-popup"
                        data-popup="add-lesson-pop-up" data-courseId="<?= $course->id; ?>" tabindex="0" role="button"
                        title="Click to add a new section"
                        style="margin-left:10px;color:#DB5461; font-weight:bold !important;">Add section</div>
                    <div class="lbl-semi-large weight-bold lbl-author p-10-0 cursor-pointer ml-neg5 js-add-section undrln-onhover "
                        tabindex="0" role="button" style="margin-left:10px;">Or</div>
                    <a href="<?= $this->Url->build([
                        'plugin' => 'Lms',
                        'controller' => 'Courses',
                        'action' => 'watch',
                        $course->id
                    ]) ?>"
                        class="lbl-semi-large weight-bold lbl-author p-10-0 cursor-pointer ml-neg5 js-add-section undrln-onhover "
                        tabindex="0" role="button"
                        style="margin-left:10px;color:#DB5461; font-weight:bold !important;">Preview Course</a>

                </div>
            </div>
        </div>



    </div>


</div>



<script>
    $(document).ready(function () {


        $('[id^=d]').on('click', function () {
            var id = $(this).attr('id').substring(1);
            $(`#txt${id}`).val("");
            $(`#cntrl${id}`).css('display', 'none');

        });
        $('[id^=editLess]').mouseover(function () {

            var id = $(this).attr('id').substring(8);

            $(`#cntrlLesson${id}`).css('display', 'flex');

        });
        $('[id^=editLess]').mouseout(function () {

            var id = $(this).attr('id').substring(8);

            $(`#cntrlLesson${id}`).css('display', 'none');

        });
        $('[id^=c]').on('click', function () {
            var id = $(this).attr('id').substring(1);
            if (!$(`#t${id}`).hasClass('borderRed')) {
                $(`#t${id}`).addClass('borderRed');
            }
            $(`#t${id}`).attr('readonly', false);
            $(`#ct${id}`).removeClass('d-none');
            $(`#ct${id}`).addClass('d-flex');
        })
        $('[id^=n]').on('click', function () {
            var id = $(this).attr('id').substring(1);
            console.log(id);
            $(`#t${id}`).removeClass('borderRed');
            $(`#t${id}`).attr('readonly', true);
            $(`#ct${id}`).removeClass('d-flex');
            $(`#ct${id}`).addClass('d-none');
        });
        $('[id^=delteChapter]').on('click', function (event) {
            event.preventDefault();
            var csrfToken = $('input[name="_csrfToken"]').attr('value');
            var id = $(this).attr('id').substring(12);
            $.ajax({
                url: '<?= $this->Url->build([
                    'plugin' => 'Lms',
                    'controller' => 'Chapters',
                    'action' => 'delete'
                ]) ?>',
                data: {
                    chapter_id: id,
                    course_id: <?= $course->id ?>,
                },
                method: 'Post',
                dataType: 'json',
                headers: {
                    'X-CSRF-Token': csrfToken
                },
                success: function (response) {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "The chapter is deleted seccessfully",
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        window.location.href = '<?= $this->Url->build(['plugin' => 'Lms', 'controller' => 'Courses', 'action' => 'manage', $course->id]) ?>';

                    });
                },
                error: function (xhr, status, error) {
                    console.error(status);
                }
            })
        });


    })
</script>