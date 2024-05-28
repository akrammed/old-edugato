<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $qquestion
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $qquestion->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $qquestion->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Qquestions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="qquestions form content">
            <?= $this->Form->create($qquestion) ?>
            <fieldset>
                <legend><?= __('Edit Qquestion') ?></legend>
                <?php
                    echo $this->Form->control('question');
                    echo $this->Form->control('is_correct');
                    echo $this->Form->control('quiz_id');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
