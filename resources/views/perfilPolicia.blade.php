<!-- <!DOCTYPE html> -->
@extends('layouts.layoutP')

@section('title', 'Cogitavi - Perfil')

@section('content')

  
    <div class="container bgPerfil">
      <div class="main-body">
      
            <div class="row gutters-sm">
              <div class="col-md-4 mb-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                      <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                      <div class="mt-3">
                        <h4>John Doe</h4>
                        <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <div class="card mb-3 divInfo">
                  <!--<h3 class="text-center pt-3">Informações Pessoais</h3>-->
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-4">
                        <h6 class="mb-0">Nome</h6>
                      </div>
                      <div class="col-sm-6 text-secondary">
                        John Doe
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-4">
                        <h6 class="mb-0">Identificador Interno</h6>
                      </div>
                      <div class="col-sm-6 text-secondary">
                        123456789
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-4">
                        <h6 class="mb-0">Posto de Polícia</h6>
                      </div>
                      <div class="col-sm-6 text-secondary">
                        PSP - 18ª Esquadra (Campo Grande)
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-12">
                        <a class="btn btn-edit btn-primary" target="__blank" href="editPerfilPolicia.html">Editar</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
  
          </div>
      </div>

@endsection

<link href="{{ asset('css/perfil.css') }}" rel="stylesheet">