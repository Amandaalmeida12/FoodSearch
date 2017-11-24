<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
   
        <div id="img_cad">
            <img  src="http://i64.tinypic.com/124c5n8.png"  >
        </div>
        <div id="cadastro">
          <?php
              
                echo $this->Form->control('username', ['label' =>'Usuário: ']);
                echo $this->Form->control('email', ['label' => 'Email: ']);
                echo $this->Form->control('password');
                echo $this->Form->control('confirm_password',['label'=> 'Confirmar Sua Senha: ', 'type'=>'password']);
           ?>
           </div>
     <div id="button_cad">
    <?= $this->Form->button(__('Cadastrar')) ?>
    <?= $this->Form->end() ?>
    </div>
</div>
