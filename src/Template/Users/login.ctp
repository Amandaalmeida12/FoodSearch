
<div class="users form">
    <?= $this->Flash->render('auth') ?>
    <?= $this->Form->create() ?>

        <div id="image">
            <img  src="http://i64.tinypic.com/124c5n8.png"  >
        </div>
        <div id="input">
            <?= $this->Form->input('username', ['label'=>'Usuário: ']) ?>
            <?= $this->Form->input('password') ?>
        </div>
        <div id="button">
        <?= $this->Form->button(__('Entrar',['class'=>'btn btn-primary btn-lg btn-block'])); ?>
        <?= $this->Form->end() ?>
        </div>
    </div>