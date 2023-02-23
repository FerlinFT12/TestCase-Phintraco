<html>
  <head>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBI9geoJuf4e93KofgYT4pqT_Po3xtW4yg"></script>
    <script>
      var map;
      var marker;
      var circle;
      var radius = 25; // radius dalam meter

      function initialize() {
        var center = new google.maps.LatLng(-6.2261146667000515, 106.84783944907343);
        map = new google.maps.Map(document.getElementById("map"), {
          center: center,
          zoom: 15
        });

        marker = new google.maps.Marker({
          position: center,
          map: map
        });

        circle = new google.maps.Circle({
          strokeColor: "#0000FF",
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: "#0000FF",
          fillOpacity: 0.35,
          map: map,
          center: center,
          radius: radius
        });
      }

      function getLocation() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(showPosition);
        } else {
          alert("Geolocation is not supported by this browser.");
        }
      }

      function showPosition(position) {
        var pos = new google.maps.LatLng(
          position.coords.latitude,
          position.coords.longitude
        );

        marker.setPosition(pos);
        map.setCenter(pos);

        var distance = google.maps.geometry.spherical.computeDistanceBetween(
          pos,
          circle.getCenter()
        );

        if (distance > circle.getRadius()) {
          document.getElementById("checkin").disabled = true;
          alert("You are outside the radius. Cannot check in.");
        } else {
          document.getElementById("checkin").disabled = false;
          alert("You are inside the radius. You can check in.");
        }
      }

      google.maps.event.addDomListener(window, "load", initialize);
    </script>
  </head>
  <body>
    <button onclick="getLocation()">Get My Location</button>
    <button id="checkin" disabled>Check In</button>
    <div id="map" style="width:500px;height:500px;"></div>
  </body>
</html>