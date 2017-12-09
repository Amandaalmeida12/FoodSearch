<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;
if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace src/Template/Pages/home.ctp with your own version or re-enable debug mode.'
    );
endif;

$cakeDescription = 'Foodsearch';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>

    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->script('jquery.min.js') ?> 
    <?= $this->Html->script('mapa.js') ?> 
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('home.css') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">
    <?= $this->Html->script('https://maps.googleapis.com/maps/api/js?key=AIzaSyD68OKeoqeM9tvDjrf8qTh98mxt7BM0BNQ'); ?>
</head>
<body class="home">
<nav class="navbar navbar-default">
  <div id="nav" class="container-fluid">
    <div class="navbar-header">
     <?= $this->Html->image('logo.png') ?>
    </div>
    <ul class="nav navbar-nav">
     
      <li><?= $this->Html->link(__('Inicio'), ['controller' => 'profileMenus', 'action' => 'index']) ?></li>
      <li><?= $this->Html->link(__('Sobre nós'), ['controller' => 'Users', 'action' => 'sobrenos']) ?></li> 
      <li><?= $this->Html->link(__('Cadastre-se'), ['controller' => 'Users', 'action' => 'add']) ?></li>
      <li><?= $this->Html->link(__('Acessar'), ['controller' => 'Users', 'action' => 'login']) ?></li>
     <?php if ($username): ?>
            <li><?= $this->Html->link(__('Logout'),['controller'=>'Users','action'=>'logout'])?></li>
        <?php endif; ?>
    </ul>
  </div>
</nav>

<header class="row">
    <div class="col-xs-12 col-sm-6 col-lg-12" class="img-responsive" alt="Imagem Responsiva" id="image-principal"></div>
    <div class="col-xs-9 col-md-7 col-md-offset-2" id="busca"><input type="text" id="input-busca" name="buscar" placeholder="Digite o nome da Comida:">
    </div>
    <div  class="col-xs-3 col-md-3 col-md-offset-9" id="busca-submit">
    <input id="btn-busca" type="submit" value="Buscar">
    </div>
</header>
<div class="container" id="div-proximo">
    <div class="col-sm-5">
        <h3>Próximo a você</h3>
        <div id="map" style="width:90%;height:410px">
            <script>
                carregaMapa();
            </script>
        </div>
    </div>
    <h3></h3>
    <br>
    <?php foreach ($profileMenus as $profileMenu): ?>
        <a href="profile-Menus/view/<?= $profileMenu->id ?>">
        <div class="col-sm-1">
            <?php echo $this->Html->image($profileMenu->profile->photo,['id'=>'lista-image']); ?>
        </div>
        <div class="col-sm-6" id="lista-informacao">
            <h5 id="lista-paragrafo"><?=$profileMenu->profile->title ?></h5>
            <p id="localizacao"><strong>Localização:</strong><?=$profileMenu->profile->address ?></p>
            <p id="horario"><strong>Horário de funcionamento:</strong><?=$profileMenu->profile->operation ?></p>
            <p id="contato"><strong>Contato:</strong><?=$profileMenu->profile->contact ?></p>
        </div></a>
    <?php endforeach ?>
     <div id="paginacao" class="col-sm-6">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
    </div>
</div>
</body>
</html>

