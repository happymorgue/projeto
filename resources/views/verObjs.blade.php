<!-- <!DOCTYPE html> -->
@extends('layouts.layoutDL')

@section('title', 'Cogitavi - Objetos Achados')

@section('content')
<section class="section-showcase text-center text-sm-start m-0 bgColor d-flex" id="myItems">
  <div class="container p-5 d-flex col-md-12">
    <div id="ObjetosEncontrados" class="w-100">
      <div class="row d-flex justify-content-around bgColorMyItems">

        <div class="row gutters-sm">
              <div class="col-md-4 mb-3 d-flex align-items-center">
                <div class="card border-0">
                  <div class="card-body border-0">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img class="img-thumbnail border-0" src="calcas.jpg">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <div class="card border-0 mb-3">
                  <div class="card-body border-0">
                    <div class="row">
                      <div class="col-sm-4">
                        <h6 class="mb-0">Nome</h6>
                      </div>
                      <div class="col-sm-6 text-secondary" name="nome" id="nome">
                        
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <h6 class="mb-0">Data</h6>
                      </div>
                      <div class="col-sm-6 text-secondary" name="email" id="email">
                        
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <h6 class="mb-0">Localização</h6>
                      </div>
                      <div class="col-sm-6 text-secondary" name="telemovel" id="telemovel">
                      </div>
                      <div class="row">
                      <div class="col-sm-4">
                        <h6 class="mb-0">Descrição</h6>
                      </div>
                      <div class="col-sm-6 text-secondary" name="telemovel" id="telemovel">
                      </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-4 col-lg-2 col-sm-8 m-1 "> 
                          <a class="btn btn-primary" href="/editPerfilRegular">É meu!</a>
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
  
@endsection

<link href="{{ asset('css/obj.css') }}" rel="stylesheet">