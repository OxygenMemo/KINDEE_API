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
    
    var map ;
    var positionInit=new google.maps.LatLng(13.312277,100.532970)
    //13.312277, 100.532970 center of thailand 
    var mapInitOption={
        center : positionInit, 
        zoom : 1
    }
    
    function initMap(){ // initiation map
        map = new google.maps.Map(document.getElementById('map'),mapInitOption)
    } // end function initMap
    </script>

    <script 
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgokaRckiDebtd66ozVnQqskRnZAqlobo-JZEo&callback=initMap" async defer>
    </script>

  </body>
</html>