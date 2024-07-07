<div class="container" id="1">
    <?= $this->element('avatar-with-bubbel', ['text' => "Tap the words to order"]) ?>
    <div class="row space-input">
        <div class="col">
            <?= $this->element('icons/back-space') ?>
        </div>

    </div>
    <div>
        <p style="margin-top: 10%;">List the words in the right order</p>
        <div class="container d-flex">
            <div class="row" id="list-word-input">
                <?php
                for ($i = 1; $i <= 3; $i++) {
                ?>
                    <div class="col-4">
                        <?= $this->Form->control('text', [
                            'value' => 'word',
                            'class' => 'false-option',
                            'label' => '',
                            'id' => 'orderOption' . $i,
                        ]); ?>
                    </div>
                <?php
                }

                ?>
            </div>
        </div>



    </div>


</div>