


<?php
$optionsList = [];
$i = 0;
?>
<div class="quiz-body">

    <div class="container">
        <div class="row">
            <div class="content" style="margin-top: 15%;">
                <div class="conversation">
                    <div class="avatar-container">
                        <?php echo $this->element('icons/avatar'); ?>
                        <?php echo $this->element('icons/talikng-bubbls'); ?>
                        <h2 class="avatar-question"><?= $questions[0]['question'] ?> </h2>
                    </div>
                </div>
            </div>

            <div class="options">
                <ul class="options-list">
                    <?php foreach ($options as $key => $value) { ?>
                    <li class="option-element" id="option-<?= $value->id ?>">
                        <?= $value['qoption'] ?>
                    </li>
                    <?php $i++;
                        if ($value->is_correct) {
                            $correctOption = $value->id;
                        }
                        array_push($optionsList, $value['qoption']);
                    } ?>
                </ul>
            </div>
        </div>
    </div>
</div>

