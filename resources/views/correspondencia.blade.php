<!-- <!DOCTYPE html> -->
@extends('layouts.layoutP')

@section('title', 'Cogitavi - Nova Correspondência')

@section('content')
<section class="section-showcase text-center text-sm-start m-0 bgColor d-flex align-items-center" id="myItems">
  <div class="w-100">

    <div class="p-5 d-flex w-100 bgColor">
      <div id="ObjetoCorresponder" class="w-100">
      <h3>Objeto Perdido a ser Correspondido</h3>
      <hr>
        <div class="row d-flex justify-content-around"> 
          <div class="card objetoCorresp shadow-1 border rounded-3 col-md-3 m-1 my-3">
            <div class="card-body m-0 pt-2">
              <div class="w-100 m-0 p-0">
                 <img class="img-thumbnail border-0" src="calcas.jpg">
                <div class="text-start">
                  <h5 class="card-title">Calças</h5>
                   <h6 class="card-subtitle text-body-secondary">Faro</h6>
                   <p class="card-text">13-6-2024</p>
                 </div> 
               </div>
             </div>
           </div>
       </div>
      </div>
    </div>


    <div class="p-5 d-flex w-100 bgColor">
      <div id="MeusObjetosAchados" class="w-100">
      <h3>Meus Objetos Achados</h3>
      <h5 class="fw-light">Selecione o objeto correspondente ao perdido</h5>
      <hr>
        <!--Cada Linha de Items terá este layout-->
        <div class="row d-flex justify-content-around"> 

           <div class="card cardAchados shadow-1 border rounded-3 col-md-3 m-1 my-3">
            <div class="card-body d-flex flex-column">
              <div class="w-100">
                <img class="img-thumbnail border-0" src="calcas.jpg">
                <div class="text-start content-wrapper">
                  <h5 class="card-title">Calças</h5>
                  <h6 class="card-subtitle text-body-secondary">Faro</h6>
                  <p class="card-text">Perdido de:   a  </p>
                </div> 
              </div>
              <div class="mt-auto d-flex justify-content-end align-items-end">
                <a href="" class="btn btn-primary btn-selecionar">Selecionar</a>
              </div>
            </div>
          </div>
           
       </div>
       

      </div>
    </div>

  </div>

</section>

@endsection

<link href="{{ asset('css/correspondencia.css') }}" rel="stylesheet">
<script src="{{ asset('js/correspondencia.js') }}" type="text/javascript"></script>
