<!-- <!DOCTYPE html> -->
@extends('layouts.layoutP')

@section('title', 'Cogitavi - Perfil')

@section('content')

  
<section class="bgPerfil pt-3">
    <div class="container">
      <div class="main-body">
      
            <div class="row gutters-sm">
              <div class="col-md-4 mb-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                      <img src="{{ asset('profile.png') }}" alt="Ícone de perfil de usuário, representando uma figura humana com cabeça e ombros, em um estilo minimalista." class="rounded-circle" width="150">
                      <div class="mt-3">
                        <h4  name="nome3" id="nome3"> </h4>
                        <p class="text-muted font-size-sm">Polícia</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <div class="card mb-3 divInfo">
                      <div class="card-body">
                        <h4 id="preencherDadosPolicia" hidden class="text-danger">Preencha os dados antes de prosseguir</h4>
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
                            <h6 class="mb-0">Identificador Interno</h6>
                          </div>
                          <div class="col-sm-6 text-secondary" name="identificador_interno" id="identificador_interno">
                            
                          </div>
                        </div>
                    <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <h6 class="mb-0">Posto de Polícia</h6>
                          </div>
                          <div class="col-sm-6 text-secondary" name="posto_policia" id="posto_policia">
                            
                          </div>
                        </div>
                    <hr>

                      <div class="row justify-content-center">
                        <div class="col-md-4 col-lg-2 col-sm-8 m-1 "> 
                          <a class="btn btns btn-edit" href="/editPerfilPolicia">Editar Dados</a>
                        </div>
                        <div class="col-md-4 col-lg-2 col-sm-8  m-1"> 
                          <a class="btn btns btn-desativar" href="">Desativar Conta</a>
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

</section>
@endsection

<link href="{{ asset('css/perfil.css') }}" rel="stylesheet">
<script src="{{ asset('js/perfilPolicia.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/nomeIconePolicia.js') }}" type="text/javascript"></script>