<div class="container" id="4">
    <?= $this->element('avatar-with-bubbel', ['text' => "Tap the words to order"]) ?>
    <div class="row" id="fields">
        <div class="col" id="options">
            <?php for ($i = 1; $i < 4; $i++) { ?>
                <input id="type-option-<?= $i ?>" class="option" name="matches[]" required type="text" placeholder="type option  here..">
            <?php  } ?>
        </div>
        <div class="col" id="empties">
            <?php for ($i = 1; $i < 4; $i++) { ?>
                <div class="empty"></div>
            <?php  } ?>
        </div>
    </div>
    <div class="row" id="matches">
        <div id="match">
            <?php for ($i = 1; $i < 4; $i++) { ?>
                <?= $this->Form->control('options[]', [
                    'class' => 'type-match',
                    'id' => 'type-match-' . $i,
                    'label'=> false,
                    'required' => true,
                    'placeholder' =>'type option here..'
                ]) ?>
            <?php  } ?>
        </div>
    </div>
    <?php
    echo $this->Form->control('quiz_type', [
        'type' => 'hidden',
        'value' => '4',
        'id' => 'quiz_type',
    ]) ?>
</div>