<!-- <!DOCTYPE html> -->
@extends('layouts.layoutP')

@section('title', 'Cogitavi - Perfil Policia')

@section('content')

  
<section class="bgPerfil">
  <div class="container">
		<div class="main-body">
      <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                <img src="{{ asset('profile.png') }}" alt="Ícone de perfil de usuário, representando uma figura humana com cabeça e ombros, em um estilo minimalista." class="rounded-circle" width="150">
                <div class="mt-3">
				<h4  name="nome3" id="nome3"> </h4>
                  <p class="text-muted font-size-sm">Polícia</p>
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
							<!-- <hr> -->
							<div class="row mb-3">
								<div class="col-sm-4">
									<h6 class="mb-0">Número Interno</h6>
								</div>
								<div class="col-sm-5 text-secondary">
									<input type="text" class="form-control" name="numero_interno" id="numero_interno" value="" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
								</div>
							</div>
							<!-- <hr> -->
							<div class="row mb-3">
								<div class="col-sm-4">
									<h6 class="mb-0">Posto de Polícia</h6>
								</div>
								<div class="col-sm-5 text-secondary">
									<select class="form-select" name="posto_policia" id="posto_policia">
									</select>
								</div>
							</div>
							<!-- <hr> -->
			  				<div class="row justify-content-start botoes">
								<div class="col-md-6 col-lg-2 mx-2 my-1">
									<a class="btn btn-save" onclick=guardarMudancas()>Salvar</a>
								</div>
								<div class="col-md-6 col-lg-2 mx-2 my-1">
									<a class="btn btn-cancelar" href="/perfilPolicia">Cancelar</a>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>

</section>
@endsection

<link href="{{ asset('css/perfil.css') }}" rel="stylesheet">
<script src="{{ asset('js/editPerfilPolicia.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/nomeIconePolicia.js') }}" type="text/javascript"></script>