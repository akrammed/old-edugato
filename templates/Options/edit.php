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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $option->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $option->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Options'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="options form content">
            <?= $this->Form->create($option) ?>
            <fieldset>
                <legend><?= __('Edit Option') ?></legend>
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
