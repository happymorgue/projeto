<!-- <!DOCTYPE html> -->
@extends('layouts.layoutDL')

@section('title', 'Cogitavi - Objetos Achados')

@section('content')
<section class="text-center text-sm-start m-0 bgColor d-flex" id="myItems">
  <div class="container p-5 d-flex col-md-12">
    <div id="ObjetosEncontrados" class="w-100">
      <div class="row d-flex justify-content-around bgColorMyItems">
        <div class="row gutters-sm mt-3">
          <div class="col-md-4 mb-3">
            <div class="card">
              <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                  <img src="{{ asset('calcas.jpg') }}" alt="profile picture" class="h-50">
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card mb-3">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-4">
                    <h6 class="mb-0">Nome</h6>
                  </div>
                  <div class="col-sm-6 text-secondary" name="nome" id="nome">
                    
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-4">
                    <h6 class="mb-0">Descrição</h6>
                  </div>
                  <div class="col-sm-6 text-secondary" name="email" id="email">
                    
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-4">
                    <h6 class="mb-0">Data de Perda</h6>
                  </div>
                  <div class="col-sm-6 text-secondary" name="telemovel" id="telemovel">
                    
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-4">
                    <h6 class="mb-0">Local</h6>
                  </div>
                  <div class="col-sm-6 text-secondary" name="telemovel" id="telemovel">
                    
                  </div>
                </div>
                <hr>
                  <div class="row justify-content-center">
                    <div class="col-md-4 col-lg-2 col-sm-8 m-1 "> 
                      <a class="btn btns btn-primary" href="/editPerfilRegular">É meu</a>
                    </div>
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


<section class="text-center text-sm-start m-0 bgColor d-flex" id="map">
<div class="container px-5 pb-5 d-flex col-md-12">
    <div id="ObjetosEncontrados" class="w-100">
      <div class="row d-flex justify-content-around bgColorMyItems">
  <!--separador-->
        <div class="row gutters-sm mt-3">
          <div class="col-md-12 mb-3">
            <div class="card">
              <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center h-100">
                  <img src="{{ asset('maps.jpg') }}" alt="profile picture" class="h-100">
                  <!--Place holder-->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  


@endsection

<link href="{{ asset('css/obj.css') }}" rel="stylesheet">