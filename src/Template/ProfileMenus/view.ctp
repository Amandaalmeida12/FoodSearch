<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProfileMenu $profileMenu
 */
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12" id="foto-perfil">
            <div class="row">
                <div class="col-sm-7" id="title-perfil">
                    <?=$profileMenu->profile->title ?>
                </div>
                <div class="col-sm-5" id="horario-perfil">
                   <p><strong>Horário de Funcionamento:</strong><?=$profileMenu->profile->operation ?>
                </div>
                <div class="col-sm-7" id="descricao-perfil">
                    <p><?=$profileMenu->profile->description ?>
                </div> 
            </div>
        </div> 
        <div class="col-lg-12" id="menu-perfil">
            <div class="col-sm-6" id="ambientes">
                <h4><strong>Ambientes e Produtos</strong></h4>
            </div>
            <div class="col-sm-6" id="chegar">
                <h4><strong>Como chegar</strong></h4>
            </div>
        </div>       
        <div class="col-lg-12" id="menu-perfil2">

        </div>       
    </div>
</div>


