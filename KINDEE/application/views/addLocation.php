<!DOCTYPE html>
<html>
  <head>
    <title>Geolocation</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    <script src='//maps.googleapis.com/maps/api/js'></script>
  </head>
  <body>
    <div id="map"></div>
    <script>
      var map;
      function initMap() {

        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: {lat: -25.363882, lng: 131.044922 }
        });

        map.addListener('click', function(e) {
          placeMarkerAndPanTo(e.latLng, map);
        });
      }

      function placeMarkerAndPanTo(latLng, map) {
        var marker = new google.maps.Marker({
          position: latLng,
          map: map
        });
        map.panTo(latLng);
      }
      infoWindow = new google.maps.InfoWindow;
      var shape = {
          coords: [1, 1, 1, 20, 18, 20, 18, 1],
          type: 'poly'
        };

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var marker = new google.maps.Marker({
              position: pos,
              map: map,
              icon : "./img_pin/mepin.png",
              shape : shape
            });
            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found.');
            
            infoWindow.open(map);
            map.setZoom(1);
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }


    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAiCH89cXrEofWGXV4OjTk6nF3LXIZ2HDs&callback=initMap">
    </script>
  </body>
</html>