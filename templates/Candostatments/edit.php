<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Candostatment $candostatment
 * @var string[]|\Cake\Collection\CollectionInterface $learningpaths
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $candostatment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $candostatment->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Candostatments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="candostatments form content">
            <?= $this->Form->create($candostatment) ?>
            <fieldset>
                <legend><?= __('Edit Candostatment') ?></legend>
                <?php
                    echo $this->Form->control('title');
                    echo $this->Form->control('learningpath_id', ['options' => $learningpaths, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
