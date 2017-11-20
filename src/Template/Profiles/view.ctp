<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Profile $profile
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Profile'), ['action' => 'edit', $profile->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Profile'), ['action' => 'delete', $profile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $profile->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Profiles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Profile'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Profile Menus'), ['controller' => 'ProfileMenus', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Profile Menu'), ['controller' => 'ProfileMenus', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="profiles view large-9 medium-8 columns content">
    <h3><?= h($profile->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($profile->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($profile->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Operation') ?></th>
            <td><?= h($profile->operation) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact') ?></th>
            <td><?= h($profile->contact) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo') ?></th>
            <td><?= h($profile->photo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo Dir') ?></th>
            <td><?php echo $this->Html->image($profile->photo); ?></td>
                
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $profile->has('user') ? $this->Html->link($profile->user->username, ['controller' => 'Users', 'action' => 'view', $profile->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($profile->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lat') ?></th>
            <td><?= $this->Number->format($profile->lat) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lng') ?></th>
            <td><?= $this->Number->format($profile->lng) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($profile->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Images') ?></h4>
        <?php if (!empty($profile->images)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Photo') ?></th>
                <th scope="col"><?= __('Photo Dir') ?></th>
                <th scope="col"><?= __('Profile Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($profile->images as $images): ?>
            <tr>
                <td><?= h($images->id) ?></td>
                <td><?= h($images->photo) ?></td>
                <td><?= h($images->photo_dir) ?></td>
                <td><?= h($images->profile_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Images', 'action' => 'view', $images->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Images', 'action' => 'edit', $images->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Images', 'action' => 'delete', $images->id], ['confirm' => __('Are you sure you want to delete # {0}?', $images->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Profile Menus') ?></h4>
        <?php if (!empty($profile->profile_menus)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Profile Id') ?></th>
                <th scope="col"><?= __('Menu Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($profile->profile_menus as $profileMenus): ?>
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
