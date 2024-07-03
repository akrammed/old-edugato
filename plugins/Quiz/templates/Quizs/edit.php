<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $quiz
 * @var string[]|\Cake\Collection\CollectionInterface $quiztypes
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $quiz->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $quiz->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Quizs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="quizs form content">
            <?= $this->Form->create($quiz) ?>
            <fieldset>
                <legend><?= __('Edit Quiz') ?></legend>
                <?php
                    echo $this->Form->control('title');
                    echo $this->Form->control('description');
                    echo $this->Form->control('question');
                    echo $this->Form->control('question_2');
                    echo $this->Form->control('question_3');
                    echo $this->Form->control('question_4');
                    echo $this->Form->control('question_5');
                    echo $this->Form->control('question_6');
                    echo $this->Form->control('question_7');
                    echo $this->Form->control('is_q_true');
                    echo $this->Form->control('is_q2_true');
                    echo $this->Form->control('is_q3_true');
                    echo $this->Form->control('is_q4_true');
                    echo $this->Form->control('is_q7_true');
                    echo $this->Form->control('is_q5_true');
                    echo $this->Form->control('is_q6_true');
                    echo $this->Form->control('option_1');
                    echo $this->Form->control('option_2');
                    echo $this->Form->control('option_3');
                    echo $this->Form->control('option_4');
                    echo $this->Form->control('option_5');
                    echo $this->Form->control('option_6');
                    echo $this->Form->control('option_7');
                    echo $this->Form->control('option_8');
                    echo $this->Form->control('correct');
                    echo $this->Form->control('quiztype_id', ['options' => $quiztypes, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
