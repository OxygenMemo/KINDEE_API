<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <style>
       #map {
        height: 400px;
        width: 100%;
       }
       #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }

    </style>
  </head>
  <body>
    <h3>My Google Maps Demo</h3>
    <div id="floating-panel">
      <input type="button" onclick="myLocation()" value="myLocation">
    </div>
    <div id="map"></div>
    
    <form>
      <label for="lat" /> Longitude </label>
      <input id="lat" name="lat" type="text" />
      <br>
      <label for="lng" /> Longitude </label>
      <input id="lng" name="lng" type="text" /> 
      <br>
      <label for="Res_name" /> Name </label>
      <input id="Res_name" name="Res_name" type="text" >
      <br>
      Detail <br>
      <textarea id="Res_detail" name="Res_detail" cols="30" rows="5"></textarea>
      <select>
        <?php
          foreach($Types as $row){
            echo "<option>$row->id</option>";
          }
        ?>
      </select>
      <input type="submit" />
    </form>
    <script>
      var markers = [];
      var map;
      function initMap() {//13.28642,100.9252583
        var uluru = {lat: 13.28642, lng: 100.9252583};
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 8,
          center: uluru
        });
        
        map.addListener("click",function(event){
          showLatLng(event.latLng);
          marker(map,event.latLng);
        });
      }
      function setAllMarker(map){
        for(var i = 0 ; i < markers.length ; i++){
            markers[i].setMap(map);
        }
      }
      function marker(map,location){
        setAllMarker(null);
        markers = [];
        markers.push(
          new google.maps.Marker({
            map : map,
            position : location
          })
        );
      }
      function myLocation(){
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            
            document.getElementById("lat").value = pos.lat;
            document.getElementById("lng").value = pos.lng;

            marker(map,pos);
            map.setZoom(18);
            map.setCenter(pos);
          }, function() {
            alert("error");
          });
        } else {
          // Browser doesn't support Geolocation
          alert("error");
        }
        
      }

      function showLatLng(location){
        document.getElementById("lat").value = location.lat();
        document.getElementById("lng").value = location.lng();
      }

    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXvLP913yXWox7MnNDgm7sVwtDpqZpCTM&callback=initMap">
    </script>
  </body>
</html>