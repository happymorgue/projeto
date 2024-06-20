@extends('layouts.layoutA')

@section('title', 'Cogitavi - Administrador')

@section('content')

<section>
    <div class="container py-3">

        <div class="col-md-12 col-xl-12">
            <h2 class="mb-5">Leilões e Objetos</h2>
        </div>

        <div class="container">
        <h4 class="mb-3">Avaliar Objetos para Leilão</h4>
        <div class="table-responsive mb-3">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Data Encontrado</th>
                        <th scope="col">Valor Inicial</th>
                        <th scope="col">Criar Leilão</th>
                    </tr>
                </thead>
                <tbody id="tableObj">
                    <!--<tr>
                        <th scope="row">1</th>
                        <td>calcas</td>
                        <td>faro</td>
                        <td>15-5</td>
                        <td>
                            <input type="number" class="form-control inputValor" placeholder="Valor inicial">
                        </td>
                        <td>
                            <button type="button" class="btn btn-success ms-1">
                                Criar
                            </button>
                        </td>
                    </tr>-->
                </tbody>
            </table>
        </div>

        <h4 class="mb-3">Objetos Para Irem A Leilão</h4>
        <div class="table-responsive mb-3">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Data de Inicio</th>
                        <th scope="col">Data de Fim</th>
                        <th scope="col">Iniciar Leilão</th>
                    </tr>
                </thead>
                <tbody id="tableObjAva">
                    <!--<tr>
                        <th scope="row">1</th>
                        <td>calcas</td>
                        <td>
                            <input type="date" class="form-control inputData">
                        </td>
                        <td>
                            <input type="date" class="form-control inputData">
                        </td>
                        <td>
                            <button type="button" class="btn btn-success ms-1">
                                Iniciar
                            </button>
                        </td>
                    </tr>-->
                </tbody>
            </table>
        </div>

        <h4 class="mb-3">Leilões Inativos</h4>
        <div class="table-responsive mb-3">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Data de inicio</th>
                        <th scope="col">Data de fim</th>
                        <th scope="col">Valor inicial</th>
                        <th scope="col">Iniciar Leilão</th>
                    </tr>
                </thead>
                <tbody id="LeilaoI">
                    <!--<tr>
                        <th scope="row">1</th>
                        <td>calcas</td>
                        <td>15-5</td>
                        <td>20-5</td>
                        <td>2$</td>
                        <td>
                            <button type="button" class="btn btn-success" onclick="">
                                Iniciar
                            </button>
                        </td>
                    </tr>-->
                </tbody>
            </table>
        </div>

        <h4 class="mb-3">Leilões Ativos</h4>
        <div class="table-responsive mb-3">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Data de inicio</th>
                        <th scope="col">Data de fim</th>
                        <th scope="col">Valor atual</th>
                        <th scope="col">Terminar Leilão</th>
                    </tr>
                </thead>
                <tbody id="LeilaoA">
                    <!--<tr>
                        <th scope="row">1</th>
                        <td>calcas</td>
                        <td>15-5</td>
                        <td>20-5</td>
                        <td>2$</td>
                        <td>
                            <button type="button" class="btn btn-danger" onclick="">
                                Terminar
                            </button>
                        </td>
                    </tr>-->
                </tbody>
            </table>
        </div>
    </div>
    </div>
</section>

@endsection

<script src="{{ asset('js/adminLeilao.js') }}" type="text/javascript"></script>
