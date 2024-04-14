<!-- <!DOCTYPE html> -->
@extends('layouts.layoutDL')

@section('title', 'Cogitavi - Perfil')

@section('content')

  
    <div class="container bgPerfil">
      <div class="main-body">
      
            <div class="row gutters-sm">
              <div class="col-md-4 mb-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                      <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="profile picture" class="rounded-circle" width="150">
                      <div class="mt-3">
                        <h4>John Doe</h4>
                        <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Nome</h6>
                      </div>
                      <div class="col-sm-9 text-secondary" name="nome" id="nome">
                        
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Email</h6>
                      </div>
                      <div class="col-sm-9 text-secondary" name="email" id="email">
                        
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Telemóvel</h6>
                      </div>
                      <div class="col-sm-9 text-secondary" name="telemovel" id="telemovel">
                        
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Género</h6>
                      </div>
                      <div class="col-sm-9 text-secondary" name="genero" id="genero">
                        
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Morada</h6>
                      </div>
                      <div class="col-sm-9 text-secondary" name="morada" id="morada">
                        
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">NIF</h6>
                      </div>
                      <div class="col-sm-9 text-secondary" name="nif" id="nif">
                        
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">ID Civil</h6>
                      </div>
                      <div class="col-sm-9 text-secondary" name="id_civil" id="id_civil">
                        
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Data de Nascimento</h6>
                      </div>
                      <div class="col-sm-9 text-secondary" name="data_nascimento">
                        
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-2 p-1">
                        <a class="btn btn-edit" href="/editPerfilPolicia">Editar Dados</a>
                      </div>
                      <div class="col-md-2 p-1">
                        <a class="btn btn-desativar" href="">Desativar Conta</a>
                      </div>
                      <div class="col-md-2 p-1">
                        <a class="btn btn-ativar" href="">Ativar Conta</a>
                      </div>
                      <div class="col-md-2 p-1">
                        <a class="btn btn-apagar" href="">Apagar Conta</a>
                      </div>
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
<script src="{{ asset('js/perfil.js') }}" type="text/javascript"></script>