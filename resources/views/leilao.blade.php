<!-- <!DOCTYPE html> -->
@extends('layouts.layoutDL')

@section('title', 'Cogitavi - Leilão')

@section('content')

<section class="bgColor">
  <div class="container py-5">
    <div id="leiloes" class="row justify-content-center">
        
<div class="row justify-content-center">
  <div class="col-sm-12 col-md-12 col-xl-11">
    <div class="card shadow-0 border rounded-3">
      <div class="card-body p-4">
        <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-4 mb-lg-0 d-flex">
            <div class="bg-image">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/new/img(4).webp"
                class="w-100" />
            </div>
          </div>
          <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 d-flex flex-column justify-content-between">
            <div class="nome">
              <h3>Nome do objeto</h3>
              <p class="text-muted">Categoria: Vestuário</p>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 price align-self-end align-items-center p-2">
              <div class="d-flex flex-row mb-1">
                <h4 class="mb-1 me-1">€14.99</h4>
              </div>
              <h6 class="text-success text-start">Termina em 30/06/2024 às 15:00</h6>
              <div class="d-flex flex-column mt-4">
                <button class="btn btn-primary btn-sm" type="button">Licitar</button>
                <button class="btn btn-outline-primary btn-sm mt-2" type="button"> Inscrever-se </button>
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

<link href="{{ asset('css/leiloes.css') }}" rel="stylesheet">
