// map.js

mapboxgl.accessToken = 'pk.eyJ1IjoiYmV0dWxpZWUiLCJhIjoiY2x4MGRscnMxMDNzcjJrczhybDk0OGY4NiJ9.jbj9XvMN9mbvv2T5kfOElg';

var map = new mapboxgl.Map({
  container: 'map',
  style: 'mapbox://styles/mapbox/streets-v11',
  center: [-9.1393, 38.7223],
  zoom: 9
});

var marker;

function updateLocationName(coordinates) {
  var reverseGeocodeURL = 'https://api.mapbox.com/geocoding/v5/mapbox.places/' + coordinates.lng + ',' + coordinates.lat + '.json?access_token=' + mapboxgl.accessToken;

  fetch(reverseGeocodeURL)
    .then(response => response.json())
    .then(data => {
      var locationName = data.features[0].place_name;
      document.getElementById('local').innerText = locationName;
    })
    .catch(error => {
      console.error('Error fetching location name:', error);
    });
}

// Add a marker when the user clicks on the map
map.on('click', function(e) {
  var coordinates = e.lngLat;
  if (marker) {
    marker.remove();
  }
  marker = new mapboxgl.Marker()
    .setLngLat(coordinates)
    .addTo(map);
  
  clickedLocation = coordinates;  // Save the coordinates in the global variable

  localStorage.setItem('savedCoordinates', JSON.stringify(coordinates));

  updateLocationName(coordinates);  // Update the location name for the clicked coordinates
});
