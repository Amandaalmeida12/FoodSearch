
<div id="map" style="width:50%;height:350px"></div>

<script>
function myMap() {
  var myCenter = new google.maps.LatLng(-7.92323,-34.92004);
  var mapCanvas = document.getElementById("map");
  var mapOptions = {center: myCenter, zoom: 5};
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker = new google.maps.Marker({position:myCenter});
  marker.setMap(map);
}
function createMarker(latlng,operation,adress) {
          var html = "<b>" + address+ "</b> <br/>" + operation;
          var marker = new google.maps.Marker({
            map: map,
            position: latlng
          });
          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
          markers
      .push(marker);
}
$.getJSON('http://localhost:8765/profile-meis/Profilejson', function(data) {
        for (var i = 0; i < data.length; i++) {
            var latlng = new google.maps.LatLng(data[i].lat,data[i].lng)
            createMarker(latlng, data[i].address, data[i].operation);
        }
});
</script>



<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBfZ3hsTdc5DDfx1IBQlh05N-re23793BU&callback=myMap"></script>
