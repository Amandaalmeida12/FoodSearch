<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProfileMenu $profileMenu
 */
?>
<div class="profileMenu form large-9 medium-8 columns content">
<div class="row align-items-center" >
  <div class="row">
    <div class="col-md-6">
      <h5>Progresso para finalização do cadastro:</h5>
    </div>
    <div class="col-md-4">
      <div class="progress" id="progesso">
            <div class="progress-bar"   role="progressbar" style="width:90%">
            90% completado
            </div>
        </div>
        <span class="sr-only">90% completado</span>
    </div>
</div>
    <div class="container-fluide">

    <fieldset id="fieldset_cadastro">
        <?= $this->Form->create($profileMenu) ?>
        <legend><?= __('Finalização do cadastro da empresa') ?></legend>
        <?php
            echo $this->Form->control('profile_id', ['label'=>'Selecione a empresa:','options' => $profiles,'id'=>'borda-input']);
            echo $this->Form->control('menu_id', ['label'=>'Selecione o prato','options' => $menus,'id'=>'borda-input']);
            echo $this->Form->control('image_id', ['options' => $images,'label'=>'Insira a imagem','id'=>'borda-input']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Concluir Cadastro'), array('type' => 'submit', 'class' => 'btn btn-block btn-success btn-lg')); ?>
    <?= $this->Form->end() ?>
</div>
</div>

