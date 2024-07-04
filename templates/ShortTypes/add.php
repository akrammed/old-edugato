<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ShortType $shortType
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Short Types'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="shortTypes form content">
            <?= $this->Form->create($shortType) ?>
            <fieldset>
                <legend><?= __('Add Short Type') ?></legend>
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
