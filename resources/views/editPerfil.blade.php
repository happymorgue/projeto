<!-- <!DOCTYPE html> -->
@extends('layouts.layoutDL')

@section('title', 'Cogitavi - Editar Perfil')

@section('content')

  
  <div class="container bgPerfil">
		<div class="main-body">
      <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="rounded-circle" width="150">
                <div class="mt-3">
                  <h4>John Doe</h4>
                  <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                </div>
              </div>
            </div>
          </div>
        </div>
				<div class="col-lg-8">
					<div class="card">
						<div class="card-body">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Nome</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" placeholder="John Doe" value="">
								</div>
							</div>
              <hr>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Telemóvel</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" placeholder="(351) 948 284 195" value="">
								</div>
							</div>
              <hr>
			 				 <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Género</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<select class="form-select">
										<option value="" selected>Selecione</option>
										<option value="male">Masculino</option>
										<option value="female">Feminino</option>
										<option value="other">Outro</option>
									</select>
								</div>
							</div>
              <hr>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Morada</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" placeholder="Bay Area, San Francisco, CA" value="">
								</div>
							</div>
              <hr>
			  <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">NIF</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control"  placeholder="907655321" value="">
								</div>
							</div>
              <hr>
			  <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">ID Civil</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control"  placeholder="98765432" value="">
								</div>
							</div>
              <hr>
			  <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Data de Nascimento</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="date" class="form-control" value="">
								</div>
							</div>
              <hr>
							<div class="row">
								<div class="col-sm-9 text-secondary">
									<a class="btn btn-primary px-3" href=/perfilRegular>Salvar Mudanças</a>
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