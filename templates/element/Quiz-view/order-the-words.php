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

            <div class="answers">
                <ul class="answer-list">
                </ul>
            </div>

            <div class="options">
                <ul class="options-list">
                    <?php foreach ($optionsList as $key => $value) { ?>
                    <li class="option-element" data-count="<?= $value['position'] ?>" id="option-<?= $value[1] ?>">
                        <?= $value[0] ?>
                    </li>
                    <?php } ?>
                </ul>
            </div>

        </div>
    </div>
</div>