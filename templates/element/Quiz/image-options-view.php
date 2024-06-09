<?php echo $this->element('Quiz/Elements/header'); ?>
<?php echo $this->element('Quiz/Style/progress-bar'); ?>
<?php echo $this->element('Quiz/Style/quiz-view-style'); ?>
<div class="quiz-body">

    <div class="container">
        <div class="row quiz-title-row">
            <h1 class="title quiz-title">
                Choose the correct image</h1>
        </div>
            <div class="row">

            <div class="content">
                <div class="conversation">
                    <div class="avatar-container">
                        <?php echo $this->element('icons/monkey'); ?>
                        <h2 class="avatar-question"><?= $questions[0]['question'] ?> </h2>
                    </div>
                </div>
            </div>
                <div class="options">
                    <div class="container image-groupe">
                        <div class="row">
                            <?php
                            $i = 0;
                            foreach ($options as $key => $value) {
                                if ($value->is_correct == 1) {
                                    $correctImg = $i;
                                    $correct = 'Option-' . $key;
                                }
                                echo '<div class="col-sm-3 card image-card" >';
                                echo  $this->Html->image('/img/uploads/picture/' . $value->qoption, ['alt' => 'Option ' . $key, 'id' => 'Option-' . $key, 'style' => '    border: 5px solid #CBD4E1;
    border-radius: 15%;height: 100%;
    width: 100%;', 'class' => 'Option-' . $key . ' image-view clickable img-custom']);
                                echo '</div>';
                                $i++;
                            };
                            ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>



</div>


<?php echo $this->element('Quiz/Elements/footer'); ?>
<?php echo $this->element('Quiz/Scripts/globalFunctionQuizView'); ?>


<script>
    $(document).ready(function(event) {
        $("#draggable").draggable();
        $(".wrong-alert").hide();
        $(".correct-alert").hide();
        $('#continue').hide();
        var selectedOptions = []; // Variable to store selected options as sentences
        $('#check').prop('disabled', true).css('opacity', '0.2');

        var correctA;
        var selected;
        $(document).on('click', '[class^=Option-]', function() {
            $('#check').prop('disabled', false).css('opacity', '1');
            $('[id^=Option-]').css('border', '5px solid #CBD4E1');
            $('[id^=Option-]').css('border-radius', '15%');
            selected = $(this);
            console.log(selected);
            var imageId = $(this).attr('id').split('-')[1];
            $(this).css('border', '9px solid greenyellow');
            correctA = parseInt(imageId);
        });

        $('#check').on('click', function(e) {
            e.preventDefault();
            var correctAnswer = <?php echo json_encode($correctImg); ?>;
            var correct = <?php echo json_encode($correct); ?>;
            if (correctAnswer === correctA) {
                $('#skip').hide();
                $(".correct-alert").show();
                $(".wrong-alert").hide();
                $('#onehundred').prop('checked', true);
                $('.footer').css('background-color', '#E1FCDE');
                $('#check').hide();
                $('#continue').show();
            } else {
                selected.css('border', '9px solid #dc3545');
                $('#' + correct).css('border', '9px solid greenyellow');
                $('#check').hide();
                $('#continue').show();
                $('#continue').css('color', '#B1000F');
                $('#continue').css('border-color', '#B1000F');
                $('#skip').hide();
                $(".correct-alert").hide();
                $(".wrong-alert").show();
                $('#five').prop('checked', true);
                $('.footer').css('background-color', '#FFD4D8')
                $(this).css('background-color', 'rgb(216,72,72,1)');
                $(".wrong-alert").show();
                $('.wrong-answer-2').text(correctAnswer.sort());
            }

        });






    });
</script>