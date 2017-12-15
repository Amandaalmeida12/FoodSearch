<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Menu $menu
 */
?>
<div id="margem" class="menus form large-9 medium-8 columns content">
    <div class="row align-items-center" >
        <div class="row">
            <div class="col-md-6">
                <h5>Progresso para finalização do cadastro:</h5>
            </div>
            <div class="col-md-4">
                <div class="progress" id="progesso">
                    <div class="progress-bar"   role="progressbar" style="width:75%">
                        75% completado
                    </div>
                    
            </div>
            <span class="sr-only">75% completado</span>
        </div>
    </div>

 <fieldset id="fieldset_cadastro">
        <?= $this->Form->create($menu,['type'=>'file']) ?>
        <legend><?= __('Cadastrar um prato') ?></legend>

        <?php
             echo $this->Form->control('title',['label'=>'Nome do Prato','placeholder'=>'Digite o nome do prato','class'=>'col-xs-4','id'=>'borda-input']); 
            echo $this->Form->control('photo',['label'=>'Insira a Foto','type'=>'file','id'=>'borda-input']);
            echo $this->Form->control('description',['label'=>'Descrição do Prato','class'=>'form-control','placeholder'=>'Descrição do prato','id'=>'descricao-input']); 
            echo $this->Form->control('category',['label'=>'Categoria','class'=>'form-control','placeholder'=>'Categoria do prato','id'=>'borda-input']);
            echo $this->Form->control('price',['label'=>'Preço','class'=>'form-control','placeholder'=>'Preço:R$ xx,xx','id'=>'borda-input']); 
          ?>
    </fieldset>

    <?= $this->Form->button(__('Próximo'), array('type' => 'submit', 'class' => 'btn btn-block btn-success btn-lg')); ?>
<?= $this->Form->end() ?>
</div>
</div>



