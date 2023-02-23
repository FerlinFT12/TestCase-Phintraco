<html>
  <head>
    <title>Simple Map</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }} " />
    <script type="module" src="{{ asset('indextes.js') }} "></script>
    <script type="module" src="{{ asset('index.js') }} "></script>
  </head>
  <body>
    <button onclick="getLocation()">Deteksi Lokasi Anda</button>

    <form action="{{route ('presensi.store') }}" method="POST">
      @csrf
    Lat : <input type="text" name="latgeo" id="latgeo" onchange="gantilat()">
    Long : <input type="text" name="longgeo" id="longgeo">

    <button type="submit" id="btn_checkin">Check In</button>
    </form>

    
    <p id="demo"></p>

    <div id="map"></div>
    <!-- maps after ddetect lokasi -->
    <p id="mapcanvas">12</p>

    <div id="msg"></div>

    <!-- 
      The `defer` attribute causes the callback to execute after the full HTML
      document has been parsed. For non-blocking uses, avoiding race conditions,
      and consistent behavior across   browsers, consider loading using Promises
      with https://www.npmjs.com/package/@googlemaps/js-api-loader.
      -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBI9geoJuf4e93KofgYT4pqT_Po3xtW4yg&callback=initMap&v=weekly";
      defer
      ></script>

      <!-- https://maps.googleapis.com/maps/api/js?key=AIzaSyBI9geoJuf4e93KofgYT4pqT_Po3xtW4yg&libraries=places&callback=initialize" -->

    <script>
      var x = document.getElementById("demo");

      function getLocation() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(showPosition);
        } else { 
          x.innerHTML = "Geolocation is not supported by this browser.";
        }
      }

      function showPosition(position) {
        x.innerHTML = "Latitude: " + position.coords.latitude + 
        "<br>Longitude: " + position.coords.longitude;
        document.getElementById("latgeo").value= position.coords.latitude;
        document.getElementById("longgeo").value= position.coords.longitude;
        var mylat = position.coords.latitude;
        var mylong = position.coords.longitude;        
      }

      
    </script>
  </body>
</html>