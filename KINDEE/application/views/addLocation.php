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
    
    let map ;
    let positionInit={
        lat: 13.312277, 
        lng: 100.532970
    }
    //13.312277, 100.532970 center of thailand 
    let mapInitOption={
        center : positionInit, 
        zoom : 1
    }
    
    let initMap = () => { // initiation map
        map = new google.maps.Map(document.getElementById('map'),positionInit)
    } // end function initMap
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2DRU-l__VeRBRsedcmeG06kMlrvYNd90&callback=initMap">
    </script>
  </body>
</html>