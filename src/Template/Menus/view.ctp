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
        <li><?= $this->Html->link(__('List Profile Menus'), ['controller' => 'ProfileMenus', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Profile Menu'), ['controller' => 'ProfileMenus', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="menus view large-9 medium-8 columns content">
    <h3><?= h($menu->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($menu->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= h($menu->category) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo') ?></th>
            <td><?= h($menu->photo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo Dir') ?></th>
            <td><?php echo $this->Html->image($menu->photo); ?></td>
                
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($menu->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($menu->price) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($menu->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Profile Menus') ?></h4>
        <?php if (!empty($menu->profile_menus)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Profile Id') ?></th>
                <th scope="col"><?= __('Menu Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($menu->profile_menus as $profileMenus): ?>
            <tr>
                <td><?= h($profileMenus->id) ?></td>
                <td><?= h($profileMenus->profile_id) ?></td>
                <td><?= h($profileMenus->menu_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ProfileMenus', 'action' => 'view', $profileMenus->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProfileMenus', 'action' => 'edit', $profileMenus->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProfileMenus', 'action' => 'delete', $profileMenus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $profileMenus->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
