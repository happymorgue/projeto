// map.js

mapboxgl.accessToken = 'pk.eyJ1IjoiYmV0dWxpZWUiLCJhIjoiY2x4MGRscnMxMDNzcjJrczhybDk0OGY4NiJ9.jbj9XvMN9mbvv2T5kfOElg';

var map = new mapboxgl.Map({
  container: 'map',
  style: 'mapbox://styles/mapbox/streets-v11',
  center: [-9.1393, 38.7223],
  zoom: 9
});

var marker;

function searchLocationAndAddMarker(locationString) {
  var geocodeURL = `https://api.mapbox.com/geocoding/v5/mapbox.places/${encodeURIComponent(locationString)}.json?access_token=${mapboxgl.accessToken}&limit=1`;

  fetch(geocodeURL)
    .then(response => response.json())
    .then(data => {
      if (data.features && data.features.length > 0) {
        var coordinates = data.features[0].center; // [longitude, latitude]

        // If a marker already exists, remove it
        if (marker) {
          marker.remove();
        }

        // Create a new marker and add it to the map
        marker = new mapboxgl.Marker()
          .setLngLat(coordinates)
          .addTo(map);

        // Optionally, center the map on the new marker
        map.flyTo({ center: coordinates, zoom: 15 });
      } else {
        console.error('Location not found');
      }
    })
    .catch(error => {
      console.error('Error during geocoding:', error);
    });
}

/*function updateLocationName(coordinates) {
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
} */
