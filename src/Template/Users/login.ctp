
<div class="container">
<div class="col-md-4 col-md-offset-4">
<fieldset >

<div id="image">
    <img src="/img/user.png">
</div>
<?= $this->Form->create(null, array('class'=>"form-group")) ?>
<?= $this->Form->control('username',['label' => 'Usuário: ', 'class' => 'form-control form-rounded']) ?>
<?= $this->Form->control('password',['label' => 'Senha: ', 'class' => 'form-control']) ?>
<?php echo $this->Html->link(
    '<i class="fa fa-question-circle" aria-hidden="true"></i> Esqueci minha senha',
    array('controller'=>'users','action'=>'recoverPassword'),
    array('class'=>'right', 'escape' => false));
    ?>
</fieldset>
<?= $this->Form->button(__('Entrar'), array('type' => 'submit', 'class' => 'btn btn-block btn-success btn-lg')); ?>
<?= $this->Form->end() ?>

</div>
</div>