<!-- <!DOCTYPE html> -->
@extends('layouts.layoutDL')

@section('title', 'Cogitavi - Perfil')

@section('content')

<section class="bgPerfil mt-3">
  <div class="container bgPerfil">
    <div class="main-body">
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="{{ asset('profile.png') }}" alt="Ícone de perfil de usuário, representando uma figura humana com cabeça e ombros, em um estilo minimalista." class="rounded-circle" width="150">
                    <div class="mt-3">
                    <h4  name="nome3" id="nome3"> </h4>
                      <p class="text-muted font-size-sm">Dono e Licitante</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <h4 id="preencherDadosRegular" hidden class="text-danger">Preencha os dados antes de prosseguir</h4>
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
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-6 text-secondary" name="email" id="email">
                      
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-4">
                      <h6 class="mb-0">Telemóvel</h6>
                    </div>
                    <div class="col-sm-6 text-secondary" name="telemovel" id="telemovel">
                      
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-4">
                      <h6 class="mb-0">NIF</h6>
                    </div>
                    <div class="col-sm-6 text-secondary" name="nif" id="nif">
                      
                    </div>
                  </div>
              <hr>

              <div class="row">
                    <div class="col-sm-4">
                      <h6 class="mb-0">Morada</h6>
                    </div>
                    <div class="col-sm-6 text-secondary" name="morada" id="morada">
                      
                    </div>
                  </div>

                  <hr>
                  <div class="row">
                    <div class="col-sm-4">
                      <h6 class="mb-0">ID Civil</h6>
                    </div>
                    <div class="col-sm-6 text-secondary" name="id_civil" id="id_civil">
                      
                    </div>
                  </div>

                  <hr>
                  <div class="row">
                    <div class="col-sm-4">
                      <h6 class="mb-0">Data de Nascimento</h6>
                    </div>
                    <div class="col-sm-6 text-secondary" name="data_nascimento">
                      
                    </div>
                  </div>
                  <hr>
                    
                  <div class="row">
                    <div class="col-sm-4">
                      <h6 class="mb-0">Género</h6>
                    </div>
                    <div class="col-sm-6 text-secondary" name="genero" id="genero">
                      
                    </div>
                  </div>
                  <hr>
                  <div class="row justify-content-center">
                      <div class="col-md-4 col-lg-2 col-sm-8 m-1 "> 
                        <a class="btn btns btn-edit" href="/editPerfilRegular">Editar Dados</a>
                      </div>
                      <div class="col-md-4 col-lg-2 col-sm-8  m-1"> 
                        <a class="btn btns btn-desativar" href="/api/utilizador/conta/desativar">Desativar Conta</a>
                      </div>
                      <!-- <div class="col-md-4 col-lg-2 col-sm-8 m-1"> 
                        <a class="btn btns btn-apagar" href="">Apagar Conta</a>
                      </div> -->
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

<link href="{{ asset('css/perfil.css') }}" rel="stylesheet">
<script src="{{ asset('js/perfil.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/nomeIconePerfil.js') }}" type="text/javascript"></script>