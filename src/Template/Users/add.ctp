<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="container">
  <div class="col-md-4 col-md-offset-4">

    <?= $this->Form->create($user, array('class' =>'form-group')) ?>
    <fieldset >
     <div id="image">
      <img src="/img/user.png">
    </div>
    <div>
      <?= $this->Form->control('username',['label' => 'Usuário: ', 'class' => 'form-control form-rounded']) ?>
      <?= $this->Form->control('email',['label' => 'Email: ', 'class' => 'form-control form-rounded']) ?>
      <?= $this->Form->control('password',['label' => 'Senha: ', 'class' => 'form-control']) ?> 
      <?= $this->Form->control('confirm_password',['label'=> 'Confirmar Sua Senha: ', 'class' => 'form-control', 'type'=>'password'])
      ?>
    </div>
  </fieldset>
  <?= $this->Form->button(__('Cadastrar'), array('type' => 'submit', 'class' => 'btn btn-block btn-success btn-lg')); ?>
  <?= $this->Form->end() ?>
</div>
</div>
