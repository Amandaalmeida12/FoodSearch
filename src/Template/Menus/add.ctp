<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Menu $menu
 */
?>
<div id="margem" class="menus form large-9 medium-8 columns content">

    <?= $this->Form->create($menu,['type'=>'file']) ?>
    <fieldset>
        <legend><?= __('Add Menu') ?></legend>
            <?php echo $this->Form->control('title',['label'=>'','placeholder'=>'Digite o nome do prato','class'=>'col-xs-4']); ?>
        <div class="row">
            <div id="menu-foto" class="col-sm-3 col-md-6 col-lg-4">
                <?php  echo $this->Form->control('photo',['label'=>'Insira a Foto','type'=>'file']);?>
            </div>
             <div id="pg-menu" class="col-sm-9 col-md-6 col-lg-8">
                <?php echo $this->Form->control('description',['id'=>'menu-descricao','label'=>'','class'=>'form-control','placeholder'=>'Descrição do prato']); ?>

                <?php echo $this->Form->control('category',['label'=>'','class'=>'form-control','placeholder'=>'Categoria do prato']);?>
                <div class="">
                <?php echo $this->Form->control('price',['label'=>'','class'=>'form-control','placeholder'=>'Preço:R$ xx,xx']); ?>
                </div>
                <div class="col-sm-3">
                <?= $this->Form->button(__('Salvar'),['id'=>'menu-salvar']) ?>
                <?= $this->Form->end() ?>
                </div>

            </div>
        </div>
        
    </fieldset>
    
</div>
