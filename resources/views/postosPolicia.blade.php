<!-- <!DOCTYPE html> -->
@extends('layouts.layoutP')

@section('title', 'Cogitavi - Postos de Polícia')

@section('content')

@include('partials.editPostoModal')

<section class="bgColor">
    <div class="container">
        <div class="main-body" id="main">
            <div class="row gutters-sm" id='row-inicial'>

            <!-- Primeira linha -->
            
            <!-- Form Novo Posto de Policia -->

            <div class="col-md-6 col-xl-3 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-2">Adicionar Posto de Polícia</h5>
                        <form id="FAdicionarPosto">
                            <div class="form-group">
                                <label for="inputPhoneNumber">Morada</label>
                                <input type="tel" class="form-control" required name="moradaPostoF" id="moradaPostoF" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="inputID">Telemóvel</label>
                                <input type="text" class="form-control" required name="telemovelPostoF" maxlength="9" id="telemovelPostoF" placeholder="">
                            </div>
                            <button type="submit" class="btn btn-primary mt-2 " onclick="adicionarPosto()">Adicionar</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Postos de Policia 

            <div class="col-md-6 col-xl-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="posto.png" alt="" class="rounded-circle" width="120">
                        <div class="mt-3">
                            <h5 class="mb-2" name="nomePosto" id="nomePosto">Morada do Posto</h5>
                            <p class="text-muted font-size-sm mb-0" name="telemovelPosto" id="telemovelPosto">Telemóvel do Posto</p>
                        </div>
                    </div>
                    <div class="mt-3 text-center">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
                            Editar 
                        </button>
                        <button class="btn btn-danger">Apagar</button>
                    </div>
                </div>
            </div>
            </div> -->

            <!--<div class="col-md-6 col-xl-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="posto.png" alt="" class="rounded-circle" width="120">
                        <div class="mt-3">
                            <h5 class="mb-2" name="nomePosto" id="nomePosto">Nome do Posto</h5>
                            <p class="text-muted font-size-sm mb-0" name="moradaPosto" id="moradaPosto" >Morada do Posto</p>
                            <p class="text-muted font-size-sm mb-0" name="telemovelPosto" id="telemovelPosto">Telemóvel do Posto</p>
                        </div>
                    </div>
                    <div class="mt-3 text-center">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
                            Editar 
                        </button>
                        <button class="btn btn-danger">Apagar</button>
                    </div>
                </div>
            </div>
            </div>

            <div class="col-md-6 col-xl-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="posto.png" alt="" class="rounded-circle" width="120">
                        <div class="mt-3">
                            <h5 class="mb-2" name="nomePosto" id="nomePosto">Nome do Posto</h5>
                            <p class="text-muted font-size-sm mb-0" name="moradaPosto" id="moradaPosto" >Morada do Posto</p>
                            <p class="text-muted font-size-sm mb-0" name="telemovelPosto" id="telemovelPosto">Telemóvel do Posto</p>
                        </div>
                    </div>
                    <div class="mt-3 text-center">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
                            Editar 
                        </button>
                        <button class="btn btn-danger">Apagar</button>
                    </div>
                </div>
            </div>
            </div>

            </div> 


            <div class="row gutters-sm">
            <div class="col-md-6 col-xl-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="posto.png" alt="" class="rounded-circle" width="120">
                        <div class="mt-3">
                            <h5 class="mb-2" name="nomePosto" id="nomePosto">Nome do Posto</h5>
                            <p class="text-muted font-size-sm mb-0" name="moradaPosto" id="moradaPosto" >Morada do Posto</p>
                            <p class="text-muted font-size-sm mb-0" name="telemovelPosto" id="telemovelPosto">Telemóvel do Posto</p>
                        </div>
                    </div>
                    <div class="mt-3 text-center">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
                            Editar 
                        </button>
                        <button class="btn btn-danger">Apagar</button>
                    </div>
                </div>
            </div>
            </div>

            <div class="col-md-6 col-xl-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="posto.png" alt="" class="rounded-circle" width="120">
                        <div class="mt-3">
                            <h5 class="mb-2" name="nomePosto" id="nomePosto">Nome do Posto</h5>
                            <p class="text-muted font-size-sm mb-0" name="moradaPosto" id="moradaPosto" >Morada do Posto</p>
                            <p class="text-muted font-size-sm mb-0" name="telemovelPosto" id="telemovelPosto">Telemóvel do Posto</p>
                        </div>
                    </div>
                    <div class="mt-3 text-center">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
                            Editar 
                        </button>
                        <button class="btn btn-danger">Apagar</button>
                    </div>
                </div>
            </div>
            </div>

            <div class="col-md-6 col-xl-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="posto.png" alt="" class="rounded-circle" width="120">
                        <div class="mt-3">
                            <h5 class="mb-2" name="nomePosto" id="nomePosto">Nome do Posto</h5>
                            <p class="text-muted font-size-sm mb-0" name="moradaPosto" id="moradaPosto" >Morada do Posto</p>
                            <p class="text-muted font-size-sm mb-0" name="telemovelPosto" id="telemovelPosto">Telemóvel do Posto</p>
                        </div>
                    </div>
                    <div class="mt-3 text-center">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
                            Editar 
                        </button>
                        <button class="btn btn-danger">Apagar</button>
                    </div>
                </div>
            </div>
            </div>

            <div class="col-md-6 col-xl-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="posto.png" alt="" class="rounded-circle" width="120">
                        <div class="mt-3">
                            <h5 class="mb-2" name="nomePosto" id="nomePosto">Nome do Posto</h5>
                            <p class="text-muted font-size-sm mb-0" name="moradaPosto" id="moradaPosto" >Morada do Posto</p>
                            <p class="text-muted font-size-sm mb-0" name="telemovelPosto" id="telemovelPosto">Telemóvel do Posto</p>
                        </div>
                    </div>
                    <div class="mt-3 text-center">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
                            Editar 
                        </button>
                        <button class="btn btn-danger">Apagar</button>  
                    </div>
                </div>
            </div>
            </div> -->
            </div> 
            
        </div>
    </div>
</section>
@endsection

<link href="{{ asset('css/postosPolicia.css') }}" rel="stylesheet">
<script src="{{ asset('js/carregarPostos.js') }}" type="text/javascript"></script>
