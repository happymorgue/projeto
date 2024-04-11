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
                        Kenneth Valdez
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Email</h6>
                      </div>
                      <div class="col-sm-9 text-secondary" name="email" id="email">
                        fip@jukmuh.al
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Telemóvel</h6>
                      </div>
                      <div class="col-sm-9 text-secondary" name="telemovel" id="telemovel">
                        (239) 816-9029
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Género</h6>
                      </div>
                      <div class="col-sm-9 text-secondary" name="genero" id="genero">
                        Masculino
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Morada</h6>
                      </div>
                      <div class="col-sm-9 text-secondary" name="morada" id="morada">
                        Bay Area, San Francisco, CA
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">NIF</h6>
                      </div>
                      <div class="col-sm-9 text-secondary" name="nif" id="nif">
                        320380453
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">ID Civil</h6>
                      </div>
                      <div class="col-sm-9 text-secondary" name="id_civil" id="id_civil">
                        12345678
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Data de Nascimento</h6>
                      </div>
                      <div class="col-sm-9 text-secondary" name="data_nascimento">
                        12/01/2001
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-12">
                        <a class="btn btn-edit btn-primary" href="/editPerfilRegular">Editar</a>
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