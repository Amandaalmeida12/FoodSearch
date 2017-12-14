<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Profile $profile
 */
?>
<div class="profiles view large-9 medium-8 columns content">
    <?php foreach ($profileMenus as $profileMenu): ?>
    <h3><?= h($profileMenu->profile->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($profileMenu->profile->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($profileMenu->profile->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Operation') ?></th>
            <td><?= h($profileMenu->profile->operation) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact') ?></th>
            <td><?= h($profileMenu->profile->contact) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo') ?></th>
            <td><?= h($profileMenu->profile->photo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo Dir') ?></th>
            <td><?php echo $this->Html->image($profileMenu->profile->photo); ?></td>
                
        </tr>
  
    </table>
    <br><br>

 <?php endforeach; ?>
</div>
