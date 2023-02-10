let map, infoWindow;
const METERS_IN_MILE = 1609.344;

function gantilat() {
  var xxx = document.getElementById("latgeo").value;
  document.getElementById("mapcanvas").innerHTML = "You selected: " + xxx;
}

function initMap() {

  //latlong phincon,
  
  const getLat = document.getElementById("latgeo").value;
  const getLong = document.getElementById("longgeo").value;
  
  // PT. Mitra Sejati Perttama
  const mitrasejati = new google.maps.LatLng(-6.224312411632266, 106.84196641817114);
  // const phincon = new google.maps.LatLng(-6.224356892573455, 106.84185458673466);
  const westhouse = {lat: -6.223992821574542, lng: 106.82151029590031}; // , 106.84188308401414
  //create the map
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 14,
    center: mitrasejati
  });

  const marker = new google.maps.Marker({
    position: mitrasejati,
    map,
    title: 'Hello World'
  });

  const marker2 = new google.maps.Marker({
    position: westhouse,
    map,
    title: 'Hello World 2'
  });
  
  const infoWindow = new google.maps.InfoWindow({
    content: "<p>Lat Long PT. Mitra Sejati Pertama</p>",
    ariaLabel: "Mitra Sejati Pertama"
  });
  
  const infoWindowgeo = new google.maps.InfoWindow({
    content: "<p>Lat Long WestHouse</p>",
    ariaLabel: "WestHouse"
  });

  //saat marker diklik
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
  })

  // The markers for The Dakota and The Frick Collection
  var mk1 = new google.maps.Marker({position: mitrasejati, map: map});
  var mk2 = new google.maps.Marker({position: westhouse, map: map});

  //draw a line showing the straight distance between the markers
  var line = new google.maps.Polyline({
      path: [mitrasejati, westhouse],
      map: map
  });

  // Calculate and display the distance between markers
  var distance = haversine_distance(mk1, mk2);
  var jarak_in_m = distance.toFixed(2) * METERS_IN_MILE;
  document.getElementById('msg').innerHTML = "Distance between markers: " + distance.toFixed(2) + " mi atau "+jarak_in_m +" meter. lat : ";

  // const cityCircle = new google.maps.Circle({
  //   strokeColor: "#FF0000",
  //   strokeOpacity: 0.8,
  //   strokeWeight: 2,
  //   fillColor: "#FF0000",
  //   fillOpacity: 0.35,
  //   map,
  //   center: phincon,
  //   radius: 100,
  // })


  const coordInfoWindow = new google.maps.infoWindow();

  // infoWindow = new google.maps.InfoWindow();

  // const locationButton = document.createElement("button");

  // locationButton.textContent = "Pan to Current Location";
  // locationButton.classList.add("custom-map-control-button");
  // map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
  // locationButton.addEventListener("click", () => {
  //   // Try HTML5 geolocation.
  //   if (navigator.geolocation) {
  //     navigator.geolocation.getCurrentPosition(
  //       (position) => {
  //         const pos = {
  //           lat: position.coords.latitude,
  //           lng: position.coords.longitude,
  //         };

  //         infoWindow.setPosition(pos);
  //         infoWindow.setContent("Location found.");
  //         infoWindow.open(map);
  //         map.setCenter(pos);
  //       },
  //       () => {
  //         handleLocationError(true, infoWindow, map.getCenter());
  //       }
  //     );
  //   } else {
  //     // Browser doesn't support Geolocation
  //     handleLocationError(false, infoWindow, map.getCenter());
  //   }
  // });

  //the marker, positioned at phincon
  // const marker = new google.maps.Marker({
  //   position: phincon,
  //   map: map
  // });
}



function haversine_distance(mk1, mk2) {
  var R = 3958.8; // Radius of the Earth in miles
  var rlat1 = mk1.position.lat() * (Math.PI/180); // Convert degrees to radians
  var rlat2 = mk2.position.lat() * (Math.PI/180); // Convert degrees to radians
  var difflat = rlat2-rlat1; // Radian difference (latitudes)
  var difflon = (mk2.position.lng()-mk1.position.lng()) * (Math.PI/180); // Radian difference (longitudes)

  var d = 2 * R * Math.asin(Math.sqrt(Math.sin(difflat/2)*Math.sin(difflat/2)+Math.cos(rlat1)*Math.cos(rlat2)*Math.sin(difflon/2)*Math.sin(difflon/2)));
  return d;
}

var btn_checkin = document.getElementById("btn_checkin").disabled;

// function handleLocationError(browserHasGeolocation, infoWindow, pos) {
//   infoWindow.setPosition(pos);
//   infoWindow.setContent(
//     browserHasGeolocation
//       ? "Error: The Geolocation service failed."
//       : "Error: Your browser doesn't support geolocation."
//   );
//   infoWindow.open(map);
// }

window.initMap = initMap;
