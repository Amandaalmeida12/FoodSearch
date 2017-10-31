<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Menu $menu
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Menu'), ['action' => 'edit', $menu->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Menu'), ['action' => 'delete', $menu->id], ['confirm' => __('Are you sure you want to delete # {0}?', $menu->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Menus'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Menu'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Profile Meis'), ['controller' => 'ProfileMeis', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Profile Mei'), ['controller' => 'ProfileMeis', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="menus view large-9 medium-8 columns content">
    <h3><?= h($menu->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($menu->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= h($menu->image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($menu->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Profile Meis') ?></h4>
        <?php if (!empty($menu->profile_meis)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('Operation') ?></th>
                <th scope="col"><?= __('Space') ?></th>
                <th scope="col"><?= __('Contact') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Menu Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($menu->profile_meis as $profileMeis): ?>
            <tr>
                <td><?= h($profileMeis->id) ?></td>
                <td><?= h($profileMeis->address) ?></td>
                <td><?= h($profileMeis->operation) ?></td>
                <td><?= h($profileMeis->space) ?></td>
                <td><?= h($profileMeis->contact) ?></td>
                <td><?= h($profileMeis->user_id) ?></td>
                <td><?= h($profileMeis->menu_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ProfileMeis', 'action' => 'view', $profileMeis->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProfileMeis', 'action' => 'edit', $profileMeis->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProfileMeis', 'action' => 'delete', $profileMeis->id], ['confirm' => __('Are you sure you want to delete # {0}?', $profileMeis->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
