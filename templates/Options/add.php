<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Option $option
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Options'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="options form content">
            <?= $this->Form->create($option) ?>
            <fieldset>
                <legend><?= __('Add Option') ?></legend>
                <?php
                    echo $this->Form->control('qoption');
                    echo $this->Form->control('is_correct');
                    echo $this->Form->control('oorder');
                    echo $this->Form->control('palette');
                    echo $this->Form->control('imageName');
                    echo $this->Form->control('quiz_id');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
