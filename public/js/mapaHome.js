function myMap() {
    console.log("OLA");
    mapboxgl.accessToken = 'pk.eyJ1IjoiYmV0dWxpZWUiLCJhIjoiY2x4MGRscnMxMDNzcjJrczhybDk0OGY4NiJ9.jbj9XvMN9mbvv2T5kfOElg';
    const map = new mapboxgl.Map({
      container: 'map',
      style: 'mapbox://styles/mapbox/streets-v9',
      projection: 'globe', // Display the map as a globe, since satellite-v9 defaults to Mercator
      zoom: 7,
      center: [-9.1393,38.7223]
      });
  
      map.addControl(new mapboxgl.NavigationControl());
      map.scrollZoom.disable();
  
      map.on('style.load', () => {
          map.setFog({}); // Set the default atmosphere style
      });
      /*var mapProp = {
          center: new google.maps.LatLng(38.7223, -9.1393), // Coordenadas de Lisboa
          zoom: 10,
      };
      var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);*/
  }
  myMap();
  