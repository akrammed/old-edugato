<?= $this->element('avatar-with-bubbel', ['text' => "Can you name this images"]) ?>
<div class="flex-grow-1 d-flex justify-content-center flex-column gap-4">
    <div class="d-flex flex-wrap gap-3" id="imageCards">
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
