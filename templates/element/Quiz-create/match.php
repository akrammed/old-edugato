<?= $this->element('avatar-with-bubbel', ['text' => "Tap the words to order"]) ?>
<div class="flex-grow-1 d-flex justify-content-center flex-column gap-4">
    <div id="fields">
        <div id="options">
            <?php for ($i = 1; $i < 4; $i++) { ?>
                <input id="type-option-<?= $i ?>" class="option" name="matches[]" required type="text" placeholder="type option  here..">
            <?php  } ?>
        </div>
        <div id="empties">
            <?php for ($i = 1; $i < 4; $i++) { ?>
                <div class="empty"></div>
            <?php  } ?>
        </div>
    </div>
    <div id="matches">
        <?php for ($i = 1; $i < 4; $i++) { ?>
            <div id="match">
                <?= $this->Form->control('options[]', [
                    'class' => 'type-match',
                    'id' => 'type-match-' . $i,
                    'label'=> false,
                    'required' => true,
                    'placeholder' =>'type option here..'
                ]) ?>
            </div>
        <?php  } ?>
    </div>
    <?php
    echo $this->Form->control('quiz_type', [
        'type' => 'hidden',
        'value' => '4',
        'id' => 'quiz_type',
    ]) ?>
</div>