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
