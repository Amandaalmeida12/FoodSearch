<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Menu $menu
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Menus'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Profile Menus'), ['controller' => 'ProfileMenus', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Profile Menu'), ['controller' => 'ProfileMenus', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="menus form large-9 medium-8 columns content">
    <?= $this->Form->create($menu,['type'=>'file']) ?>
    <fieldset>
        <legend><?= __('Add Menu') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('price');
            echo $this->Form->control('category');
            echo $this->Form->control('description');
            echo $this->Form->control('photo',['type'=>'file']);
            echo $this->Form->control('photo_dir');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
