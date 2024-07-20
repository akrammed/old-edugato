<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CoursesUser $coursesUser
 * @var string[]|\Cake\Collection\CollectionInterface $courses
 * @var string[]|\Cake\Collection\CollectionInterface $learningpaths
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $coursesUser->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $coursesUser->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Courses Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="coursesUsers form content">
            <?= $this->Form->create($coursesUser) ?>
            <fieldset>
                <legend><?= __('Edit Courses User') ?></legend>
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
