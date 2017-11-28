<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Menu $menu
 */
?>
<div class="menus form large-9 medium-8 columns content">
    <?= $this->Form->create($menu,['type'=>'file']) ?>
    <fieldset>
        <legend><?= __('Add Menu') ?></legend>
        <div>
            <?php echo $this->Form->control('title',['class'=>'form-control']); ?>
        </div>

        <div id="menu-descricao"> 
            <div id="descricao">
                <?php echo $this->Form->control('description',['class'=>'form-control','placeholder'=>'Descrição do prato']); ?>
            </div>
            <div id="menu-valor">
                <?php echo $this->Form->control('price',['class'=>'form-control','placeholder'=>'Digite preço']); ?>
            </div>
            <div id="menu-categoria">
                <?php echo $this->Form->control('category',['class'=>'form-control','placeholder'=>'Categoria do prato']);?>
            </div>
            
        </div>
        <div id="menu-imagem">
            <?php  echo $this->Form->control('photo',['type'=>'file']);?>
        </div>
        
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
