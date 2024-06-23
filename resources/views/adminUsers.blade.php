@extends('layouts.layoutA')

@section('title', 'Cogitavi - Administrador')

@section('content')
  

<section>
    <div class="container py-3">
        <div class="col-md-12 col-xl-12">
            <h2 class="mb-5">Utilizadores</h2>
        </div>

        <div class="container">
            <h4 class="mb-3">Contas de Utilizadores</h4>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Email</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Ativar Conta</th>
                            <th scope="col">Desativar Conta</th>
                        </tr>
                    </thead>
                    <tbody id="Users">
                        <!--<tr>
                                <th scope="row">1</th>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-secondary">
                                        Ativar
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger">
                                        Desativar
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


<script src="{{ asset('js/adminUsers.js') }}" type="text/javascript"></script>