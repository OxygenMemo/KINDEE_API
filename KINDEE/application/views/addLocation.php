
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
      height: 100%;s
      margin: 0;
      padding: 0;
    }
  </style>
  <script src="./script/callmap.js"></script>
</head>

<body>
  <div id="map"></div>
  <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAphuRsdvr7I3-ry-fo3hQvTX-WFXgNR9Q&callback=initMap">
  </script>
</body>
</html>