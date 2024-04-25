<!-- <!DOCTYPE html> -->
@extends('layouts.layoutDL')

@section('title', 'Cogitavi - Leilões')

@section('content')

<section class="bgColor">
  <div class="container py-5">
    <div id="leiloes" class="row justify-content-center mb-3">
        
      <div class="col-md-12 col-xl-10">
        <div class="card shadow-0 border rounded-3">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                <div class="bg-image">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/img%20(4).webp"
                    class="w-100" />
                </div>
              </div>
              <div class="col-md-6 col-lg-6 col-xl-6">
                <h5>Nome do objeto</h5>
                <p class="mb-4 mb-md-0" style="overflow: hidden; overflow-wrap: break-word;">
                    Aqui será colocada a descrição do objeto. Terá as características deste objeto. 
                    Este objeto é reconhecido por sua forma distinta e propriedade única.
                </p>
              </div>
              <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                <div class="d-flex flex-row align-items-center mb-1">
                  <h4 class="mb-1 me-1">€13.99</h4>
                </div>
                <h6 class="text-success">Leilão a decorrer</h6>
                <div class="d-flex flex-column mt-4">
                  <button class="btn btn-primary btn-sm" type="button">Licitar</button>
                  <button class="btn btn-outline-primary btn-sm mt-2" type="button">
                  Inscrever-se
                  </button>
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
                <h5>Nome do objeto</h5>
              </div>
              <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                <div class="d-flex flex-row align-items-center mb-1">
                  <h4 class="mb-1 me-1">€14.99</h4>
                </div>
                <h6 class="text-danger">Leilão concluido</h6>
                <div class="d-flex flex-column mt-4">
                  <button class="btn btn-primary btn-sm disabled" type="button">Licitar</button>
                  <button class="btn btn-outline-primary btn-sm mt-2 disabled" type="button">
                  Inscrever-se
                  </button>
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
                <h5>Nome do objeto</h5>
                <p class="mb-4 mb-md-0" style="overflow: hidden; overflow-wrap: break-word;">
                    Aqui será colocada a descrição do objeto. Terá as características deste objeto. 
                    Este objeto é reconhecido por sua forma distinta e propriedade única.
                </p>
              </div>
              <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                <div class="d-flex flex-row align-items-center mb-1">
                  <h4 class="mb-1 me-1">€14.99</h4>
                </div>
                <h6 class="text-warning">Leilão começa em breve</h6>
                <div class="d-flex flex-column mt-4">
                  <button class="btn btn-primary btn-sm disabled" type="button">Licitar</button>
                  <button class="btn btn-outline-primary btn-sm mt-2" type="button">
                  Inscrever-se
                  </button>
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

<link href="{{ asset('css/leiloes.css') }}" rel="stylesheet">
<script src="{{ asset('js/leiloesShowAll.js') }}" type="text/javascript"></script>