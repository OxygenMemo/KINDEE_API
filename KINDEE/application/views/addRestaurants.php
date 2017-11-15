<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
       #map {
        height: 300px;
        width: 100%;
       }
       #floating-panel {
        position: absolute;
        top: 10px;
        left: 10px;
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
  <div class="container">
    <div class="col-sm-12">
    <h3>My Google Maps Demo</h3>
    <div id="floating-panel">
      
     <input type="button" onclick="myLocation()" value="myLocation">
    </div>
    <div id="map"></div>
    <div class="col-sm-2"></div>
    <div class="col-sm-10">
    <?php echo form_open("/Controller_Location/addRestaurants"); ?>
    
      <label for="Res_lat" /> Longitude </label>
      <input id="Res_lat" name="Res_lat" type="text" value="<?php echo set_value('Res_lat'); ?>"/>
      <?php echo form_error('Res_lat'); ?>
      <br>
      <label for="Res_lng" /> Longitude </label>
      <input id="Res_lng" name="Res_lng" type="text" value="<?php echo set_value('Res_lng'); ?>" /> 
      <?php echo form_error('Res_lng'); ?>
    
      <br>
      <h3>Restaurant</h3>
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
        </div>
        </div>
    </div>
    <script>
      var markers = [];
      var markersRes = [];
      var infoWindows = [];
      var map;
      function initMap() {//13.28642,100.9252583
        var uluru = {lat: 13.28642, lng: 100.9252583};
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 8,
          center: uluru
        });
        <?php
        $count=0;
        foreach($Restaurants as $row){
        echo "markersRes.push(";
        echo "new google.maps.Marker({";
        echo "map : map,";
        //echo "icon : './img_pin/mepin.png',";
        echo "title : '$row->Res_name',";
        echo "position : {lat: $row->Res_lat , lng: $row->Res_lng}";
        echo "})";
        echo ");";
        ?>
        infoWindows.push(new google.maps.InfoWindow({
              content: "<?php echo "<h2 class='infohead'>$row->Res_name</h2><p>$row->Res_detail</p>"; ?>"
              }) 
        );
        markersRes[<?php echo $count; ?>].addListener('click', function() {
          infoWindows[<?php echo $count; ?>].open(map, markersRes[<?php echo $count; ?>]);
        });

        <?php
        $count++;
        }// close foreach
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
            position : location,
            icon : "http://angsila.cs.buu.ac.th/~58160698/IMG/map-marker-with-a-person-shape.png"
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