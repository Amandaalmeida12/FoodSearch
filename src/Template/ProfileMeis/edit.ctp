<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProfileMei $profileMei
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $profileMei->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $profileMei->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Profile Meis'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Menus'), ['controller' => 'Menus', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Menu'), ['controller' => 'Menus', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="profileMeis form large-9 medium-8 columns content">
    <?= $this->Form->create($profileMei) ?>
    <fieldset>
        <legend><?= __('Edit Profile Mei') ?></legend>
        <?php
            echo $this->Form->control('address');
            echo $this->Form->control('operation');
            echo $this->Form->control('space');
            echo $this->Form->control('contact');
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('menu_id', ['options' => $menus]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
