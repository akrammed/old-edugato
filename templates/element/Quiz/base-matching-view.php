<?php echo $this->element('Quiz/Elements/header'); ?>
<?php echo $this->element('Quiz/Style/progress-bar'); ?>
<?php echo $this->element('Quiz/Style/quiz-view-style'); ?>
<?php
$shuffeldOptions = [];
$optionKeys = [];
$optionsList = [];
$currentList = [];
$correctOptions = [];
foreach ($questions as $key => $value) { 
    $shuffeldOptions[$key] = [$value['question'], 'position' => $value['oorder'], $value->id];
    $curretList[$key] = [$value['question'], 'position' => $value['oorder'], $value->id];
}
shuffle($shuffeldOptions);
?>
<div class="body">
    <div class="container">
        <div class="row">
            <div class="content" style="margin-top: 1%;">
                <div class="conversation">
                    <div class="avatar-container">
                        <?php echo $this->element('icons/avatar'); ?>
                        <?php echo $this->element('icons/talikng-bubbls'); ?>
                        <h2 class="avatar-question">Match the following options</h2>
                    </div>
                </div>
            </div>
            <div class="container">

                <div class="row" style="margin-top: 1%;">
                    <div class="col-sm-6 options-question">

                        <ul class=" center">
                            <?php
                            foreach ($options as $key => $value) { ?>
                            <li id="<?= $value['position'] ?>" class="item" draggable="false">
                                <div class="details">
                                    <span> <?php echo  $value->qoption ?></span>
                                </div>
                            </li>
                            <?php }
                            ?>
                        </ul>
                    </div>
                    <div class="col-sm-6 answers-question">
                        <ul class="sortable-list">
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="options">
                        <ol class="center">
                            <?php
                            $i = 0;
                            foreach ($shuffeldOptions as $key => $value) {
                              ?>
                            <li data-count="<?= $value['position'] ?>" class="element" style="width:140px"
                                id="<?= $value[1] ?>">
                                <?= $value[0] ?>
                            </li>
                            <?php
                                $i++;
                                array_push($optionsList, $value[0]);
                            }
                            ?>
                        </ol>
                    </div>

                </div>

            </div>



        </div>





    </div>

</div>

<?php echo $this->element('Quiz/Elements/footer'); ?>
<?php echo $this->element('Quiz/Elements/sounds-effects'); ?>
<?php echo $this->element('Quiz/Scripts/globalFunctionQuizView'); ?>
<script>
$(document).ready(function(event) {
    init();
    var selectedOptions = [];
    const optionPositions = [];
    var count = 0;
    $('.options').on('click', '.element', function() {
        var selectedOption = $(this).text().trim();
        var optionId = $(this).attr('id');
        var dataCount = $(this).attr('data-count');
        selectedOptions.push(optionId);
        $(this).text('');
        $(this).css('background-color', '#FFFFFF');
        $(this).css('height', '33px');
        $(this).css('margin', '2%');
        $(this).css('margin-top', '1%');
        $(this).css('font-size', '13px');
        $(this).css('padding', '8px');
        if (selectedOption !== '') {
            $('.answers-question ul').append('<li  data-count="' + dataCount +
                '"  style="width:140px"  class="item element" id="' +
                optionId + '">' + selectedOption +
                '</li>');
            count += 1;
            optionPositions.push(dataCount);
        }
        var optionLength = <?= json_encode($i) ?>;
        if (optionLength == count) {
            
        

        var correctAnswer = <?= json_encode($currentList) ?>;
        
        correctAnswer = correctAnswer.sort().map(option => option[0]).join(' ');
        const unsortedElements = hasWrongPositionsMatch(optionPositions);
        console.log(unsortedElements);
        if (unsortedElements === true) {
            correctEvents();
            optionPositions.forEach(function(element) {
                $(".answers-question li").css("background-color",
                    "#17BF33");
            });
            unsortedElements = [];

        }
        if (unsortedElements !== true) {
            unsortedElements.forEach(function(element) {
                $(".sortable-list").find(`[data-count="${element }"]`).css("background-color",
                    "red");
            });
            wrongEvents();
            unsortedElements = [];
        }
    }


    });

    $('.answers-question').on('click', '.element', function() {
        var selectedOption = $(this).text().trim();
        var optionId = $(this).attr('id');
        var dataCount = $(this).attr('data-count');
        var index = selectedOptions.indexOf(optionId);
        if (index !== -1) {
            selectedOptions.splice(index, 1);

        }
        if (optionPositions.indexOf(dataCount) !== -1) {
            optionPositions.splice(optionPositions.indexOf(dataCount), 1);
        }
        $(this).remove();
        $('#' + optionId).remove();

        $('.options .center').append('<li style="width:140px"  class="element" id="' + optionId + '">' +
            selectedOption +
            '</li>');
        if (count !== 0) {
            count -= 1;
        }
    });

    
});
</script>

<style>
.center {
    display: grid;
    justify-content: end;
    margin-right: 8%;
}

.options {
    margin-top: -1%;
    display: grid;
    justify-content: center;
}

.answers-question li,
.options-question li {
    background-color: #7F77FF;
    border-radius: 10px;
    padding: 8px;
    color: white;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    cursor: pointer;
    width: 190px !important;
    text-align: center;
    margin-bottom: 6px !important;
    height: 33px;
    font-size: 13px;
}

.options li {
    background-color: #7F77FF;
    border-radius: 10px;
    padding: 8px;
    color: white;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    cursor: pointer;
    width: 174px !important;
    text-align: center;
    height: 36px;
    margin: 2%;
    margin-top: 1%;
    font-size: 13px;
}

@media only screen and (max-width: 768px) {

    .answers li,
    .options li {
        font-size: 64% !important;
        width: 100% !important;
        margin-bottom: 4% !important;
    }
}

@media only screen and (min-width: 769px) {
    .options ol {
        list-style-type: none;
        padding: 0;
        margin: 0;
        display: flex;
        margin-left: -5%;
    }
}
</style>