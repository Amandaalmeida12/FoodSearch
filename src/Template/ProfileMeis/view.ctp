<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProfileMei $profileMei
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Profile Mei'), ['action' => 'edit', $profileMei->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Profile Mei'), ['action' => 'delete', $profileMei->id], ['confirm' => __('Are you sure you want to delete # {0}?', $profileMei->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Profile Meis'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Profile Mei'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Menus'), ['controller' => 'Menus', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Menu'), ['controller' => 'Menus', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="profileMeis view large-9 medium-8 columns content">
    <h3><?= h($profileMei->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($profileMei->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Operation') ?></th>
            <td><?= h($profileMei->operation) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Space') ?></th>
            <td><?= h($profileMei->space) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact') ?></th>
            <td><?= h($profileMei->contact) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Menu') ?></th>
            <td><?= $profileMei->has('menu') ? $this->Html->link($profileMei->menu->title, ['controller' => 'Menus', 'action' => 'view', $profileMei->menu->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($profileMei->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Id') ?></th>
            <td><?= $this->Number->format($profileMei->user_id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($profileMei->description)); ?>
    </div>
</div>
