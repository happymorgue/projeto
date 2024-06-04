<!-- <!DOCTYPE html> -->
@extends('layouts.layoutP')

@section('title', 'Cogitavi - Início Policia')

@section('content')
  
<div id="carouselExampleIndicators" class="carousel slide">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <!-- Showcase/Procurar Objetos Perdidos --> <!-- p-padding telas pequenas, pt-padding top, lg-tela grande-->
          <section class="section-showcase text-white p-5 text-center text-sm-start d-flex" style="background-image: url('{{ asset('img3.jpg') }}'); background-size: cover; background-position: center;">
            <div class="container d-flex justify-content-center p-5">
              <div class="d-md-flex align-items-center justify-content-between col-8-sm col-5-lg aling-self-center" id="section">
                <div class="quadrado-showcase w-100">
                  <h1 class="title" style="--duration: 1s">
                  <span style="--delay: 0.5s"> Encontre o perdido, </span>
                  <span style="--delay: 0.8s"> Recupere o achado. </span>
                  </h1>
                  <p class="lead my-3">
                    Registe um objeto achado!
                  </p>
                  <a href="/registarObjAchado" id="">
                    <button class="btn btn_vender btn-lg">  
                      Registar
                    </button>
                  </a>
                </div>
              </div>
              <div class="separate"></div>
            </div>
          </section>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <div id="empresas" class="p-5 text-center">
    <h3>Algumas das empresas que trabalhamos com:</h3>
    <div id="carouselContainer2" class="carousel-container2">
        <div class="carousel2">
            <img class="img-thumbnail border-0" src="empresa1.png" alt="Empresa 1">
            <img class="img-thumbnail border-0" src="empresa2.webp" alt="Empresa 2">
            <img class="img-thumbnail border-0" src="empresa3.jpg" alt="Empresa 3">
        </div>
    </div>
</div>

    <div class="col-md">
        <div id="googleMap" style="width:100%;height:400px;"></div>
    </div>


    <!-- js -->
    <link href="https://api.mapbox.com/mapbox-gl-js/v3.4.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v3.4.0/mapbox-gl.js"></script>

    <script>
    function myMap() {
      console.log("OLA");
      mapboxgl.accessToken = 'pk.eyJ1IjoiYmV0dWxpZWUiLCJhIjoiY2x4MGRscnMxMDNzcjJrczhybDk0OGY4NiJ9.jbj9XvMN9mbvv2T5kfOElg';
      const map = new mapboxgl.Map({
        container: 'googleMap',
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
</script>
  @endsection

  <link href="{{ asset('css/home.css') }}" rel="stylesheet">