<!-- <!DOCTYPE html> -->
<html>
<head>
<meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!--Boostrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />
  <title>Cogitavi - Editar Perfil</title>
  <link rel="icon" type="image/x-icon" href="../../public/lupa.png">
  <!-- Bootstrap icons-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
  <!-- Google fonts-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <!-- Core theme CSS -->
  <link rel="stylesheet" href="../css/geral.css" />
  <link rel="stylesheet" href="../css/perfil.css" />
</head>
<body>



  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark cor-nav-bar py-2 fixed-top">
    <div class="container d-flex justify-content-center">
      <div class="collapse navbar-collapse col-4" id="navmenu">
        <ul class="nav navbar-nav">
          <li class="nav-item">
            <a href="home.html#perguntas" class="nav-link">Perguntas</a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link">Leilões</a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link">Objetos Achados</a>
          </li>
          </ul>
      </div>
      <!--Logotipo-->
      <a href="home.html" class="navbar-brand"><img class="logo-cogitavi" src="../../public/logo_cogitavi_vbegebranco.png"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!--<form action="search.php" method="POST">
        <input type="text" name="search" placeholder="Pesquisar..">
        <div id="teste">
          <button type="submit" name="submit-search" class="searchButton bi bi-search"></button>
        </div>
      </form>-->
      <div class="collapse navbar-collapse col-4" id="navmenu">
        <ul class="nav navbar-nav ms-auto">

          <li class="nav-item">
            <a href="" class="nav-link">Registo</a>
          </li>

          <li class="nav-item dropdown">
            <a href="" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-bs-toggle="dropdown">
              Login
            </a>
            <ul class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item bi bi-person-fill" href="perfil.html" > Utilizador </a></li>
              <li><a class="dropdown-item bi bi-heart-fill" href="meusObjsPerdidos.html"> Polícia </a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a href="" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-bs-toggle="dropdown">
              Perfil
            </a>
            <ul class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item bi bi-person-fill" href="perfil.html" > Perfil </a></li>
              <li><a class="dropdown-item bi bi-heart-fill" href="meusObjsPerdidos.html"> Meus objetos perdidos </a></li>
              <li><a class="dropdown-item bi bi-bag-fill" href=""> Minhas licitações </a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link">Terminar sessão</a>
          </li>  
        </ul>
      </div>
    </div>
  </nav>

  
  <div class="container">
		<div class="main-body">
      <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
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
									<h6 class="mb-0">Full Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="John Doe">
								</div>
							</div>
              <hr>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Email</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="john@example.com">
								</div>
							</div>
              <hr>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Phone</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="(239) 816-9029">
								</div>
							</div>
              <hr>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Mobile</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="(320) 380-4539">
								</div>
							</div>
              <hr>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Address</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="Bay Area, San Francisco, CA">
								</div>
							</div>
              <hr>
							<div class="row">
								<div class="col-sm-9 text-secondary">
									<a class="btn btn-save px-3" href=perfil.html>Salvar Mudanças</a>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>


<!-- Footer -->
<footer class="m-0 py-5 px-1 position-sticky-bottom container-fluid" id="footer">
  <div class="m-0 container-fluid justify-content-between row">
    <div class="col-4 d-inline">
      <ol class="">
        <li class="link_footer">
          Sobre Nós
        </li>
        <li class="link_footer">
          Serviços
        </li>
        <li class="link_footer">
          Ajuda
        </li>
        <li class="link_footer">
          Perguntas Frequentes
        </li>
      </ol>
    </div>
  </div>
  <hr/>
    <div class="container-fluid d-inline-flex m-0">
      <div class="px-1">
        <i class="bi bi-envelope p-1"></i>cogitavi@gmail.com &emsp; 
      </div>
      <div class="px-1">
        <i class="bi bi-telephone p-1">&emsp;</i>(+351) 939 574 381&emsp;&emsp;
      </div>
      <div class="px-1">
        <i class="bi bi-geo-alt">&emsp;</i> Rua dos Orvalhos 10, Lisboa &emsp;&emsp;
      </div>
    </div>
  <hr/>
    <div class="container-fluid d-inline-flex m-0">
      <div class="px-1">
        <a href="" class="link_footer">Política de Privacidade</a>
      </div>
      <div class="px-1">
        <a href="" class="link_footer">Termos e Condições</a>
      </div>
      <div class="px-1">
        <a href="" class="link_footer">Definições de Cookies </a>
      </div>
    </div>
  </div>
</footer>



  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
    crossorigin="anonymous">
  </script>
  <!-- JavaScript -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" 
    crossorigin="anonymous">
  </script>

  </body>
</html>