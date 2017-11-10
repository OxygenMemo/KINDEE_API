
<!DOCTYPE html >
<head>
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
  <title>Using MySQL and PHP with Google Maps</title>
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
</head>

<body>
  <div id="map"></div>

  <script>
    var customLabel = {
      restaurant: {
        label: 'R'
      },
      bar: {
        label: 'B'
      }
    };
      function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        center: new google.maps.LatLng(-33.863276, 151.207977),
        zoom: 12
      });
      var infoWindow = new google.maps.InfoWindow;
      <?php 
        foreach($json as $key){
            echo "console.log($key->id);";
      ?>
      var point = new google.maps.LatLng(
                  parseFloat(<?php echo $key->lat ?>),
                  parseFloat(<?php echo $key->lng ?>)
                  );
    var type = "<?= $key->type ?>";
    var name ="<?= $key->name ?>";
    var address = "<?= $key->address ?>";
    var infowincontent = document.createElement('div');
    var strong = document.createElement('strong');
    //strong.textContent = name;
    //infowincontent.appendChild(strong);
    //infowincontent.appendChild(document.createElement('br'));
    //var text = document.createElement('text');
    //text.textContent = address;
    //infowincontent.appendChild(text);

    var icon = customLabel["<?= $key->type ?>"] || {};
    var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
        });
        //marker.addListener('click', function() {
         //       infoWindow.setContent(infowincontent);
           //     infoWindow.open(map, marker);
             // });


        <?php
            }
        ?>
      };
      

    function doNothing() {}
  </script>
  <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAphuRsdvr7I3-ry-fo3hQvTX-WFXgNR9Q&callback=initMap">
  </script>
</body>
</html>