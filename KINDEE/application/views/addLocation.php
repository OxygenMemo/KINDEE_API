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
        height: 100%
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      .sizemap{
        height: 500px; 
      }
    </style>
    <script src='//maps.googleapis.com/maps/api/js'></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container">  
      <div class="col-sm-12">
        
        <div class="col-sm-10 sizemap">
          <div id="map"></div>
        </div>
        <form>
          <input type="text" >
        </form>
      </div>  
    </div>

    <script>
    
    var map;
    var markCurrent = null;
    
    var currentPosition={lat:0,lng:0}; // user location now update with 
    var zoom = {
      countrysize : 7,
      homesize : 15
    }
    
    var positionInit={
      lat : 13,
      lng : 100
    };
    //13.312277, 100.532970 center of thailand 
    var mapInitOption={
        center : positionInit, 
        zoom : zoom.countrysize
    };
    
    
    
    
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
      //console.log("gg:"+currentPosition.lat+" "+currentPosition.lng);
      
    }// end function autoload Current
    function showlocation(position){
      currentPosition = {
        lat : position.coords.latitude,
        lng : position.coords.longitude
      }
      console.log(position.coords.latitude +" "+ currentPosition.lat);
      
    }
    function addmarker(location,map){
          var mark = new google.maps.Marker({
            position : location,
            map : map
          });
        
    }
    function initMap(){ // initiation map
      console.log('Google Maps API version: ' + google.maps.version);
      autoLoadCurrentLocation();

      navigator.geolocation.getCurrentPosition(function(position){
          mapInitOption.center = {lat : position.coords.latitude,lng : position.coords.longitude}
      });
      //console.log(currentPosition.lat);
      map = new google.maps.Map(document.getElementById('map'),mapInitOption);

      google.maps.event.addListener(map, 'click', function(event) {
        addmarker(event.latLng,map);
      });
    } // end function initMap
    
    
    //alert(currentPosition.lat);

    
    </script>

    <script 
    src="https://maps.googleapis.com/maps/api/js?key= AIzaSyCo9tZvO6CghsfvS1H8mRF3TZkpEki3-DQ &callback=initMap" async defer>
    </script>

  </body>
</html>