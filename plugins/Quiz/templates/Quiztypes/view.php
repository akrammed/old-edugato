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
            <?= $this->Html->link(__('Edit Quiztype'), ['action' => 'edit', $quiztype->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Quiztype'), ['action' => 'delete', $quiztype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quiztype->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Quiztypes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Quiztype'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="quiztypes view content">
            <h3><?= h($quiztype->type) ?></h3>
            <table>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= h($quiztype->type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($quiztype->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Quizs') ?></h4>
                <?php if (!empty($quiztype->quizs)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Question') ?></th>
                            <th><?= __('Question 2') ?></th>
                            <th><?= __('Question 3') ?></th>
                            <th><?= __('Question 4') ?></th>
                            <th><?= __('Question 5') ?></th>
                            <th><?= __('Question 6') ?></th>
                            <th><?= __('Question 7') ?></th>
                            <th><?= __('Is Q True') ?></th>
                            <th><?= __('Is Q2 True') ?></th>
                            <th><?= __('Is Q3 True') ?></th>
                            <th><?= __('Is Q4 True') ?></th>
                            <th><?= __('Is Q7 True') ?></th>
                            <th><?= __('Is Q5 True') ?></th>
                            <th><?= __('Is Q6 True') ?></th>
                            <th><?= __('Option 1') ?></th>
                            <th><?= __('Option 2') ?></th>
                            <th><?= __('Option 3') ?></th>
                            <th><?= __('Option 4') ?></th>
                            <th><?= __('Option 5') ?></th>
                            <th><?= __('Option 6') ?></th>
                            <th><?= __('Option 7') ?></th>
                            <th><?= __('Option 8') ?></th>
                            <th><?= __('Correct') ?></th>
                            <th><?= __('Quiztype Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($quiztype->quizs as $quizs) : ?>
                        <tr>
                            <td><?= h($quizs->id) ?></td>
                            <td><?= h($quizs->title) ?></td>
                            <td><?= h($quizs->description) ?></td>
                            <td><?= h($quizs->question) ?></td>
                            <td><?= h($quizs->question_2) ?></td>
                            <td><?= h($quizs->question_3) ?></td>
                            <td><?= h($quizs->question_4) ?></td>
                            <td><?= h($quizs->question_5) ?></td>
                            <td><?= h($quizs->question_6) ?></td>
                            <td><?= h($quizs->question_7) ?></td>
                            <td><?= h($quizs->is_q_true) ?></td>
                            <td><?= h($quizs->is_q2_true) ?></td>
                            <td><?= h($quizs->is_q3_true) ?></td>
                            <td><?= h($quizs->is_q4_true) ?></td>
                            <td><?= h($quizs->is_q7_true) ?></td>
                            <td><?= h($quizs->is_q5_true) ?></td>
                            <td><?= h($quizs->is_q6_true) ?></td>
                            <td><?= h($quizs->option_1) ?></td>
                            <td><?= h($quizs->option_2) ?></td>
                            <td><?= h($quizs->option_3) ?></td>
                            <td><?= h($quizs->option_4) ?></td>
                            <td><?= h($quizs->option_5) ?></td>
                            <td><?= h($quizs->option_6) ?></td>
                            <td><?= h($quizs->option_7) ?></td>
                            <td><?= h($quizs->option_8) ?></td>
                            <td><?= h($quizs->correct) ?></td>
                            <td><?= h($quizs->quiztype_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Quizs', 'action' => 'view', $quizs->]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Quizs', 'action' => 'edit', $quizs->]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Quizs', 'action' => 'delete', $quizs->], ['confirm' => __('Are you sure you want to delete # {0}?', $quizs->)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
