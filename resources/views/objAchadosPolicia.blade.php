<!-- <!DOCTYPE html> -->
@extends('layouts.layoutP')

@section('title', 'Cogitavi - Objetos Achados')

@section('content')

<section class="section-showcase text-center text-sm-start m-0 bgColor d-flex align-items-center" id="myItems">
  <div class="w-100">
    <div class="p-2 d-flex align-items-center justify-content-center w-100 bgColorMyItems border">
      <h4 class="px-2 pt-1">Encontrou outro objeto que não aparece aqui?</h3>
      <a href="/registarObjAchado" class="btn btn-primary d-block px-2 mx-3">Adicionar Objeto Achado</a>
    </div>

    <div class="p-5 d-flex w-100 bgColor">
      <div id="objetosCorrespondentesPolicia" class="w-100">
          <h3>Achados e Perdidos Correspondentes</h3>
          <hr>


      </div>
    </div>

    <div class="p-5 d-flex w-100 bgColor">
      <div id="objetosAchadosPolicia" class="w-100">
          <h3>Meus Objetos Achados</h3>
          <hr>


      </div>
    </div>
    
  </div>

</section>
  

@endsection


<script src="{{ asset('js/objsAchadosPolicia.js') }}" type="text/javascript"></script>
<link href="{{ asset('css/objPerdidos.css') }}" rel="stylesheet">