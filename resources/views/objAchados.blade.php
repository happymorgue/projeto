<!-- <!DOCTYPE html> -->
@extends('layouts.layoutDL')

@section('title', 'Cogitavi - Objetos Achados')

@section('content')
<section class="section-showcase text-center text-sm-start m-0 bgColor d-flex" id="myItems">
  <div class="container p-5 d-flex col-md-9 col-lg-9 col-xl-9 col-xxl-9">
    <div id="ObjetosEncontrados" class="w-100">
      <h3 class="m-4 my-2">Objetos Achados Por Polícias</h3>
    <!--Cada Linha de Items terá este layout
      <div class="row d-flex justify-content-around">
        Cada Item terá este layout

        <div class="card shadow-1 border rounded-3 col-md-3 m-1 my-3">
          <a href="/verObj">
            <div class="card-body m-0 pt-2">
              <div class="w-100 m-0 p-0">
                <img class="img-thumbnail border-0" src="calcas.jpg">
                <div class="text-start">
                  <h5 class="card-title">Calças</h5>
                  <h6 class="card-subtitle text-body-secondary">Faro</h6>
                  <p class="card-text">13-6-2024</p>
                  <div class="d-flex justify-content-end">
                    <a href="#" class="btn btn-primary d-flex aling-self-end">É meu!</a>
                  </div>
                </div> 
              </div>
            </a>
          </div>
        </div>
      </div>-->

    </div>
  </div>
  <div class="container p-5 col-md-3 col-lg-3 col-xl-3 col-xxl-3 bgColorMyItems">
    <h3>Meus Itens Perdidos</h2>
    <div>
      <div id="MeusObjetosPerdidos" class="d-flex justify-content-center row">
        <!--<div class="card shadow-1 border rounded-3 col-md-12 m-1 my-3">
          <div class="card-body m-0 pt-2">
            <div class="w-100 m-0 p-0">
              <img class="img-thumbnail border-0" src="calcas.jpg">
              <div class="text-start">
                <h5 class="card-title">Calças</h5>
                <h6 class="card-subtitle text-body-secondary">Faro</h6>
                <p class="card-text">13-6-2024</p>
                <div class="d-flex justify-content-end">
                  <a href="/editObjPerdidos" class="btn btn-primary d-flex aling-self-end">Editar</a>
                </div>
              </div> 
            </div>
          </div>
        </div>-->
      </div>
      
      
    </div>
  </div>
</section>
  
@endsection

<link href="{{ asset('css/obj.css') }}" rel="stylesheet">
<script src="{{ asset('js/objAchados.js') }}" type="text/javascript"></script>
