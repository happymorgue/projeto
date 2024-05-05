<!-- <!DOCTYPE html> -->
@extends('layouts.layoutP')

@section('title', 'Cogitavi - Início Policia')

@section('content')
  
  <!-- Showcase --> <!-- p-padding telas pequenas, pt-padding top, lg-tela grande-->
  <div id="carouselExampleIndicators" class="carousel slide">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <!-- Showcase/Procurar Objetos Perdidos --> <!-- p-padding telas pequenas, pt-padding top, lg-tela grande-->
          <section class="section-showcase text-white p-5 text-center text-sm-start d-flex" style="background-image: url('{{ asset('img3.jpg') }}'); background-size: cover; background-position: center;">
            <div class="container d-flex justify-content-center">
              <div class="d-md-flex align-items-center justify-content-between col-8-sm col-5-lg aling-self-center" id="section">
                <div class="quadrado-showcase-1 w-100">
                  <h1 class="title" style="--duration: 1s">
                  <span style="--delay: 0.5s"> Encontre o perdido, </span>
                  <span style="--delay: 0.8s"> Recupere o achado. </span>
                  </h1>
                  <p class="lead my-3">
                    Encontre seu objeto perdido!
                  </p>
                  <a href="objAchados.html" id="venderProd">
                    <button class="btn btn_vender btn-lg" href="/buscaObjAchados">  
                      Procurar
                    </button>
                  </a>
                </div>
              </div>
              <div class="separate"></div>
            </div>
          </section>
        </div>
        <div class="carousel-item">
        <!-- Showcase/Licitar -->
          <section class="section-showcase text-black p-5 text-center text-sm-start d-flex" style="background-image: url('{{ asset('monies.webp') }}'); background-size: cover; background-position: center;">
            <div class="container d-flex justify-content-center">
              <div class="d-md-flex align-items-center justify-content-between col-8-sm col-5-lg aling-self-center" id="section">
                <div class="quadrado-showcase-2 w-100">
                  <h1 class="title_2" style="--duration: 1s">
                  <span style="--delay: 0.5s"> Dê uma nova </span>
                  <span style="--delay: 0.8s"> casa ao perdido. </span>
                  </h1>
                  <p class="lead my-3">
                    Compre os Itens perdidos!
                  </p>
                  <a href="" id="licitar">
                    <button class="btn btn_licitar btn-lg" href="/buscaObjAchados">  
                      Licitar
                    </button>
                  </a>
                </div>
              </div>
              <div class="separate"></div>
            </div>
          </section>
        </div>
        <div class="carousel-item">
        <!-- Showcase/no clue just leaving it in because i havent worked on carousels for long -->
          <section class="section-showcase text-black p-5 text-center text-sm-start d-flex" style="background-image: url('{{ asset('sign.png') }}'); background-size: cover; background-position: center;">
            <div class="container d-flex justify-content-center">
              <div class="d-md-flex align-items-center justify-content-between col-8-sm col-5-lg aling-self-center" id="section">
                <div class="quadrado-showcase-3 w-100">
                  <h1 class="title_3" style="--duration: 1s">
                  <span style="--delay: 0.5s"> Registe-se Agora! </span>
                  <span style="--delay: 0.8s"> Adira ao nosso site! </span>
                  </h1>
                  <p class="lead my-3">
                    É Fixe!
                  </p>
                  <a href="" id="licitar">
                    <button class="btn btn_registar btn-lg" href="/buscaObjAchados">  
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


  @endsection

  <link href="{{ asset('css/home.css') }}" rel="stylesheet">



