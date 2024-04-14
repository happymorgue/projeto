<!-- <!DOCTYPE html> -->
@extends('layouts.layoutP')

@section('title', 'Cogitavi - Perfil Policia')

@section('content')

  
  <div class="container bgPerfil">
		<div class="main-body">
      <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                <div class="mt-3">
				<h4  name="nome2" id="nome2"> </h4>
                  <p class="text-muted font-size-sm">Policia</p>
                </div>
              </div>
            </div>
          </div>
        </div>
				<div class="col-lg-8">
					<div class="card">
						<div class="card-body">
							<div class="row mb-3">
								<div class="col-sm-4">
									<h6 class="mb-0">Nome</h6>
								</div>
								<div class="col-sm-5 text-secondary">
									<input type="text" class="form-control" name="nome" id="nome" value="">
								</div>
							</div>
              <hr>
							<div class="row mb-3">
								<div class="col-sm-4">
									<h6 class="mb-0">Número Interno</h6>
								</div>
								<div class="col-sm-5 text-secondary">
									<input type="text" class="form-control" name="numero_interno" id="numero_interno" value="">
								</div>
							</div>
              <hr>
							<div class="row mb-3">
								<div class="col-sm-4">
									<h6 class="mb-0">Posto de Polícia</h6>
								</div>
								<div class="col-sm-5 text-secondary">
									<select class="form-select" name="posto_policia" id="posto_policia">
									</select>
								</div>
							</div>
              <hr>
			  				<div class="row justify-content-center botoes">
								<div class="col-md-2 m-2">
									<a class="btn btn-save" onclick=guardarMudancas()>Salvar</a>
								</div>
								<div class="col-md-2 m-2">
									<a class="btn btn-cancelar" href="/perfilPolicia">Cancelar</a>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>

@endsection

<link href="{{ asset('css/perfil.css') }}" rel="stylesheet">
<script src="{{ asset('js/editPerfilPolicia.js') }}" type="text/javascript"></script>