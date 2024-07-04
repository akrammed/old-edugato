<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $level
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Levels'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="levels form content">
            <?= $this->Form->create($level) ?>
            <fieldset>
                <legend><?= __('Add Level') ?></legend>
                <?php
                    echo $this->Form->control('level');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
