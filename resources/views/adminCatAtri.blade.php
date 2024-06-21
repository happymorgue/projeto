@extends('layouts.layoutA')

@section('title', 'Cogitavi - Administrador')

@section('content')
  

<section>
    <div class="container py-3">
        <div class="col-md-12 col-xl-12">
            <h2 class="mb-5">Categorias e Atributos</h2>
        </div>

        <div class="container">
            <h4 class="mb-3">Categorias</h4>
            <button class="btn btn-dark mb-3" data-bs-toggle="modal" data-bs-target="#ModalCatCriar">Criar Categorias</button>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Editar Categoria</th>
                            <th scope="col">Remover Categoria</th>
                        </tr>
                    </thead>
                    <tbody id="Cat">
                        <!--<tr>
                            <th scope="row">1</th>
                            <td>azul</td>
                            <td>
                                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#ModalCat">
                                    Editar
                                </button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" onclick="confirmDelete()">
                                    Remover
                                </button>
                            </td>
                        </tr>-->
                    </tbody>
                </table>
            </div>

            <h4 class="mb-3">Atributos</h4>
            <button class="btn btn-dark mb-3" data-bs-toggle="modal" data-bs-target="#ModalAtCriar">Criar Atributos</button>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Categoria Associada</th>
                            <th scope="col">Editar Atributo</th>
                            <th scope="col">Remover Atributo</th>
                        </tr>
                    </thead>
                    <tbody id="Atr">
                        <!--<tr>
                            <th scope="row">1</th>
                                <td>azul claro</td>
                                <td>azul</td>
                                <td>
                                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#ModalAt">
                                        Editar
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger" onclick="confirmDelete()">
                                        Remover
                                    </button>
                                </td>
                        </tr>-->
                    </tbody>
                </table>
            </div>

            <!-- Modal for Criar Categoria -->
            <div class="modal fade" id="ModalCatCriar" tabindex="-1" aria-labelledby="ModalCatLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalCatLabel">Criar Categoria</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="editarCatForm">
                                <div class="mb-3">
                                    <label for="nomeCatCriar" class="form-label">Nome</label>
                                    <input type="text" class="form-control" id="nomeCatCriar" name="nomeCatCriar" id="nomeCatCriar">
                                </div>
                                <div class="mb-3">
                                    <label for="descricaoCat" class="form-label">Descrição</label>
                                    <input type="text" class="form-control" id="descricaoCat" name="descricaoCat" id="descricaoCat">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" onclick="criarCategoria()" class="btn btn-primary">Salvar</button>
                        </div>
                    </div>
                </div>
            </div>

             <!-- Modal for Editar Categoria -->
             <div class="modal fade" id="ModalCatEditar" tabindex="-1" aria-labelledby="ModalCatLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalCatLabel">Editar Categoria</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="editarCatForm">
                                <div class="mb-3">
                                    <label for="nomeCat" class="form-label">Nome</label>
                                    <input type="text" class="form-control" name="nomeCat" id="nomeCat">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" onclick="editarCat()" class="btn btn-primary">Salvar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal for Criar Atributo -->
            <div class="modal fade" id="ModalAtCriar" tabindex="-1" aria-labelledby="ModalAtLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalAtLabel">Criar Atributo</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="editarAtriForm">
                                <div class="mb-3">
                                    <label for="nomeAtriCriar" class="form-label">Nome</label>
                                    <input type="text" class="form-control" id="nomeAtriCriar" name="nomeAtriCriar" id="nomeAtriCriar">
                                </div>
                                <div class="mb-3">
                                    <label for="tipoAtriCriar" class="form-label">Tipo</label>
                                    <input type="text" class="form-control" id="tipoAtriCriar" name="tipoAtriCriar" id="tipoAtriCriar">
                                </div>
                                <div class="mb-3">
                                    <label for="catAtriCriar" class="form-label">Categoria</label>
                                    <select id="criarAt" class="form-select" aria-label="selecione">
                                        
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" onclick="criarAtributos()" class="btn btn-primary">Salvar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal for Editar Atributo -->
            <div class="modal fade" id="ModalAtEditar" tabindex="-1" aria-labelledby="ModalAtLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalAtLabel">Editar Atributo</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="editarAtriForm">
                                <div class="mb-3">
                                    <label for="nomeAtri" class="form-label">Nome</label>
                                    <input type="text" class="form-control" name="nomeAtri" id="nomeAtri">
                                </div>
                                <div class="mb-3">
                                    <label for="tipoAtri" class="form-label">Tipo</label>
                                    <input type="text" class="form-control" name="tipoAtri" id="tipoAtri">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" onclick="editarAtributo()" class="btn btn-primary">Salvar</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>

@endsection

<script src="{{ asset('js/confirmDelete.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/adminCategorias.js') }}" type="text/javascript"></script>