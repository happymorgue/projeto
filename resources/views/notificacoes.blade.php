<!-- <!DOCTYPE html> -->
@extends('layouts.layoutDL')

@section('title', 'Cogitavi - Notificações')

@section('content')

<section class="bgColor">
  <div class="container py-5 col-sm-12 col-md-12 col-lg-8 col-xl-6">

      <div id="notificacoes" class="row justify-content-center">

        <!--<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-1" id="notificacaoLeilaoDiv">
          <div class="card shadow-0 border rounded-3">
            <div class="card-body">
              <div class="row">

                <div class="col-sm-7 col-md-6 col-lg-7 col-xl-8 p-md-3 p-lg-3 p-xl-3">
                  <p class="mb-4 mb-md-0 mb-sm-0" style="overflow: hidden; overflow-wrap: break-word;">
                    Aqui será colocada a notificação do leilão.
                  </p>
                  <div class="d-flex pt-3">
                    <a href="" class="btn btn-primary btn-sm me-2" role="button">Ver detalhes</a>
                  </div>
                </div>

                <div class="col-sm-5 col-md-6 col-lg-5 col-xl-4 mb-lg-0 d-flex justify-content-end">
                  <div class="bg-image">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/img%20(4).webp" class="img-fluid" style="max-width: 10em;" />
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
        
        <div class="col-md-12 col-xl-12" id="notificacaoObjetoDiv">
          <div class="card shadow-0 border rounded-3">
            <div class="card-body">
              <div class="row">
                <p> Nova correspondência com o seu objeto perdido</p>
                  <div class="col-md-12 col-lg-12 col-xl-12 mb-4 mb-lg-0 d-flex justify-content-center align-items-center">

                    <div class="bg-image col-lg-4 d-flex justify-content-center align-items-center">
                      <figure class="figure">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/img%20(4).webp" 
                        class="figure-img img-fluid rounded" style="max-width: 12em;" />
                        <figcaption class="figure-caption">O seu objeto perdido</figcaption>
                      </figure>
                    </div>
                    <div class="col-lg-2 pb-5 d-flex justify-content-center align-items-center">
                      <img src="{{ asset('arrows.png') }}" class="img-fluid" style="max-width: 5em;">
                    </div>
                    <div class="bg-image col-lg-4 d-flex justify-content-center align-items-center">
                      <figure class="figure">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/img%20(4).webp" 
                        class="figure-img img-fluid rounded" style="max-width: 12em;" />
                        <figcaption class="figure-caption">O objeto encontrado</figcaption>
                      </figure>
                    </div>
                  </div>

                  <div class="col-md-12 col-lg-12 col-xl-12 d-flex justify-content-center align-items-center">
                    <div class="d-flex">
                      <button class="btn btn-primary btn-sm me-2" type="button">O objeto é meu</button>
                      <button class="btn btn-outline-primary btn-sm" type="button">O objeto não é meu</button>
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

<link href="{{ asset('css/notificacoes.css') }}" rel="stylesheet">
<script src="{{ asset('js/showNotificacoes.js') }}" type="text/javascript"></script>




