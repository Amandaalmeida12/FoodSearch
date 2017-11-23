<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        
    </ul>
</nav>
<div class="users form">
    <?= $this->Flash->render('auth') ?>
    <?= $this->Form->create() ?>
    <fieldset>
        
        <div id="image">
           
            <img src="http://i64.tinypic.com/124c5n8.png" >

            </div>
        <?= $this->Form->input('Usuário: ') ?>
        <?= $this->Form->input('Senha: ') ?>
    </fieldset>
    <?= $this->Form->button(__('Login',['class'=>'btn btn-primary btn-lg btn-block'])); ?>
    <?= $this->Form->end() ?>
</div>