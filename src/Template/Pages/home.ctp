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
    <?= $this->Html->script('jquery.min.js'); ?> 
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('home.css') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">
</head>
<body class="home">
<nav class="navbar navbar-default">
  <div id="nav" class="container-fluid">
    <div class="navbar-header">
     <?= $this->Html->image('logo.png') ?>
    </div>
    <ul class="nav navbar-nav">
     
      <li><?= $this->Html->link(__('Inicio'), ['controller' => '', 'action' => '']) ?></li>
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
    <div class="col-xs-12 col-sm-6 col-lg-12"  id="image-principal"></div>
    <div class="col-xs-9 col-md-7 col-md-offset-2" id="busca"><input type="text" id="input-busca" name="buscar" placeholder="Digite o nome da Comida:">
    </div>
    <div  class="col-xs-3 col-md-5 col-md-offset-9" id="busca-submit">
    <input id="btn-busca" type="submit" value="Buscar">
    </div>
</header>

<?= $this->Html->script('https://maps.googleapis.com/maps/api/js?key=AIzaSyD68OKeoqeM9tvDjrf8qTh98mxt7BM0BNQ'); ?>
<script type="text/javascript">

    var map;
    var profiles= [];
    var infoWindow;
    var locationSelect;
    function carregaMapa() {
      map = new google.maps.Map(document.getElementById("map"), {
            center: new google.maps.LatLng(-7.92323,-34.92004),
            zoom: 11,
            mapTypeId: 'roadmap',
            mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU}
          });
          infoWindow = new google.maps.InfoWindow();

          locationSelect = document.getElementById("locationSelect");
          locationSelect.onchange = function() {
            var markerNum = locationSelect.options[locationSelect.selectedIndex].value;
            if (markerNum != "none"){
              google.maps.event.trigger(profiles[markerNum], 'click');
            }
          };
    }

    function createMarker(latlng,title, address) {
      var html = "<b>" +title + "</b> <br/>" + address;
      var marker = new google.maps.Marker({
      map: map,
      position: latlng
      });
      google.maps.event.addListener(marker, 'click', function() {
      infoWindow.setContent(html);
      infoWindow.open(map, marker);
      });
      profiles.push(marker);
    }

    $.getJSON('http://localhost:8765/profiles/Profilesjson', function(data) {
        for (var i = 0; i < data.length; i++) {
          var latlng = new google.maps.LatLng(data[i].lat,data[i].lng)
          createMarker(latlng, data[i].title, data[i].address);
        }
    });

</script>
<div>
<div class="col-xs-7 col-sm-6 col-lg-8" id="div-proximo">
<h3>Próximo a você</h3>
<div id="map" style="width:50%;height:500px">
    <script>
        carregaMapa();
    </script>
  </div>
</div>
  
</div>
</body>
</html>
