<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Profile $profile
 */
?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC6F2ikCAb-eDmEUH9xc18Vis7SdXT0Uw&libraries=places&callback=initMap"
        async defer></script>
<div class="profiles form large-9 medium-8 columns content">
<div class="row align-items-center" >
  <div class="row">
    <div class="col-md-6">
      <h5>Progresso para finalização do cadastro:</h5>
    </div>
    <div class="col-md-4">
      <div class="progress" id="progesso">
        <div class="progress-bar"   role="progressbar" style="width:30%">
          25% completado
          
        </div>
        
        </div>
        <span class="sr-only">25% completado</span>
      
      
    </div>
    
  </div>
 <fieldset id="fieldset_cadastro">
        <?= $this->Form->create($profile) ?>
        <legend><?= __('Cadastro da Empresa') ?></legend>

        <?php
            echo $this->Form->control('title',['label'=>'Nome da Empresa:','id'=>'borda-input']);
            echo $this->Form->control('operation',['label'=>'Horário de Funcionamento:','id'=>'borda-input']);
        ?>
         <?= $this->Form->create($profile,['type'=>'file']) ?>
          <?php
            echo $this->Form->control('address',['type'=>'hidden']);  
            echo $this->Form->control('lat',['type'=>'hidden']);
            echo $this->Form->control('lng',['type'=>'hidden']);
          ?>
        <label>Endereço:</label>
        <div >
        <input id="pac-input" id="borda-input" class="controls" type="text" placeholder="Enter a location">
        </div>
        <div class="row" id="mapa" style="height: 350px;width: 350px"></div>

        <?php
            echo $this->Form->control('contact',['label'=>'Telefone','id'=>'borda-input']);
            echo $this->Form->control('description',['label'=>'Descrição da Empresa','id'=>'descricao-input']);
            echo $this->Form->control('photo',['type'=>'file','label'=>'Insira foto de perfil','id'=>'borda-input']);
        ?> 
    </fieldset>

    <?= $this->Form->button(__('Próximo'), array('type' => 'submit', 'class' => 'btn btn-block btn-success btn-lg')); ?>
<?= $this->Form->end() ?>
</div>
</div>

