<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $qoption
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Qoptions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="qoptions form content">
            <?= $this->Form->create($qoption) ?>
            <fieldset>
                <legend><?= __('Add Qoption') ?></legend>
                <?php
                    echo $this->Form->control('qoption');
                    echo $this->Form->control('is_correct');
                    echo $this->Form->control('quiz_id');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
