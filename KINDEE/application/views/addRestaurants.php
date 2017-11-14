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
    
    <?php echo form_open("/Controller_Location/addRestaurants"); ?>
      <label for="Res_lat" /> Longitude </label>
      <input id="Res_lat" name="Res_lat" type="text" value="<?php echo set_value('Res_lat'); ?>"/>
      <?php echo form_error('Res_lat'); ?>
      <br>
      <label for="Res_lng" /> Longitude </label>
      <input id="Res_lng" name="Res_lng" type="text" value="<?php echo set_value('Res_lng'); ?>" /> 
      <?php echo form_error('Res_lng'); ?>
      <br>
      <label for="Res_name" /> Name </label>
      <input id="Res_name" name="Res_name" type="text" <?php echo set_value('Ras_name'); ?> />
      <?php echo form_error('Res_name'); ?>
      <br>
      Detail <br>
      <textarea id="Res_detail" name="Res_detail" cols="30" rows="5" value="<?php echo set_value('Res_detail'); ?>"></textarea>
      <?php echo form_error('Res_detail'); ?>
      <br>
      <select name="Type_id">
        <?php
          foreach($Types as $row){
            echo "<option value='$row->Type_id'>$row->Type_name</option>";
          }
        ?>
      </select>
      <input type="submit" />
      
    </form>
    <script>
      var markers = [];
      var markersRes = [];
      var map;
      function initMap() {//13.28642,100.9252583
        var uluru = {lat: 13.28642, lng: 100.9252583};
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 8,
          center: uluru
        });
        <?php
        foreach($Restaurants as $row){
        echo "markersRes.push(";
        echo "new google.maps.Marker({";
        echo "map : map,";
        echo "position : {lat: $row->Res_lat , lng: $row->Res_lng},";
        echo "icon : './img_pin/mepin.png'";
        echo "})";
        echo ");";
        }
        ?>
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
            
            document.getElementById("Res_lat").value = pos.lat;
            document.getElementById("Res_lng").value = pos.lng;

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
        document.getElementById("Res_lat").value = location.lat();
        document.getElementById("Res_lng").value = location.lng();
      }

    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXvLP913yXWox7MnNDgm7sVwtDpqZpCTM&callback=initMap">
    </script>
  </body>
</html>