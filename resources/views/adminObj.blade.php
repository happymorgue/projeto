@extends('layouts.layoutA')

@section('title', 'Cogitavi - Administrador')

@section('content')

<div>
    <h3>Categorias</h3>
    <button>Criar Categorias</button>

    <table class="table m-3">
        <thead class="thead-dark">
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Atributo associado</th>
            <th scope="col">Editar Categoria</th>
            <th scope="col">Remover Categoria</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>azul</td>
                <td>-</td>
                <td>
                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#ModalCat">
                        Editar
                    </button>
                </td>
                <td>
                    <button>
                        remover
                    </button>
                </td>
            </tr>
        </tbody>
    </table>

    
    <h3>Atributos</h3>
    <button>Criar Atributos</button>

    <table class="table m-3">
        <thead class="thead-dark">
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Editar Categoria</th>
            <th scope="col">Remover atributo</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>azul claro</td>
                <td>
                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#ModalAt">
                        Editar
                    </button>
                </td>
                <td>
                    <button>
                        remover
                    </button>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="ModalCat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            CAt
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
    </div>


    <div class="modal fade" id="ModalAt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            At
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
    </div>
</div>


@endsection