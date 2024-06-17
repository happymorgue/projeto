<!-- <!DOCTYPE html> -->
@extends('layouts.layoutDL')

@section('title', 'Cogitavi - Meus Leilões')

@section('content')

<section class="bgColor">
  <div id="licitacoes" class="container py-5">

  <div  class="row justify-content-center mb-3">
    <div class="col-md-12 col-xl-10">
      <h3 class="mb-3">Leilões Subscritos</h3>
    </div>
  </div>

    <!--<div class="row justify-content-center mb-3">
      <div class="col-md-12 col-xl-10" id="licitacoesDiv">
        <div class="card shadow-0 border rounded-3">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                <div class="bg-image">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/new/img(4).webp"
                    class="w-100" />
                </div>
              </div>
              <div class="col-md-6 col-lg-6 col-xl-6">
               <h5 class="text-success">Maior licitação atual</h5>
                <p class="mb-4 mb-md-0" style="overflow: hidden; overflow-wrap: break-word;">
                  Aqui será colocada a descrição do objeto. Terá as características deste objeto. 
                  Este objeto é reconhecido por sua forma distinta e propriedade única.
                </p>
              </div>
              <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start d-flex flex-column">
                <div class="flex-grow-1">
                  <div class="d-flex flex-row align-items-center mb-1">
                   <h5 class="mb-1 me-1">Licitação atual: €40</h5>
                  </div>
                  <h6 class="mb-1 me-1 fw-light">Minha licitação: €10</h6>
                </div>
                <div class="mt-auto w-100">
                  <button class="btn btn-primary btn-sm w-100" type="button">Licitar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

   
    <div class="row justify-content-center mb-3">
      <div class="col-md-12 col-xl-10">
        <div class="card shadow-0 border rounded-3">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                <div class="bg-image">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/new/img(4).webp"
                    class="w-100" />
                </div>
              </div>
              <div class="col-md-6 col-lg-6 col-xl-6">
                <h5 class="text-danger">Leilão concluido</h5>
                <p class="mb-4 mb-md-0" style="overflow: hidden; overflow-wrap: break-word;">
                  Aqui será colocada a descrição do objeto. Terá as características deste objeto. 
                  Este objeto é reconhecido por sua forma distinta e propriedade única.
                </p>
              </div>
              <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start d-flex flex-column">
                <div class="flex-grow-1">
                  <div class="d-flex flex-row align-items-center mb-1">
                    <h5 class="mb-1 me-1">Licitação vencedora: €40</h5>
                  </div>
                  <h6 class="mb-1 me-1 fw-light">Minha licitação: €10</h6>
                </div>
                <div class="mt-auto w-100">
                  <button class="btn btn-primary btn-sm disabled w-100" type="button">Licitar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row justify-content-center mb-3">
      <div class="col-md-12 col-xl-10">
        <div class="card shadow-0 border rounded-3">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                <div class="bg-image">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/new/img(5).webp"
                    class="w-100" />
                </div>
              </div>
              <div class="col-md-6 col-lg-6 col-xl-6">
                <h5 class="text-warning">Leilão começa em breve</h5>
                <p class="mb-4 mb-md-0" style="overflow: hidden; overflow-wrap: break-word;">
                  Aqui será colocada a descrição do objeto. Terá as características deste objeto. 
                  Este objeto é reconhecido por sua forma distinta e propriedade única.
                </p>
              </div>
              <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start d-flex flex-column">
                <div class="flex-grow-1">
                  <div class="d-flex flex-row align-items-center mb-1">
                    <h5 class="mb-1 me-1">Licitação atual: € --</h5>
                  </div>
                  <h6 class="mb-1 me-1 fw-light">Minha licitação: € --</h6>
                </div>
                <div class="mt-auto w-100">
                  <button class="btn btn-primary btn-sm disabled w-100" type="button">Licitar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>-->


    
    </div>
  </div>
</section>

@endsection

<link href="{{ asset('css/leiloes.css') }}" rel="stylesheet">
<script src="{{ asset('js/showLicitacoes_leilao.js') }}" type="text/javascript"></script>



