<?php echo $this->Html->script('default/scriptOptionQuiz') ?>
<script>
var optiosScript = {
    'textOptionType': function() {
        textOption("<?= $this->Url->build([
                'plugin' => null,
                'controller' => 'Quizs',
                'action' => 'createAjax'
            ]) ?>", "")
    },
    'imageOptionType': function() {
        imageOption("<?= $this->Url->build([
                'plugin' => null,
                'controller' => 'Quizs',
                'action' => 'createAjax'
            ]) ?>")
    },

    'trueFlaseOptionType': function() {
        trueFalseOption("<?= $this->Url->build([
                'plugin' => null,
                'controller' => 'Quizs',
                'action' => 'createAjax'
            ]) ?>")

    },
    'matchTypeOption': function() {
        matchOption("<?= $this->Url->build([
                'plugin' => null,
                'controller' => 'Quizs',
                'action' => 'createAjax'
            ]) ?>")

    },
    'orderTypeOption': function() {
        orderingOption("<?= $this->Url->build([
                'plugin' => null,
                'controller' => 'Quizs',
                'action' => 'createAjax'
            ]) ?>")

    },
    'dropDownOption': function() {
        dropDownOption("<?= $this->Url->build([
                'plugin' => null,
                'controller' => 'Quizs',
                'action' => 'createAjax'
            ]) ?>")

    },
    'baseMatchTypeOption': function() {
        baseMatchOption("<?= $this->Url->build([
                'plugin' => null,
                'controller' => 'Quizs',
                'action' => 'createAjax'
            ]) ?>")

    },
    'recordToAnswerType': function() {
        recordToAnswer("<?= $this->Url->build([
                'plugin' => null,
                'controller' => 'Quizs',
                'action' => 'createAjax'
            ]) ?>")

    },
    'gapsTypeOption': function() {
        gapsOption("<?= $this->Url->build([
                'plugin' => null,
                'controller' => 'Quizs',
                'action' => 'createAjax'
            ]) ?>")

    }

}
</script>
<div class="">
    <div class="p-3  border-bottom">
        <h3>Add learning activity</h3>
    </div>
    <div class="container needId">

        <div class="row pt-2">
            <div class="col-3 border-right">
                <ul>
                    <li id="mult" class="border-bottom p-2 mb-2" style="cursor:pointer;">Multimidia</li>
                    <li id="short-add" class="border-bottom p-2 mb-2" style="cursor:pointer">Shorts</li>
                    <li id="exm" class="border-bottom p-2 mb-2" style="cursor:pointer;">Exams</li>
                </ul>
            </div>
            <div class="col-9">
                <section id="multimidia">
                    <div class="vid mb-3 closePopUp cursor-pointer d-flex" id="addVid">
                        <div class="imgV" style="margin-right:10px;">
                            <img data-v-9bd9e4ce=""
                                src="https://cdn.mycourse.app/v3.5.8-rc1/author/images/svg/activities/icons/video-icon.svg"
                                alt="Activity icon"
                                class="lw-activity-icon w-70 mb-10-tp mb-10-sl fsh-0 affected-by-disablement">
                        </div>

                        <div class="titDesc">
                            <h3>Video (interactive)</h3>
                            <small>Upload your video, add interactivity, auto-create interactive transcripts.</small>
                        </div>


                    </div>
                </section>
                <section id="exams" style="display:none;">
                    <div class="" id="QuizzeType" style="display:block">
                        <?= $this->element('quiz-type') ?>
                    </div>
                    <div class="typeQuiz" id="textOptionType" style="display:none">
                        <?php echo $this->element("Quiz/text-options"); ?>
                    </div>
                    <div class="typeQuiz" id="imageOptionType" style="display:none">
                        <?php echo $this->element("Quiz/image-option"); ?>
                    </div>
                    <div class="typeQuiz" id="trueFlaseOptionType" style="display:none">
                        <?php echo $this->element("Quiz/true-false"); ?>
                    </div>
                    <div class="typeQuiz" id="baseMatchTypeOption" style="display:none">
                        <?php echo $this->element("Quiz/base-matching"); ?>
                    </div>
                    <div class="typeQuiz" id="orderTypeOption" style="display:none">
                        <?php echo $this->element("Quiz/ordering"); ?>
                    </div>
                    <div class="typeQuiz" id="gapsTypeOption" style="display:none">
                        <?php echo $this->element("Quiz/gaps-options"); ?>
                    </div>
                    <div class="typeQuiz" id="recordToAnswerType" style="display:none">
                        <?php echo $this->element("Quiz/audio-options"); ?>
                    </div>

                </section>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#short-add').css('display', 'none');
    $('#mult').click(function() {
        $('#multimidia').css('display', 'block');
        $('#exams').css('display', 'none');
    });
    $('#exm').click(function() {
        $('#exams').css('display', 'block');
        $('#QuizzeType').css('display', 'block');
        $('#multimidia').css('display', 'none');
        $('.typeQuiz').css('display', 'none');
    });
    $('#addVid').click(function() {
        var id = $('#lId').val();
        $('#lId').remove();
        $(`#cntrl${id}`).css('display', 'block');
    })





})
</script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->