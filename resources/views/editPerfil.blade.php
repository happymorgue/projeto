<!-- <!DOCTYPE html> -->
@extends('layouts.layoutDL')

@section('title', 'Cogitavi - Editar Perfil')

@section('content')

  
<section class="bgPerfil">
  <div class="container">
		<div class="main-body">
      <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                <img src="{{ asset('profile.png') }}" class="rounded-circle" width="150">
                <div class="mt-3">
				<h4  name="nome3" id="nome3"> </h4>
                    <p class="text-muted font-size-sm">Dono e Licitante</p>
                </div>
              </div>
            </div>
          </div>
        </div>
				<div class="col-lg-8">
					<div class="card">
						<div class="card-body">

							<h4>Dados Pessoais</h4>
							<div class="row mb-3">
								<!-- <div class="col-sm-4">
									<h6 class="mb-0">Nome</h6>
								</div> -->
								<div class="col-sm-9 text-secondary editp">
									<input type="text" class="form-control" placeholder="Nome" value="" name="nome" id="nome">
								</div>
							</div>
              <!-- <hr> -->
							<div class="row mb-3">
								<div class="col-sm-2 text-secondary ccode">
									<select class="form-select select" name="ccode">
										<option value="+1">&#x1F1FA;&#x1F1F8; (+1)</option>
										<option value="+44">&#x1F1EC;&#x1F1E7; (+44)</option>
										<option value="+351" selected>&#x1F1F5;&#x1F1F9; (+351)</option>
									</select>
								</div>
								<div class="col-sm-6 text-secondary tel">
									<input class="form-control" type="text" id="telemovel" name="telemovel" minlength="9" maxlength="9" placeholder="948 284 195" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
								</div>
							</div>
								<div class="row mb-3">
								<!-- <div class="col-sm-4">
									<h6 class="mb-0">NIF</h6>
								</div> -->
								<div class="col-sm-6 text-secondary">
									<input type="text" class="form-control"  name="nif" id="nif" minlength="9" maxlength="9" placeholder="NIF" value="" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
								</div>
							</div>
           
			 				 
              <!-- <hr> -->
							<div class="row mb-3">
								<!-- <div class="col-sm-4">
									<h6 class="mb-0">Morada</h6>
								</div> -->
								<div class="col-sm-6 text-secondary" >
									<input type="text" class="form-control" name="morada" id="morada" placeholder="Morada" value="">
								</div>
							</div>
              <!-- <hr> -->
			  				<div class="row mb-3">
								<!-- <div class="col-sm-4">
									<h6 class="mb-0">ID Civil</h6>
								</div> -->
								<div class="col-sm-6 text-secondary">
									<input type="text" class="form-control" name="identificador civil" id="identificador civil" placeholder="ID Civil" value="" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
								</div>
							</div>
              <!-- <hr> -->
							<h4>Data de Nascimento</h4>
							<div class="row">
								<div class="col-sm-6">
									<input type="date" class="form-control" name="data_nascimento" id="data_nascimento">
								</div>
							</div>

					<!-- Div to display the formatted date -->
					<div> <span id="data_nascimento" class="d-none"></span> </div>

		<!-- <hr> -->
		<br>
							<div class="row mb-3">
								<!-- <div class="col-sm-4">
									<h6 class="mb-0">Género</h6>
								</div> -->
								<div class="col-sm-6 text-secondary">
									<select class="form-select" name="genero" id="genero">
										<option value="" selected>Selecione o genero</option>
										<option value="M">Masculino</option>
										<option value="F">Feminino</option>
										<option value="O">Outro</option>
									</select>
								</div>
							</div>
              <!-- <hr> -->
							<div class="row">
								<div class="col-md-2 m-2">
									<a class="btn btns btn-save" onclick=guardarMudancas()>Salvar</a>
								</div>
								<div class="col-md-2 m-2">
									<a class="btn btns btn-cancelar" href="/perfilRegular">Cancelar</a>
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
<script src="{{ asset('js/editPerfil.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/nomeIconePerfil.js') }}" type="text/javascript"></script>