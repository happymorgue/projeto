@extends('layouts.layoutDL')

@section('title', 'Cogitavi - Objeto Achado')

@section('content')
<section class="text-center text-sm-start m-0 bgColor d-flex" id="myItems">
  <div class="container p-5 d-flex col-md-12">
    <div id="ObjetosEncontrados" class="w-100">
    <div class="row d-flex justify-content-around bgColorMyItems">
    <div class="row gutters-sm mt-3">
        <div class="col-md-4 mb-3 d-flex flex-column">
            <div class="d-flex flex-column align-items-center text-center flex-grow-1">
                <img id="img" src="" alt="object picture" class="img-thumbnail">
            </div>
            <div class="mt-auto">
                <a class="btn btn-lg w-100 btn-primary" href="">É meu</a>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="pt-4 mb-0">Nome</h6>
                        </div>
                        <div class="pt-4 col-sm-6 text-secondary" name="nome" id="nome">
                            
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">Encontrado Entre as Datas</h6>
                        </div>
                        <div class="col-sm-6 text-secondary" name="datas" id="datas">
                            
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">Local</h6>
                        </div>
                        <div class="col-sm-6 text-secondary" id="local" name="local">
                            
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">Categoria</h6>
                        </div>
                        <div class="col-sm-6 text-secondary" name="categoria" id="categoria">
                            
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-4">Atributo</h6>
                        </div>
                        <div class="col-sm-6 text-secondary" name="atributo" id="atributo">
                            
                        </div>
                  </div>
                </div>
            </div>
        </div>
      </div>

    </div>
    </div>
  </div>
</section>

<section class="text-center text-sm-start m-0 bgColor d-flex" id="mapSection">
  <div class="container px-5 pb-5 d-flex col-md-12">
    <div id="map" class="w-100" style="height: 300px;"></div>
  </div>
</section>

<script src="{{ asset('js/mapaObjetos.js') }}"></script>


@endsection

<link href="{{ asset('css/obj.css') }}" rel="stylesheet">
<script src="{{ asset('js/mostrarObjeto.js') }}" type="text/javascript"></script>

