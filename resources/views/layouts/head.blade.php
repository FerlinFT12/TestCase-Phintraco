<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title }}</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }} " />
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBI9geoJuf4e93KofgYT4pqT_Po3xtW4yg"></script>
  <!-- <script
      src="https://maps.googleapis.com/maps/api/js?key="
      defer
    ></script> -->
  <!-- <script>
  function confirmPresensi() { 
    if(confirm("Apakah Anda Yakin ingin Check In di Lokasi Anda Saat ini ?")) {
      getLocation();
    } else {
      alert('Silahkan Check In Jika Lokasi Anda Sudah Tepat');
      return false;
    }
  }

  var map, marker, circle, radius = 25;

  function initialize() {
    var center = new google.maps.LatLng(-6.22436174037392, 106.8418477856633);
    map = new google.maps.Map(document.getElementById("map"), {
      center: center,
      zoom: 15
    });

    marker = new google.maps.Marker({
      position: center,
      map: map
    });

    circle = new google.maps.Circle({
      strokeColor: '#0000FF',
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: '#0000FF',
      map: map,
      center: center,
      radius: radius
    });
  }

  function getLocation() {
    if(navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition);
    } else {
      alert('Geolocation Tidak Didukung Oleh Browser Ini');
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
      pos, circle.getCenter()
    );

    if(distance > circle.getRadius()) {
      document.getElementById('checkin').disabled = true;
      alert('Kamu berada di luar radius. Tidak bisa Check In');
    } else {
      document.getElementById('checkin').disabled = false;
      alert('Kamu berada di dalam radius. Bisa Check In');
    }
  }

  google.maps.event.addDomListener(window, "load", initialize);
</script> -->

  <script>
    function confirmPresensi() { 
      if(confirm("Apakah Anda Yakin ingin Check In di Lokasi Anda Saat ini ?")) {
        getLocation();
      } else {
        alert('Silahkan Check In Jika Lokasi Anda Sudah Tepat');
        return false;
      }
    }

    function getLocation() {
      if(navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } else {
        alert('Geolocation Tidak Didukung Oleh Browser Ini');
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
        document.getElementById("latitudegeo").value= position.coords.latitude;
        document.getElementById("longitudegeo").value= position.coords.longitude;
        lat = position.coords.latitude;
        lon = position.coords.longitude;
        latlon = {lat: lat, lng: lon}
        const METERS_IN_MILE = 1609.344;
        var locs = latlon;
        var diameter = 200;

        const mitrasejati = new google.maps.LatLng(-6.226518011254657, 106.8496551693218);
        // const mitrasejati = new google.maps.LatLng(-6.2264813301483475, 106.8483530233136);
        // -6.2264813301483475, 106.8483530233136
        //create the map
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 16,
            center: mitrasejati
        });

        const marker = new google.maps.Marker({ //marker perusahaan
            position: mitrasejati,
            map,
            title: 'Hello World'
        });

        const marker2 = new google.maps.Marker({ //marker user
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
         } else if (jarak_in_m < 25 || jarak_in_m == 25) {
            document.getElementById("btncheckin").disabled = false;
            document.getElementById("komentar").innerHTML = "Silahkan Check In";
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

  <!-- <script type="module" src="{{ asset('index.js') }} "></script> -->
</head>