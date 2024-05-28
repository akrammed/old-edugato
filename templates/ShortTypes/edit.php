<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ShortType $shortType
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $shortType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $shortType->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Short Types'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="shortTypes form content">
            <?= $this->Form->create($shortType) ?>
            <fieldset>
                <legend><?= __('Edit Short Type') ?></legend>
                <?php
                    echo $this->Form->control('type');
                    echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
                    echo $this->Form->control('category_id');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
