<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Image $image
 */
?>
<div class="images form large-9 medium-8 columns content">
<div class="row align-items-center" >
  <div class="row">
    <div class="col-md-6">
      <h5>Progresso para finalização do cadastro:</h5>
    </div>
    <div class="col-md-4">
      <div class="progress" id="progesso">
            <div class="progress-bar"   role="progressbar" style="width:50%">
            50% completado
            </div>
        </div>
        <span class="sr-only">25% completado</span>
    </div>
</div>
    <div class="container-fluide">

    <fieldset id="fieldset_cadastro">
    <?= $this->Form->create($image,['type'=>'file']) ?>
        <legend><?= __('Insira imagem do ambiente  da empresa') ?></legend>
        <?php
            echo $this->Form->control('photo',['type'=>'file','label'=>'Insira a imagem']);
            echo $this->Form->control('profile_id', ['options' => $profiles,'label'=>'Nome da Empresa Cadastrada']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Próximo'), array('type' => 'submit', 'class' => 'btn btn-block btn-success btn-lg')); ?>
    <?= $this->Form->end() ?>
</div>
</div>

