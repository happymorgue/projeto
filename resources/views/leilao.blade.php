<!-- <!DOCTYPE html> -->
@extends('layouts.layoutDL')

@section('title', 'Cogitavi - Leilão')

@include('partials.licitarModal')

@section('content')

<section class="bgColor">
  <div class="container py-5">
    <div id="leilao" class="row justify-content-center">
     
    <!-- Objeto do leilão -->
    <!--<div class="row justify-content-center">
      <div class="col-sm-12 col-md-12 col-xl-11">
        <div class="card shadow-0 border rounded-3">
          <div class="card-body p-4">
            <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-4 mb-lg-0 d-flex">
                <div class="bg-image">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/img%20(4).webp"
                    class="w-100" />
                </div>
              </div>
              <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 d-flex flex-column justify-content-between">
                  <div class="nome align-self-start">
                    <h3>Nome do objeto</h3>
                    <p class="text-muted fw-light">Categoria: Vestuário</p>
                  </div>
                  <div class="container countdown-container">
                    <div class="countdown d-flex flex-row justify-content-center align-items-center" id="countdown" style="width:70%;">
                          <span id="days" class="countdown-number">00</span>d
                          <span class="divider">:</span>
                          <span id="hours" class="countdown-number">00</span> h
                          <span class="divider">:</span>
                          <span id="minutes" class="countdown-number">00</span>m 
                          <span class="divider">:</span>
                          <span id="seconds" class="countdown-number">00</span>s
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 price align-self-start align-items-center p-2">
                      <div class="d-flex flex-row mb-0">
                        <h1 class="mb-1">€17.99</h1>
                      </div>
                      <div class="d-flex flex-row mb-2">
                        <h4 class="mb-1 text-decoration-line-through">€14.99</h4>valor base dado pelo avaliador
                      </div>
                      <h6 class="text-success text-start fw-light">Termina ao fim do dia 30/06/2024</h6>
                      <div class="d-flex flex-column mt-4">
                        <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#licitarModal">Licitar</button>
                        <button class="btn btn-outline-primary btn-sm mt-2" type="button"> Inscrever-se </button>
                      </div>
                    </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    Histórico de Licitações 

        <div class="row justify-content-center mt-2">
            <div class="col-sm-12 col-md-12 col-xl-11">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col col-sm-12 col-xs-12 col-md-12 col-lg-12">
                                <h4 class="title">Histórico de Licitações</h4>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome do Licitante</th>
                                    <th>Data</th>
                                    <th>Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>isdee</td>
                                    <td>27/04/2024</td>
                                    <td>€17.99</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>hej</td>
                                    <td>27/04/2024</td>
                                    <td>€16.99</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>posak</td>
                                    <td>26/04/2024</td>
                                    <td>€16.00</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>qdek</td>
                                    <td>26/04/2024</td>
                                    <td>€15.00</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>pars</td>
                                    <td>25/04/2024</td>
                                    <td>€14.99</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> -->





    
    </div>
  </div>
</section>

@endsection

<link href="{{ asset('css/leilao.css') }}" rel="stylesheet">
<script src="{{ asset('js/leilao.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/countdown.js') }}" type="text/javascript"></script>