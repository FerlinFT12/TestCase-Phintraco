<html>
  <head>
    <title>Simple Map</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <link rel="stylesheet" type="text/css" href="{{ asset('style2.css') }} " />
    <!-- <script type="module" src="{{ asset('index3.js') }} "></script> -->
  </head>
  <body>
    <button onclick="getloc()">Get Loc</button>
    
    <div id="map" style="width:100%;height:500px;"></div>
    
    <div id="msg">s</div>
    <button id="btncheckin">Check In</button>
    <div id="komentar"></div>

    <!-- 
      The `defer` attribute causes the callback to execute after the full HTML
      document has been parsed. For non-blocking uses, avoiding race conditions,
      and consistent behavior across   browsers, consider loading using Promises
      with https://www.npmjs.com/package/@googlemaps/js-api-loader.
      -->

    <script>
        
        function getloc() {
            var x = document.getElementById("demo");
            if (navigator.geolocation) {
              navigator.geolocation.getCurrentPosition(showPosition);
            } else { 
              x.innerHTML = "Geolocation tidak didukung oleh browser ini.";
            }
        }
    </script>


    <script>
        var x = document.getElementById("demo");
        var y = document.getElementById("demo2");
     
        // function getLocation() {
        //   if (navigator.geolocation) {
        //     navigator.geolocation.getCurrentPosition(showPosition);
        //   } else { 
        //     x.innerHTML = "Geolocation tidak didukung oleh browser ini.";
        //   }
        // }
        function haversine_distance(mk1, mk2) {
            var R = 3958.8; // Radius of the Earth in miles
            var rlat1 = mk1.position.lat() * (Math.PI/180); // Convert degrees to radians
            var rlat2 = mk2.position.lat() * (Math.PI/180); // Convert degrees to radians
            var difflat = rlat2-rlat1; // Radian difference (latitudes)
            var difflon = (mk2.position.lng()-mk1.position.lng()) * (Math.PI/180); // Radian difference (longitudes)
            
            var d = 2 * R * Math.asin(Math.sqrt(Math.sin(difflat/2)*Math.sin(difflat/2)+Math.cos(rlat1)*Math.cos(rlat2)*Math.sin(difflon/2)*Math.sin(difflon/2)));
            return d;
        }

    function showPosition(position) {
        lat = position.coords.latitude;
        lon = position.coords.longitude;
        latlon = {lat: lat, lng: lon}
        var user = {lat:-6.184508853459494 , lng: 106.8311744556733 };
        const METERS_IN_MILE = 1609.344;
        var locs = latlon;
        var diameter = 200;

        const mitrasejati = new google.maps.LatLng(-6.224312411632266, 106.84196641817114);
        // const mitrasejati = new google.maps.LatLng(-6.2264813301483475, 106.8483530233136);
        // -6.2264813301483475, 106.8483530233136
        //create the map
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 16,
            center: mitrasejati
        });

        const marker = new google.maps.Marker({
            position: mitrasejati,
            map,
            title: 'Hello World'
        });

        const marker2 = new google.maps.Marker({
            position: locs,
            map,
            title: 'Hello World 2'
        });

        const infoWindow = new google.maps.InfoWindow({
            content: "<p>Lat Long PT. Mitra Sejati Pertama</p>",
            ariaLabel: "Mitra Sejati Pertama"
        });

        const infoWindowgeo = new google.maps.InfoWindow({
            content: "<p>Lat Long User</p>",
            ariaLabel: "User"
        });

        marker.addListener("click", () => {
            infoWindow.open({
            anchor: marker,
            map
            });
        });

        marker2.addListener("click", () => {
            infoWindowgeo.open({
            anchor: marker2,
            map
            });
        });

          // The markers for The Dakota and The Frick Collection
        var mk1 = new google.maps.Marker({position: mitrasejati, map: map});
        var mk2 = new google.maps.Marker({position: locs, map: map});

        //draw a line showing the straight distance between the markers
        var line = new google.maps.Polyline({
            path: [mitrasejati, locs],
            map: map
        });
    
         // Calculate and display the distance between markers
         var distance = haversine_distance(mk1, mk2);
         var jarak_in_m = distance.toFixed(2) * METERS_IN_MILE;
         document.getElementById('msg').innerHTML = "Distance between markers: " + distance.toFixed(2) + " mi atau "+jarak_in_m +" meter. lat : ";

         if(jarak_in_m > 25) {
            document.getElementById("btncheckin").disabled = true;
            document.getElementById("komentar").innerHTML = "Jarak Anda Jauh dari Radius Kantor";
         }


        // var usermenko = {lat:-6.1694498469866295 , lng: 106.8378371553251 };
        //(diameter 100 nggak sampek pintu masuk depat tempat mobil biasanya nurunin)
        // var usermenko = {lat:-6.169785615408362, lng: 106.83720165493625 }; 
        //   // (kalau diameter 100 nggak sampek deputi bidang koordinasi kerjasama, kalau 120 sampek)
        //   var usermenko = {lat:-6.169630948351483, lng: 106.83754229546858 }; 
        //   //(diameter 100 sudah menjangkau bagian depan pintu masuk dan deputi bidang koordinasi kerjasama)
        //   var locs = latlon;
        //   var diametermenko = 140;
        
        //   var myOptions = {
        //       center:locs,
        //       zoom:16,
        //       mapTypeId:google.maps.MapTypeId.ROADMAP
        //   }
        
        //   var map = new google.maps.Map(document.getElementById("map"), myOptions); //membuat peta lokasi
        //   var user_marker = new google.maps.Marker({ //membuat marker pada peta
        //       position:locs,
        //       map:map,
        //       title:"You are here!"
        //   });
        //   const namapegawai = '<p>test admin</p>';
        //   const infowindow = new google.maps.InfoWindow({
        //       content: namapegawai,
        //   });
        
        //   user_marker.addListener("click",()=> {
        //       infowindow.open(map,user_marker);
        //   });
        //   var cityCircle = new google.maps.Circle({ //created a circle to mark the radius
        //         strokeColor: '#FF0000',
        //         strokeOpacity: 0.8,
        //         strokeWeight: 2,
        //         fillColor: '#FF0000',
        //         fillOpacity: 0.35,
        //         map: map,
        //         center: user,
        //         radius: diameter,
        //         clickable: false
        //     });

        //   var menkoCircle = new google.maps.Circle({ //created a circle to mark the radius
        //         strokeColor: '#FF0000',
        //         strokeOpacity: 0.8,
        //         strokeWeight: 2,
        //         fillColor: '#FF0000',
        //         fillOpacity: 0.35,
        //         map: map,
        //         center: usermenko,
        //         radius: diametermenko,
        //         clickable: false
        //     });
        
        //   x.innerHTML = "<input type=\"hidden\" name=\"latitude\" id=\"latitude\" value="+position.coords.latitude+"><br><input type=\"hidden\" name=\"longitude\" id=\"longitude\" value="+position.coords.longitude+">";
        //   var z = arePointsNear(user, locs, diameter);
        //   console.log(locs);
        //   if(z){ //jika n ada, artinya di dalam circle
        //             marker = new google.maps.Marker({
        //                 map: map,
        //                 position: locs,
        //                 label: {
        //                 text:"I", //marking all jobs inside radius with I
        //                 color:"white"
        //                 }
        //             });
        //             y.innerHTML = "<input type=\"text\" name=\"jarak\" id=\"jarak\" value="+z+">";
        //         } else { //jika n tidak ada, artinya di diluar circle
        //             // marker = new google.maps.Marker({
        //             //     map: map,
        //             //     position: locs,
        //             //     label: {
        //             //     text:"O", //marking all jobs outside radius with O
        //             //     color:"white"
        //             //     }
        //             // });
        //             // y.innerHTML = "<input type=\"text\" name=\"jarak\" id=\"jarak\" value="+z+">";

        //             window.alert("Anda tidak bisa absen WFO jika lokasi di luar radius");
        //         }
    }

    

        
</script>

    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBI9geoJuf4e93KofgYT4pqT_Po3xtW4yg&libraries=places&callback=initialize"
      defer
    ></script>

  </body>
</html>