<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CoursesUser $coursesUser
 * @var \Cake\Collection\CollectionInterface|string[] $courses
 * @var \Cake\Collection\CollectionInterface|string[] $learningpaths
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Courses Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="coursesUsers form content">
            <?= $this->Form->create($coursesUser) ?>
            <fieldset>
                <legend><?= __('Add Courses User') ?></legend>
                <?php
                    echo $this->Form->control('user_id');
                    echo $this->Form->control('course_id', ['options' => $courses, 'empty' => true]);
                    echo $this->Form->control('learningpath_id', ['options' => $learningpaths, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
