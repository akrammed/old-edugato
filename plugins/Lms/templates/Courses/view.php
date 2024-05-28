<?php

/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $course
 */
$this->assign('title', $course->title);
?>


<?= $this->element('Lms.Default/course-display')?>
