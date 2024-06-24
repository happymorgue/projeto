<!-- <!DOCTYPE html> -->
@extends('layouts.layoutHDL')

@section('title', 'Cogitavi - Help')

@section('content')


  <!-- Showcase --> <!-- p-padding telas pequenas, pt-padding top, lg-tela grande-->
  <section class="section-showcase text-white p-5 text-center text-sm-start d-flex" style="background-image: url('{{ asset('img3.jpg') }}'); background-size: cover; background-position: center;">
    <div class="container d-flex justify-content-center">
      <div class="d-md-flex align-items-center justify-content-between col-5 aling-self-center" id="section">
        <div class="quadrado-showcase w-100">
          <h1 class="title" style="--duration: 1s">
          <span style="--delay: 0.5s"> Encontre o perdido, </span>
          <span style="--delay: 0.8s"> Recupere o achado. </span>
          </h1>
          <p class="lead my-3">
            Encontre o seu objeto perdido!
          </p>
         
          
        </div>
      </div>
    </div>
  </section>

  @endsection

  <link href="{{ asset('css/home.css') }}" rel="stylesheet">


