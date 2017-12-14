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

$cakeDescription = 'Foodsearch';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->script('jquery.min.js'); ?>  
    <?= $this->Html->css('bootstrap.min.css'); ?>   
    <?= $this->Html->script('mapa_cadastro.js'); ?>    
    
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="navbar navbar-default">
  <div id="nav" class="container-fluid">
    <div class="navbar-header">
     <?= $this->Html->image('logotr.png') ?>
    </div>
    <ul class="nav navbar-nav">
     
      <li><?= $this->Html->link(__('Inicio'), ['controller' => '', 'action' => '']) ?></li>
      <li><?= $this->Html->link(__('Sobre nós'), ['controller' => 'Users', 'action' => 'sobrenos']) ?></li> 
      <?php $user = $this->request->session()->read('Auth.User'); ?>
      <?php if (!isset($username)): ?>
          <li><?= $this->Html->link(__('Cadastre a sua empresa'), ['controller' => 'Users', 'action' => 'add']) ?></li>
          <li><?= $this->Html->link(__('Acessar'), ['controller' => 'Users', 'action' => 'login']) ?></li>
      <?php endif; ?>
      <?php if ($username): ?>
        <li><?= $this->Html->link(__('Logout'),['controller'=>'Users','action'=>'logout'])?></li>
      <?php endif; ?>

    </ul>
  </div>
</nav>
    
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    
</body>
</html>
