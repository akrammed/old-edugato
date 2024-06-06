<?php
$shuffeldOptions = [];
$optionKeys = [];
$optionsList = [];
$currentList = [];
$correctOptions = [];
foreach ($options as $key => $value) {
    $shuffeldOptions[$key] = [$value['qoption'], 'position' => $value['oorder'], $value->id];
    $curretList[$key] = [$value['qoption'], 'position' => $value['oorder'], $value->id];
}
shuffle($shuffeldOptions);
?>
<?php echo $this->element('Quiz/Elements/header'); ?>
<div class="body">
    <section id="section-1">
        <div class="container">
            <div class="container">
                <div class="content">
                    <div class="conversation" style="margin-left: 5%;">
                        <div class="avatar-container">
                            <?php echo $this->element('icons/avatar'); ?>
                        </div>
                        <div class="speech-container">
                            <h2 class="question-cat">Match the questions and answers</h2>
                        </div>
                    </div>

                </div>
                <div class="row" style="margin-top: 6%;">
                    <div class="col-sm-6 options-question">

                        <ul class=" center">
                            <?php
                            foreach ($questions as $key => $value) { ?>
                                <li id="<?= $value['position'] ?>" class="item" draggable="false">
                                    <div class="details">
                                        <span> <?php echo  $value->question ?></span>
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
                                <li data-count="<?= $value['position'] ?>" class="element" style="width:140px" id="<?= $value[1] ?>">
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

    </section>
</div>

<?php echo $this->element('Quiz/Elements/footer'); ?>
<?php echo $this->element('Quiz/quiz-style'); ?>
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
            $(this).css('height', '42px');
            if (selectedOption !== '') {
                $('.answers-question ul').append('<li  data-count="' + dataCount + '"  style="width:140px"  class="item element" id="' +
                    optionId + '">' + selectedOption +
                    '</li>');
                count += 1;
                optionPositions.push(dataCount);
            }
            $('#check').prop('disabled', false).css('opacity', '1');

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
        
        $('#check').on('click', function(e) {
            e.preventDefault();
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
                
            }
            if (unsortedElements !== true) {
                unsortedElements.forEach(function(element) {
                    $(".sortable-list").find(`[data-count="${element }"]`).css("background-color",
                        "red");
                });
                wrongEvents();
            }
        });
    });
</script>

<style>
    .center {
        display: grid;
        justify-content: center;
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
        padding: 10px;
        color: white;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        cursor: pointer;
        width: 208px !important;
        text-align: center;
        margin-bottom: 2% !important;
    }

    .options li {
        background-color: #7F77FF;
        border-radius: 10px;
        padding: 10px;
        color: white;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        cursor: pointer;
        width: 100%;
        text-align: center;
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