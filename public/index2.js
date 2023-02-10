let map;

let phintraco = { lat: -6.224356892573455, lng: 106.84185458673466 };

let yourloc = {lat: latitude, lng: longitude };
function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: phintraco,
    zoom: 16,
  });

  const marker = new google.maps.Marker({
    position: phintraco,
    map,
    title: 'Hello World'
  });
}

window.initMap = initMap;