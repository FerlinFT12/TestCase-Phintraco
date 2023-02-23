<html>
  <head>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBI9geoJuf4e93KofgYT4pqT_Po3xtW4yg"></script>
    <script>
      var centerOfCircle = {lat: -6.2243884, lng: 106.8418832};
      var radiusOfCircle = 500; // radius dalam meter

      function checkLocation() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var currentLocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            var distance = calculateDistance(currentLocation, centerOfCircle);

            if (distance > radiusOfCircle) {
              alert("Lokasi saat ini berada diluar radius, tidak bisa melakukan check in.");
            } else {
              alert("Lokasi saat ini berada dalam radius, bisa melakukan check in.");
            }
          });
        } else {
          alert("Geolocation is not supported by this browser.");
        }
      }

      function calculateDistance(location1, location2) {
        var radlat1 = Math.PI * location1.lat/180;
        var radlat2 = Math.PI * location2.lat/180;
        var theta = location1.lng-location2.lng;
        var radtheta = Math.PI * theta/180;
        var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
        dist = Math.acos(dist);
        dist = dist * 180/Math.PI;
        dist = dist * 60 * 1.1515;
        dist = dist * 1609.34;
        return dist;
      }
    </script>
  </head>
  <body>
    <button onclick="checkLocation()">Check In</button>
  </body>
</html>