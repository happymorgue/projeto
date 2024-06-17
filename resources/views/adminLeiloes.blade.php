@extends('layouts.layoutA')

@section('title', 'Cogitavi - Administrador')

@section('content')

<section>
    <h2 class="mb-3">Objetos Disponíveis para Leilão</h2>
    <table class="table m-3">
        <thead class="thead-dark">
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Local</th>
            <th scope="col">Data</th>
            <th scope="col">Resgatado</th>
            <th scope="col">Iniciar Leilão</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>calcas</td>
                <td>faro</td>
                <td>15-5</td>
                <td>Id do encontrado?</td>
                <td>
                    <input type="number" class="form" placeholder="Valor inicial">
                    <button type="button" class="btn btn-success ms-1">
                        Iniciar
                    </button>
                </td>
            </tr>
        </tbody>
    </table>


    <h2 class="mb-3">Leilões</h2>
    <table class="table m-3">
        <thead class="thead-dark">
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Objeto</th>
            <th scope="col">Data de inicio</th>
            <th scope="col">Data de fim</th>
            <th scope="col">Maior Lictação</th>
            <th scope="col">Terminar Leilão</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>calcas</td>
                <td>15-5</td>
                <td>20-5</td>
                <td>2$</td>
                <td>
                    <button type="button" class="btn btn-danger">
                        Terminar
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</section>

@endsection