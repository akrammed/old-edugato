<div class="container">
    <?= $this->element('avatar-with-bubbel', ['text' => "Can you name this images"]) ?>

    <div class="row row-cols-1 row-cols-md-3 g-2 mb-2" style="padding:13% 10% 10% 10%;" id="imageCards">

        <?php

        for ($i = 0; $i < 3; $i++) {
            echo $this->element('Quiz-create/Elements/card-upload-image', ['id' => $i]);
        }

        ?>
        <?= $this->Form->control('quiz_type', [
            'type' => 'hidden',
            'value' => '5',
            'id' => 'quiz_type',
        ]) ?>
    </div>

</div>