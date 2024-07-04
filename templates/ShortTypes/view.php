<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ShortType $shortType
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Short Type'), ['action' => 'edit', $shortType->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Short Type'), ['action' => 'delete', $shortType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shortType->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Short Types'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Short Type'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="shortTypes view content">
            <h3><?= h($shortType->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= h($shortType->type) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $shortType->hasValue('user') ? $this->Html->link($shortType->user->first_name, ['controller' => 'Users', 'action' => 'view', $shortType->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($shortType->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Category Id') ?></th>
                    <td><?= $shortType->category_id === null ? '' : $this->Number->format($shortType->category_id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Shorts') ?></h4>
                <?php if (!empty($shortType->shorts)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Video') ?></th>
                            <th><?= __('Short Type Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($shortType->shorts as $shorts) : ?>
                        <tr>
                            <td><?= h($shorts->id) ?></td>
                            <td><?= h($shorts->title) ?></td>
                            <td><?= h($shorts->description) ?></td>
                            <td><?= h($shorts->video) ?></td>
                            <td><?= h($shorts->short_type_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Shorts', 'action' => 'view', $shorts->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Shorts', 'action' => 'edit', $shorts->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Shorts', 'action' => 'delete', $shorts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shorts->id)]) ?>
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
