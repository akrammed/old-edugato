<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Short $short
 * @var string[]|\Cake\Collection\CollectionInterface $shortTypes
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $short->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $short->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Shorts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="shorts form content">
            <?= $this->Form->create($short) ?>
            <fieldset>
                <legend><?= __('Edit Short') ?></legend>
                <?php
                    echo $this->Form->control('title');
                    echo $this->Form->control('description');
                    echo $this->Form->control('video');
                    echo $this->Form->control('short_type_id', ['options' => $shortTypes, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
