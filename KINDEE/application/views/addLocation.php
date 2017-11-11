<!DOCTYPE html>
<html>
  <head>
    <style>
       #map {
        height: 400px;
        width: 100%;
       }
    </style>
  </head>
  <body>
    <h3>My Google Maps Demo</h3>
    <div id="map"></div>
    <script>
      let map , infoWindow,pos
      function initMap() {
        var uluru = {lat: -25.363, lng: 131.044};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: uluru
        });
        
        infoWindow = new google.maps.InfoWindow;

        if(navigator.geolocation){
          navigator.geolocation.getCurrentPosition((position)=>{
            pos={
              lat : position.coords.latitude,
              lng : position.coords.longitude
            }

            infoWindow.setPosition(pos)
            infoWindow.setContent('Ho yes that work !')
            infoWindow.open(map)
            map.setCenter(pos)
          },()=>{
            handleLocationError(true, infoWindow, map.getCenter());

          });

        }//if
        else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());

        }
        
      }//init map
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
      