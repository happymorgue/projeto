@extends('layouts.layoutA')

@section('title', 'Cogitavi - Administrador')

@section('content')
  

<section>
    <h2 class="mb-3">Categorias</h2>
    <button class="btn btn-dark">Criar Categorias</button>

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
                    <button type="button" class="btn btn-danger">
                        Remover
                    </button>
                </td>
            </tr>
        </tbody>
    </table>

    <h2 class="mb-3">Atributos</h2>
    <button class="btn btn-dark">Criar Atributos</button>

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
                    <button type="button" class="btn btn-danger">
                        Remover
                    </button>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="ModalCat" tabindex="-1" aria-labelledby="bidModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="bidModalLabel">Editar Categoria</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="editarCatForm">
                <label for="nomeCat" class="form-label">Nome</label>
                <input type="text" class="form-control" name="nomeCat" id="nomeCat">
            </form>
        </div>
        <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="">Salvar</button>
        </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="ModalAt" tabindex="-1" aria-labelledby="bidModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="bidModalLabel">Editar Atributo</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="editarCatForm">
                <label for="nomeAtri" class="form-label">Nome</label>
                <input type="text" class="form-control" name="nomeAtri" id="nomeAtri">
                <label for="tipoAtri" class="form-label">Tipo</label>
                <input type="text" class="form-control" name="tipoAtri" id="tipoAtri">
            </form>
        </div>
        <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="">Salvar</button>
        </div>
        </div>
    </div>
    </div>

</section>

@endsection