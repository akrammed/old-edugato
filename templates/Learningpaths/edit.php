<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Learningpath $learningpath
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $learningpath->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $learningpath->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Learningpaths'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="learningpaths form content">
            <?= $this->Form->create($learningpath) ?>
            <fieldset>
                <legend><?= __('Edit Learningpath') ?></legend>
                <?php
                    echo $this->Form->control('path');
                    echo $this->Form->control('picture');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
