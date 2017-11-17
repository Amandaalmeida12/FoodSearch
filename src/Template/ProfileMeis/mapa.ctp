<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Marker[]|\Cake\Collection\CollectionInterface $markers
 */
?>

<?= $this->Html->script('https://maps.googleapis.com/maps/api/js?key=AIzaSyBfZ3hsTdc5DDfx1IBQlh05N-re23793BU'); ?>



<script type="text/javascript">

    var map;
    var profile_meis = [];
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
              google.maps.event.trigger(profile_meis[markerNum], 'click');
            }
          };
    }

    function createMarker(latlng, operation, address) {
          var html = "<b>" + operation + "</b> <br/>" + address;
          var marker = new google.maps.Marker({
            map: map,
            position: latlng
          });
          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
          profile_meis.push(marker);
        }

    $.getJSON('http://localhost:8765/profile-meis/Profilejson', function(data) {
        for (var i = 0; i < data.length; i++) {
            var latlng = new google.maps.LatLng(data[i].lat,data[i].lng)
            createMarker(latlng, data[i].name, data[i].address);
        }
    });

</script>



<div class="markers index large-9 medium-8 columns content">
    


    <div id="map" style="width:50%;height:500px">
        <script>
            carregaMapa();
        </script>
    </div>

</div>

