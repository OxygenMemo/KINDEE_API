
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
    var map;
    var service;
    var infowindow;
    
    function initialize() {
      var pyrmont = new google.maps.LatLng(-33.8665433,151.1956316);
    
      map = new google.maps.Map(document.getElementById('map'), {
          center: pyrmont,
          zoom: 15
        });
    
      var request = {
        location: pyrmont,
        radius: '500',
        type: ['restaurant']
      };
    
      service = new google.maps.places.PlacesService(map);
      service.nearbySearch(request, callback);
    }
    
    function callback(results, status) {
      if (status == google.maps.places.PlacesServiceStatus.OK) {
        for (var i = 0; i < results.length; i++) {
          var place = results[i];
          createMarker(results[i]);
        }
      }
    }
      <?php 
        foreach($json as $key){
            echo "console.log($key->id);";
      ?>
      
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