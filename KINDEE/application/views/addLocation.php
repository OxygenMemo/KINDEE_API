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
    var markCurrent = null;
    
    var currentPosition={lat:0,lng:0}; // user location now update with 
    var zoomCountrySize=7;
    var positionInit={
      lat : 13.312277,
      lng : 100.532970
    };
    //13.312277, 100.532970 center of thailand 
    var mapInitOption={
        center : positionInit, 
        zoom : zoomCountrySize
    };
    
    function initMap(){ // initiation map
      console.log('Google Maps API version: ' + google.maps.version);
      map = new google.maps.Map(document.getElementById('map'),mapInitOption);
      
      changeMarkerCurrentPosition(positionInit,map);

    } // end function initMap
    
    function getCurrentLocation(){ //get Location now user
      if(navigator){ // check permission

        navigator.geolocation.getCurrentPosition(function(position){
          currentPosition = {
            lat : position.coords.latitude,
            lng : position.coords.longitude
          }
        },function(){
            alert("Error: The Geolocation service failed");
          }
        );
      }else{//end if
          alert("Error: Your browser doesn\'t support geolocation.");
      }
    }// end function getCurrentLocation
    

    function autoLoadCurrentLocation(){ // auto load current location
      navigator.geolocation.getCurrentPosition(showlocation);
      console.log(currentPosition.lat+" "+currentPosition.lng);
      
      
      
    }// end function autoload Current
    function showlocation(position){
      currentPosition = {
        lat : position.coords.latitude,
        lng : position.coords.longitude
      }
    }
    function changeMarkerCurrentPosition(location,map){
        if(markCurrent != null){
          markCurrent.setMap(null);
        }else{
          markCurrent = new google.maps.Marker({
            position : location,
            map : map
          });
        }
    }
    getCurrentLocation();
    setInterval(function(){autoLoadCurrentLocation()},3000);
    
    
    //alert(currentPosition.lat);

    
    </script>

    <script 
    src="https://maps.googleapis.com/maps/api/js?key= AIzaSyCo9tZvO6CghsfvS1H8mRF3TZkpEki3-DQ &callback=initMap" async defer>
    </script>

  </body>
</html>