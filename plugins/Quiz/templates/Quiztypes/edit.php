<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $quiztype
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $quiztype->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $quiztype->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Quiztypes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="quiztypes form content">
            <?= $this->Form->create($quiztype) ?>
            <fieldset>
                <legend><?= __('Edit Quiztype') ?></legend>
                <?php
                    echo $this->Form->control('type');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
