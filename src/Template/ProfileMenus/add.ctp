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
            echo $this->Form->control('image_id', ['options' => $images]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit',['class'=>'btn btn-primary btn-lg btn-block'])) ?>
    <?= $this->Form->end() ?>
</div>

