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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $qoption->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $qoption->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Qoptions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="qoptions form content">
            <?= $this->Form->create($qoption) ?>
            <fieldset>
                <legend><?= __('Edit Qoption') ?></legend>
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
