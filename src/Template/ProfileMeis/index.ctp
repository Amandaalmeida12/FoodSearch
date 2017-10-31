<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProfileMei[]|\Cake\Collection\CollectionInterface $profileMeis
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Profile Mei'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Menus'), ['controller' => 'Menus', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Menu'), ['controller' => 'Menus', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="profileMeis index large-9 medium-8 columns content">
    <h3><?= __('Profile Meis') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('operation') ?></th>
                <th scope="col"><?= $this->Paginator->sort('space') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contact') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('menu_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($profileMeis as $profileMei): ?>
            <tr>
                <td><?= $this->Number->format($profileMei->id) ?></td>
                <td><?= h($profileMei->address) ?></td>
                <td><?= h($profileMei->operation) ?></td>
                <td><?= h($profileMei->space) ?></td>
                <td><?= h($profileMei->contact) ?></td>
                <td><?= $profileMei->has('user') ? $this->Html->link($profileMei->user->name, ['controller' => 'Users', 'action' => 'view', $profileMei->user->id]) : '' ?></td>
                <td><?= $profileMei->has('menu') ? $this->Html->link($profileMei->menu->name, ['controller' => 'Menus', 'action' => 'view', $profileMei->menu->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $profileMei->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $profileMei->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $profileMei->id], ['confirm' => __('Are you sure you want to delete # {0}?', $profileMei->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
