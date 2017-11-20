<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Profile $profile
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Profiles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Profile Menus'), ['controller' => 'ProfileMenus', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Profile Menu'), ['controller' => 'ProfileMenus', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="profiles form large-9 medium-8 columns content">
    <?= $this->Form->create($profile,['type'=>'file']) ?>
    <fieldset>
        <legend><?= __('Add Profile') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('address');
            echo $this->Form->control('operation');
            echo $this->Form->control('contact');
            echo $this->Form->control('description');
            echo $this->Form->control('photo',['type'=>'file']);
            echo $this->Form->control('photo_dir');
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('lat');
            echo $this->Form->control('lng');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
