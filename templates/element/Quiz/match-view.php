<?php echo $this->Html->css('default/quizView') ?>
<div id="section-container" style="margin: 19% !important;margin-top: 13% !important;" class="section-container-class">

    <section id="section-1">
        <h1 class="text-option-title-style"><?= $quiz->title ?></h1>
        <br>
        <h2 class="text-desc-option-style"><?= $quiz->description ?></h2>
    </section>
    <section id="section-2">

        <h2 class="text-option-title-style" style="text-align: left;margin-bottom:10%;">Match the elements using colors</h2>
        <ul>

            <?php
$optionLists = []; // Initialize an array to store
$optionKeys = [] ;
foreach ($questions as $key => $value) {
        $optionLists[$key] = [$value->question, 'palette' => $value->palette] ;
}
shuffle($optionLists);
?>

            <div class="row">
                <div class="col-sm-6">
                    <?php
        foreach ($options as $key => $value) {
            echo '<div class="match-item-option" style="background-color:' . $value->palette . '">';
            echo $value->qoption;
            echo '</div>';
        }
        ?>
                </div>
                <div class="col-sm-6">
                    <?php
     
        foreach ($optionLists as $key => $option):
            echo '<div class="match-item">';
            echo $option[0];
            echo '</div>';
        endforeach;
        ?>
                </div>
            </div>







        </ul>

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

    <button id="next-button" style="margin-left: 40% !important;
    height: 41px;
    border-radius: 0%;" class="next-btn btn nav-btn  me-md-4 edugato-btn-bleu">Ready to start</button>
    <button id="prev-button" style="    height: 35px;
    border-radius: 0%;
    margin-left: 0% !important;" class="prev-btn btn nav-btn  me-md-4 edugato-btn-bleu">Prev</button>
    <?= $this->Form->button(__('Save'),[
        'id'=>'save-text-try',
        'class'=>'btn nav-btn btn-primary edugato-btn',
        'style'=>'margin-top: 6%;
        height: 35px;
        border-radius: 0%;
        margin-left: 0% !important;'
    ]) ?>


</div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php echo $this->Html->script('default/scriptOptionQuizView') ?>
<script>
$(document).ready(function() {
    var answers = [];
    let timerInterval;
    var optionLists = <?php echo json_encode($optionLists); ?>;

    function compareColors() {
        var optionLists = <?php echo json_encode($optionLists); ?>;
        var isTrue = false; // Initialize flag variable

        answers.forEach(function(answer) {
            var answerText = answer.text;
            var answerColor = answer.color;

            optionLists.forEach(function(option) {
                console.log(option);
                if (answerText === option[0] && answerColor === hexToRgb(option.palette)) {
                    console.log(1, answerColor ,hexToRgb(option.palette) , answerText ,  option[0] );
                    isTrue = true; // Set flag to true if match is found
                } else {
                    console.log(2,answerColor ,hexToRgb(option.palette) , answerText ,  option[0]);
                    isTrue = false;
                }
            });
        });
console.log(isTrue);
        return isTrue; // Return flag value after both loops complete
    }
    function hexToRgb(hex) {
        // Remove '#' if present
        hex = hex.replace('#', '');

        // Convert hex to RGB
        var r = parseInt(hex.substring(0, 2), 16);
        var g = parseInt(hex.substring(2, 4), 16);
        var b = parseInt(hex.substring(4, 6), 16);

        // Return RGB string
        return 'rgb(' + r + ', ' + g + ', ' + b + ')';
    }
    $('.match-item-option').on('click', function() {

        selectedColor = $(this).css('background-color');
        console.log(selectedColor);
    });

    $('.col-sm-6:last-child .match-item').on('click', function() {
        var text = $(this).text();
        var color = selectedColor;

        var index = answers.findIndex(function(answer) {
            return answer.text === text;
        });

        if (index !== -1) {
            answers.splice(index, 1);
        }

        answers.push({
            text: text,
            color: color
        });

        $(this).css('background-color', color);

        console.log(answers);
    });


   






    var userInputArray = []; // Initialize array to store user input



    $("#save-text-try").click(function(event) {
        event.preventDefault();
        showNext();
        attempts++;
        console.log(compareColors());
        if (compareColors()) {
            correctAlert(optionLists.length); 
        } else {
            wrongAlert(optionLists.length);
        }
    });


});
</script>

<style>
.style-number-order {
    margin-left: 5%;
    width: 31px;
    border: none;
    border-bottom: 1px solid
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

.match-item-option,
.match-item {
    list-style: none;
    display: flex;
    cursor: pointer;
    background: #fff;
    align-items: center;
    border-radius: 5px;
    padding: 10px 13px;
    margin-bottom: 11px;
    /* box-shadow: 0 2px 4px rgba(0,0,0,0.06); */
    border: 1px solid #ccc;
    justify-content: space-between;
}
</style>