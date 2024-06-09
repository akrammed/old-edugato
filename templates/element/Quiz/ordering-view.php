<?php echo $this->element('Quiz/Elements/header'); ?>
<?php echo $this->element('Quiz/Style/progress-bar'); ?>
<?php echo $this->element('Quiz/Style/quiz-view-style'); ?>
<?php
$optionsList = [];
$optionKeys = [];
$i = 0;
foreach ($options as $key => $value) {
    $optionsList[$key] = [$value['qoption'], 'position' => $value['oorder'], $value->id];
}

shuffle($optionsList);
?>
<div class="quiz-body">
    <div class="container">
        <div class="row quiz-title-row">
            <h1 class="title quiz-title">
                Make it in the right order !</h1>
        </div>
        <div class="row">
            <div class="content">
                <div class="conversation">
                    <div class="avatar-container">
                        <?php echo $this->element('icons/avatar'); ?>
                        <h2 class="avatar-question"><?= $questions[0]['question'] ?> </h2>
                    </div>
                </div>
            </div>
            <div class="answers">
                <ul class="answer-list">
                </ul>
            </div>

            <div class="options">
                <ul class="options-list">
                    <?php foreach ($optionsList as $key => $value) { ?>
                        <li class="option-element" data-count="<?= $value['position'] ?>" id="option-<?= $value[1]?>">
                            <?= $value[0] ?>
                        </li>
                    <?php } ?>
                </ul>
            </div>



        </div>
    </div>
</div>


<?php echo $this->element('Quiz/Elements/footer'); ?>
<?php echo $this->element('Quiz/Scripts/globalFunctionQuizView'); ?>



<script>
    $(document).ready(function(event) {
        $("#draggable").draggable();
        $(".wrong-alert").hide();
        $(".correct-alert").hide();
        $('#continue').hide();
        var selectedOptions = [];
        const optionPositions = [];
        $('#check').prop('disabled', true).css('opacity', '0.2');

    
        $('.options').on('click', 'li', function() {
            var selectedOption = $(this).text().trim(); 
            var selectedId = $(this).attr('id');
            var count = $(this).attr('data-count');
            console.log(count)

            $('#check').prop('disabled', false).css('opacity', '1');
            $(this).text('');
            $(this).css('background-color', '#FFFFFF');
            $(this).css('width', '204px');
            $(this).css('height', '54px');
            if (selectedOption !== '') {
                $('.answers ul').append('<li class="item option-element" data-count="' + count + '" id="' + selectedId +
                    '">' + selectedOption +
                    '</li>');
                optionPositions.push(count);
            }

        });
        $('.answers').on('click', 'li', function() {
            var selectedOption = $(this).text();
            var count = $(this).attr('data-count');
            console.log(count)
            var selectedId = $(this).attr('id');
            $(this).remove();
            $('#' + selectedId).css('background-color', '#7F77FF');
            $('#' + selectedId).text(selectedOption);
            var index = optionPositions.indexOf(count);
            if (index !== -1) {
                optionPositions.splice(index, 1);
            }

            console.log(optionPositions);
        });

        var selectedOptions = []; 
        var userInputArray = [];
        function isSortedOptions(arr) {
            if (arr.length == 0) {
                return false;
            }
            for (let i = 0; i < arr.length - 1; i++) {
                const current = parseInt(arr[i]);
                const next = parseInt(arr[i + 1]);
                if (current > next) {
                    return false;
                }
            }
            return true;
        }

        $('#check , #continue').on('click', function(e) {
            e.preventDefault();
            const unsortedElements = hasWrongPositionsMatch(optionPositions);
            if (unsortedElements === true) {
                correctEvents();
                optionPositions.forEach(function(element) {
                    $(".answers li").css("background-color",
                        "#17BF33");
                });
            }if (unsortedElements !== true) {
                unsortedElements.forEach(function(element) {
                    $(".answer-list").find(`[data-count="${element }"]`).css("background-color",
                        "red");
                });
                wrongEvents();
            }

        });
    });
</script>