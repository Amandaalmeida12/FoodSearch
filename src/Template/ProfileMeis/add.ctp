<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProfileMei $profileMei
 */
?>
 <script type="text/javascript">
    
        function myMap() {
            var myCenter = new google.maps.LatLng(-7.92323,-34.92004);
            var mapCanvas = document.getElementById("map");
            var mapOptions = {center: myCenter, zoom: 11};
            var map = new google.maps.Map(mapCanvas, mapOptions);
            map.addListener('click', function(e) {
                document.getElementById("lat").value = e.latLng.lat();
                document.getElementById("lng").value = e.latLng.lng();
            });
        }
</script>

<div id="map" style="width:50%;height:500px"></div>

<?= $this->Html->script('https://maps.googleapis.com/maps/api/js?key=AIzaSyBfZ3hsTdc5DDfx1IBQlh05N-re23793BU&callback=myMap'); ?>
<div class="profileMeis form large-9 medium-8 columns content">
    <?= $this->Form->create($profileMei) ?>
    <fieldset>
        <legend><?= __('Add Profile Mei') ?></legend>
        <?php
            echo $this->Form->control('image');
            echo $this->Form->control('path');
            echo $this->Form->control('address');
            echo $this->Form->control('operation');
            echo $this->Form->control('space');
            echo $this->Form->control('contact');
            echo $this->Form->control('lat');
            echo $this->Form->control('lng');
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('menu_id', ['options' => $menus]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
