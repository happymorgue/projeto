<!-- <!DOCTYPE html> -->
@extends('layouts.layoutP')

@section('title', 'Cogitavi - Objetos Perdidos')

@section('content')

<section class="section-showcase text-center text-sm-start m-0 bgColor d-flex" id="myItems">
  <div class="container p-5 d-flex col-md-9 col-lg-9 col-xl-9 col-xxl-9">
    <div id="ObjetosPerdidosPolicia" class="w-100">
    <h3 class="m-4 my-2">Objetos Perdidos</h3>
    

    </div>
  </div>
  <div class="container p-5 col-md-3 col-lg-3 col-xl-3 col-xxl-3 bgColorMyItems">
    <h3 class="my-2">Objetos Achados</h2>
    <div>
      <div id="MeusObjetosAchados" class="d-flex justify-content-center row">

      </div>
      
      
    </div>
  </div>
</section>
  
@endsection



<link href="{{ asset('css/obj.css') }}" rel="stylesheet">
<script src="{{ asset('js/objPerdidosPolicia.js') }}" type="text/javascript"></script>