<?php echo $this->Html->css('default/quizView') ?>

<div id="section-container" style="margin: 22% !important;margin-top: 2% !important;" class="section-container-class">

    <section id="section-1">
        <h1 class="text-option-title-style"><?= $quiz->title ?></h1>
        <br>
        <h2 class="text-desc-option-style"><?= $quiz->description ?></h2>
    </section>
    <section id="section-2">


        <?php

  $questionL =  1 ;
  $optionsList = [];      
  $correctOptions = []; 
  $falseOptions = [];    
 foreach ($questions as $key => $value) {
        $questionL++;
        ?>
        <h2 class="text-option-title-style" id="<?= $value->id ?>-q" style="font-size: 19px !important;
    margin-bottom: 0%; text-align: left;"><?= $value->question ?>
            ?</h2>

        <?php
 echo $this->Form->radio("question_{$value->id}", [
    ['value' => 'true  ', 'text' => 'True', 'id' => "true_{$value->id}", 'class' => 'option-radio','style'=>'margin-left:4%;'],
    ['value' => 'false  ', 'text' => 'False', 'id' => "false_{$value->id}",'style'=>'margin-left:4%;' ]
]);
if ($value->is_correct) {
    array_push($correctOptions , "true_".$value->id);
}else{
    array_push($falseOptions ,"false_".$value->id);
}
array_push($optionsList , $value->id);
    
}
  ?>

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
                <button id="retake" 
                    class="next-btn retake btn nav-btn  me-md-4 edugato-btn-bleu">Retake</button>
            </div>
            <hr>
            <div class="footer-feedback"> </div>
        </div>
    </section>

    <button id="next-button" style="margin-left: 38% !important;border-radius: 0%;    height: 33px;"
        class="next-btn btn nav-btn  me-md-4 edugato-btn-bleu">Ready to start</button>
    <button id="prev-button" style="margin-left: 0% !important;  margin-top: 3px;  height: 33px;
    border-radius: 0%;" class="prev-btn btn nav-btn  me-md-4 edugato-btn-bleu">Prev</button>
    <?= $this->Form->button(__('Save'),[
        'id'=>'save-text-try',
        'class'=>'btn nav-btn btn-primary edugato-btn',
        'style'=>'margin-top: 3px;
        border-radius: 0%;    height: 33px;
        '
    ]) ?>


</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php echo $this->Html->script('default/scriptOptionQuizView') ?>
<script>
$(document).ready(function() {

    var total = <?php echo json_encode(count($correctOptions) + count($falseOptions)); ?>;
    $("#save-text-try").click(function(event) {
        event.preventDefault();
        attempts++;
        showNext();
        var falseOptions = <?php echo json_encode($falseOptions); ?>;
        var correctAnswer = <?php echo json_encode($correctOptions); ?>;
        correctAnswer = correctAnswer.map(function(element) {
            return String(element);
        });
        falseOptions = falseOptions.map(function(element) {
            return String(element);
        });

        console.log(correctAnswer);
        console.log(trueChecked);
        if ((arraysAreEqual(correctAnswer, trueChecked) == true) && (arraysAreEqual(falseOptions,
                falseChecked) == true)) {
            correctAlert(total);
        } else {
            wrongAlert(total);
        }
    });


});
</script>

<style>
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