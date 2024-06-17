<!-- <!DOCTYPE html> -->
@extends('layouts.layoutDL')

@section('title', 'Cogitavi - Meus Objetos Perdidos')

@section('content')
<section class="section-showcase text-center text-sm-start m-0 bgColor d-flex align-items-center" id="myItems">
  <div class="w-100">
    <div class="p-2 d-flex align-items-center justify-content-center w-100 bgColorMyItems border">
      <h4 class="px-2 pt-1">Perdeu outro objeto que não aparece aqui?</h3>
      <a href="/registarObjPerdido" class="btn btn-primary d-block px-2 mx-3">Adicionar Objeto Perdido</a>
    </div>


    <div class="p-5 d-flex w-100 bgColor">
      <div id="MeusObjetosEncontrados" class="w-100">
        <h3>Meus Objetos Encontrados</h2>
        <hr>
        <!--Cada Linha de Items terá este layout-->
        <!-- <div class="row d-flex justify-content-around"> -->
<!--           Cada Item terá este layout--> 
<!--           <div class="card shadow-1 border rounded-3 col-md-3 m-1 my-3"> -->
<!--             <div class="card-body m-0 pt-2"> -->
<!--               <div class="w-100 m-0 p-0"> -->
<!--                 <img class="img-thumbnail border-0" src="calcas.jpg"> -->
<!--                 <div class="text-start"> -->
<!--                   <h5 class="card-title">Calças</h5> -->
<!--                   <h6 class="card-subtitle text-body-secondary">Faro</h6> -->
<!--                   <p class="card-text">13-6-2024</p> -->
<!--                   <div class="d-flex justify-content-end"> -->
<!--                     <a href="/editObjPerdidos" class="btn btn-primary d-flex aling-self-end">Editar</a> -->
<!--                   </div> -->
<!--                 </div>  -->
<!--               </div> -->
<!--             </div> -->
<!--           </div> -->
<!--         </div> -->
      </div>
    </div>


    <div class="p-5 d-flex w-100 bgColor">
      <div id="MeusObjetosPerdidos" class="w-100">
      <h3>Meus Objetos Perdidos</h3>
      <hr>
        <!--Cada Linha de Items terá este layout-->
        <!-- <div class="row d-flex justify-content-around"> -->
<!--           Cada Item terá este layout--> 
<!--           <div class="card shadow-1 border rounded-3 col-md-3 m-1 my-3"> -->
<!--             <div class="card-body m-0 pt-2"> -->
<!--               <div class="w-100 m-0 p-0"> -->
<!--                 <img class="img-thumbnail border-0" src="calcas.jpg"> -->
<!--                 <div class="text-start"> -->
<!--                   <h5 class="card-title">Calças</h5> -->
<!--                   <h6 class="card-subtitle text-body-secondary">Faro</h6> -->
<!--                   <p class="card-text">13-6-2024</p> -->
<!--                   <div class="d-flex justify-content-end"> -->
<!--                     <a href="/editObjPerdidos" class="btn btn-primary d-flex aling-self-end">Editar</a> -->
<!--                   </div> -->
<!--                 </div>  -->
<!--               </div> -->
<!--             </div> -->
<!--           </div> -->
<!--         </div> -->
      </div>
    </div>
  </div>

</section>

@endsection

<link href="{{ asset('css/objPerdidos.css') }}" rel="stylesheet">
<script src="{{ asset('js/meusObjsPerdidos.js') }}" type="text/javascript"></script>
