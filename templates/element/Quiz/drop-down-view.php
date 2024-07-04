<?php echo $this->Html->css('default/quizView') ?>


<div id="section-container-image" style="margin: 22% !important;margin-top: 2% !important;"
    class="section-container-class">

    <section id="section-1">
        <h1 class="text-option-title-style"><?= $quiz->title ?></h1>
        <br>
        <h2 class="text-desc-option-style"><?= $quiz->description ?></h2>
    </section>
    <section id="section-2">
        <h2 class="question-option-title-style" style="font-size: 20px !important;margin-left:4% ;">
            <?= $questions[0]['question'] ?> ?</h2>
        <select id="select-form-down" class="select-form">
            <?php
    $optionsList = [];      
    $correctOptions = [];      
    $currentId =  0 ;
    foreach ($options as $value) {
        ?>


            <option class="drop-down-element" id="<?= $value->id ?>" value="<?= $value['qoption'] ?>">
                <?= $value['qoption']?></option>



            <?php $currentId = $value->id;   if ($value->is_correct) {           
            $correctOptions[] = $value->id;
        }
        $optionsList[] = $value->id;

    } ?>

        </select>


    </section>
    <section id="section-3">
        <div class="row feedback">
            <div class="header-feedback">
                <img width="50" height="50" style="margin-bottom: 5%;margin-left: 32%;"
                    src="https://img.icons8.com/ios/50/speech-bubble-with-dots--v1.png"
                    alt="speech-bubble-with-dots--v1" />
                <h2 class="feedback-title"> feedback </h2>
            </div>
            <div class="feedback-body">
                <div id="feedbackresult"></div>
                <button id="retake" class="next-btn retake btn nav-btn  me-md-4 edugato-btn-bleu">Retake</button>
            </div>
            <hr>
            <div class="footer-feedback"> </div>
        </div>
    </section>

    <button id="next-button" style="margin-left: 38% !important;border-radius: 0%;    height: 33px;"
        class="next-btn btn nav-btn  me-md-4 edugato-btn-bleu">Ready to start</button>
    <button id="prev-button" style="margin-left: 5% !important;    height: 33px;
    border-radius: 0%;" class="prev-btn btn nav-btn  me-md-4 edugato-btn-bleu">Prev</button>
    <?= $this->Form->button(__('Save'),[
        'id'=>'save-text-try',
        'class'=>'btn nav-btn btn-primary edugato-btn',
        'style'=>'margin-top: 6%;
        border-radius: 0%;    height: 33px;
        '
    ]) ?>


</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php echo $this->Html->script('default/scriptOptionQuizView') ?>
<script>
$(document).ready(function() {
    var selectedId = 0;
    $('#select-form-down').change(function() {
        selectedId =parseInt($(this).children('option:selected').attr('id'));
        console.log('Selected value:', selectedId);
    });
    var total = <?php echo json_encode(count($correctOptions)); ?>;

    $("#save-text-try").click(function(event) {
        event.preventDefault();
        attempts++;
        showNext();

        var correctAnswer = <?php echo json_encode($correctOptions); ?>;

        if (correctAnswer.includes(selectedId)) {
            correctAlert(total);
        } else {
            wrongAlert(total);
        }
    });


});
</script>

<style>
.select-form {
    width: 198px;
    margin-top: 4%;
    margin-left: 5%;
    height: 38px;
    border-width: 3px;
    border-color: #003F91 !important;
}

.option-text-view {
    font-size: 22px !important;
    margin-left: 0% !important;
    color: #DB5461 !important;


}

.text-desc-option-style {
    text-align: center;
    color: black !important;
    font-size: 18px;
    margin-top: 2%;
}

.text-option-title-style {
    text-align: center;
    font-size: 29px;
}

.question-option-title-style {
    font-size: 29px;
}

.edugato-btn-bleu {
    background-color: white !important;
    color: #003F91 !important;
    border: 2px solid #003F91;
}

.edugato-btn-bleu:hover {
    background-color: #003F91 !important;
    color: white !important;
    border: 2px solid #003F91;
}

.section-container-class {
    margin: 0%;
    margin-top: 4%;
    padding: 5%;
    margin-left: 22%;
    background-color: white;
}



.prev-btn,
.next-btn {
    margin-top: 6%;
    margin-left: 32%;
    BACKGROUND-COLOR: #1f3b64;
    border-color: #1f3b64;
}

.prev-btn {
    margin-left: 26% !important;

}
</style>