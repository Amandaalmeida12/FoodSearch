
<div class="users form">
    <?= $this->Flash->render('auth') ?>
    <?= $this->Form->create() ?>
    <fieldset>
        
        <div id="image">
           
            <img  src="http://i64.tinypic.com/124c5n8.png" align="center" >

            </div>
        <?= $this->Form->input('username') ?>
        <?= $this->Form->input('password') ?>
    </fieldset>
    <?= $this->Form->button(__('Login',['class'=>'btn btn-primary btn-lg btn-block'])); ?>
    <?= $this->Form->end() ?>
</div>