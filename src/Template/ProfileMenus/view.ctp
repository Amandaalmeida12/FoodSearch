<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProfileMenu $profileMenu
 */
?>
<div class="container text-center" id="pagina-perfil">
    <div class="col-lg-8" id="foto-perfil">
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
</div>
<div class="col-lg-12" id="menu-perfil">
        <a  class="btn-toggle" data-element="#ambientes"><div class="col-sm-6" id="ambientes-produtos">
            <h4><strong>Ambientes e Produtos</strong></h4>
        </div></a>
        <a class="btn-toggle" data-element="#produtos"><div class="col-sm-6" id="chegar" data-element="#produtos">
            <h4><strong>Como chegar</strong></h4>
        </div></a>
    </div>       
    <div class="col-lg-12" id="menu-perfil2"></div>       
    <div class="col-lg-12" id="ambientes">
        <h4><strong>Ambientes</strong></h4>
        <?php echo $this->Html->image($profileMenu->image->photo,['id'=>'ambientes-fotos']);?>
        <h4><strong>Produtos</strong></h4>
        <a href="/Menus/view/<?= $profileMenu->menu->id ?>"><?php echo $this->Html->image($profileMenu->menu->photo,['id'=>'produtos-menu']);?></a>
    </div>
    <div class="col-lg-8" id="produtos">
        <h5>aa</h5>
        <h5></h5>
     </div>
<script>
$(function(){
        $(".btn-toggle").click(function(e){
            e.preventDefault();
            el = $(this).data('element');
            $(el).toggle();
        });
    });
</script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>



