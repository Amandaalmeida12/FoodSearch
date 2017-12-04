<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProfileMenu $profileMenu
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Profile Menu'), ['action' => 'edit', $profileMenu->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Profile Menu'), ['action' => 'delete', $profileMenu->id], ['confirm' => __('Are you sure you want to delete # {0}?', $profileMenu->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Profile Menus'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Profile Menu'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Profiles'), ['controller' => 'Profiles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Profile'), ['controller' => 'Profiles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Menus'), ['controller' => 'Menus', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Menu'), ['controller' => 'Menus', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="profileMenus view large-9 medium-8 columns content">
    <h3><?= h($profileMenu->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Profile') ?></th>
            <td><?= $profileMenu->has('profile') ? $this->Html->link($profileMenu->profile->title, ['controller' => 'Profiles', 'action' => 'view', $profileMenu->profile->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Menu') ?></th>
            <td><?= $profileMenu->has('menu') ? $this->Html->link($profileMenu->menu->title, ['controller' => 'Menus', 'action' => 'view', $profileMenu->menu->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($profileMenu->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image Id') ?></th>
            <td><?= $this->Number->format($profileMenu->image_id) ?></td>
        </tr>
    </table>
</div>
