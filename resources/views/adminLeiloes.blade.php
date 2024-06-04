@extends('layouts.layoutA')

@section('title', 'Cogitavi - Administrador')

@section('content')

<div>
    <h3>Objs</h3>
    <table class="table m-3">
        <thead class="thead-dark">
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Local</th>
            <th scope="col">Data</th>
            <th scope="col">Resgatado</th>
            <th scope="col">Iniciar leilao</th>
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
                    <input type="number" class="form" placeholder="Preco inicial">
                    <button>
                        iniciar
                    </button>
                </td>
            </tr>
        </tbody>
    </table>


    <h3>Leiloes</h3>
    <table class="table m-3">
        <thead class="thead-dark">
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Obj</th>
            <th scope="col">Data de inicio</th>
            <th scope="col">Data de fim</th>
            <th scope="col">maior bid</th>
            <th scope="col">Terminar leilao</th>
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
                    <button>
                        terminar
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</div>


@endsection