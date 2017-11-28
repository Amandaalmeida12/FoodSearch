<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProfileMenu $profileMenu
 */
?>

<div class="profileMenus form large-9 medium-8 columns content">
    <?= $this->Form->create($profileMenu) ?>
    <fieldset>
        <legend><?= __('Add Profile Menu') ?></legend>
        <?php
            echo $this->Form->control('profile_id', ['options' => $profiles]);
            echo $this->Form->control('menu_id', ['options' => $menus]);
        ?>
    </fieldset>
     <?= $this->Html->link(__('New Profile'), ['controller' => 'Profiles', 'action' => 'add']) ?><br>
    <?= $this->Html->link(__('New Menu'), ['controller' => 'Menus', 'action' => 'add']) ?>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
