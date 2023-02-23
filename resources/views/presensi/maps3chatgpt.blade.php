<!DOCTYPE html>
<html>
  <head>
    <title>Jarak 2 Titik menggunakan Polyline</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAikhJ7qMc5pZol7d7b0kGfMNX5wRUQYxo"></script>
    <script>
      function initMap() {
        var pointA = new google.maps.LatLng(-6.224445579179857, 106.84187633169648),
        pointB = new google.maps.LatLng(-6.224362920906273, 106.84185889731522),
        myOptions = {
          zoom: 7,
          center: pointA
        },
        map = new google.maps.Map(document.getElementById('map'), myOptions),
        // Instantiate a directions service.
        directionsService = new google.maps.DirectionsService,
        directionsDisplay = new google.maps.DirectionsRenderer({
          map: map
        }),
        markerA = new google.maps.Marker({
          position: pointA,
          title: "point A",
          label: "A",
          map: map
        }),
        markerB = new google.maps.Marker({
          position: pointB,
          title: "point B",
          label: "B",
          map: map
        });

        // Get route from A to B
        calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB);
      }

      function calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB) {
        directionsService.route({
          origin: pointA,
          destination: pointB,
          travelMode: google.maps.TravelMode.DRIVING
        }, function(response, status) {
          if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
            var point = response.routes[0].legs[0];
            console.log("Jarak dari A ke B adalah: " + point.distance.text);
            document.getElementById("distance").innerHTML = "Jarak dari A ke B adalah: " + point.distance.text;
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
    </script>
  </head>
  <body onload="initMap()">
    <div id="map" style="height: 500px; width: 100%"></div>
    <p id="distance"></p>
  </body>
</html>