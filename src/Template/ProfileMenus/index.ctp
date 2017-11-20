<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProfileMenu[]|\Cake\Collection\CollectionInterface $profileMenus
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Profile Menu'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Profiles'), ['controller' => 'Profiles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Profile'), ['controller' => 'Profiles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Menus'), ['controller' => 'Menus', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Menu'), ['controller' => 'Menus', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="profileMenus index large-9 medium-8 columns content">
    <h3><?= __('Profile Menus') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('profile_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('menu_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($profileMenus as $profileMenu): ?>
            <tr>
                <td><?= $this->Number->format($profileMenu->id) ?></td>
                <td><?= $profileMenu->has('profile') ? $this->Html->link($profileMenu->profile->title, ['controller' => 'Profiles', 'action' => 'view', $profileMenu->profile->id]) : '' ?></td>
                <td><?= $profileMenu->has('menu') ? $this->Html->link($profileMenu->menu->title, ['controller' => 'Menus', 'action' => 'view', $profileMenu->menu->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $profileMenu->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $profileMenu->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $profileMenu->id], ['confirm' => __('Are you sure you want to delete # {0}?', $profileMenu->id)]) ?>
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
