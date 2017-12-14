
<div class="container">
<div class="col-md-4 col-md-offset-4">
<fieldset >

<div id="image">
    <img src="/img/user.png">
</div>
<?= $this->Form->create(null, array('class'=>"form-group")) ?>
<?= $this->Form->control('username',['label' => 'Usuário: ', 'class' => 'form-control form-rounded']) ?>
<?= $this->Form->control('password',['label' => 'Senha: ', 'class' => 'form-control']) ?>
</fieldset>
<?= $this->Form->button(__('Entrar'), array('type' => 'submit', 'class' => 'btn btn-block btn-success btn-lg')); ?>
<?= $this->Form->end() ?>

</div>
</div>