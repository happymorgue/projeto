
<header>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark cor-nav-bar py-3 fixed-top">
    <div class="container d-flex justify-content-around">
        <!--Logotipo-->
        <div class="d-none d-lg-block col-md-4 col-lg-4 col-xl-4 col-xxl-4 ps-lg-3"> <!-- retirei o justify-content-around para alinhar a esquerda-->
          <div class="collapse navbar-collapse w-100"> 
            <a href="/homePolicia" class="navbar-brand"><img class="logo-cogitavi" src="{{ asset('logo_cogitavi_vbegebranco.png') }}"></a>
          </div>
        </div>
        <!--Logotipo small screen tab-->
        <div class="d-lg-none d-md-flex d-sm-inline-flex justify-content-around">
          <div class="col-2-sm col-2-md">
            <div class="collapse navbar-collapse w-100 d-flex justify-content-center">
              <a href="/homePolicia" class="navbar-brand"><img class="logo-cogitavi" src="{{ asset('logo_cogitavi_vbegebranco.png') }}"></a>
            </div>
          </div>
          <div class="col-2-sm col-2-md">
            <button class="navbar-toggler d-flex justify-content-around" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
              <span class="navbar-toggler-icon"></span>
            </button>
          </div>
        </div>
        <!--Search bar, needs fixing for sm (and maybe for xl not sure will need joao to test it)-->
        <div class="collapse navbar-collapse col-md-4 col-lg-4 col-xl-4 col-xxl-4">
          <form class="d-flex container-fluid m-0" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-primary" type="submit">Search</button>
          </form>
        </div>

      <div class="collapse navbar-collapse col-md-4 col-lg-4 col-xl-4 col-xxl-4" id="navmenu">
        <ul class="nav navbar-nav ms-auto">

          <li class="nav-item dropdown px-2">
            <a href="" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-bs-toggle="dropdown">
              Objetos
            </a>
            <ul class="dropdown-menu dropdown-menu-end  " aria-labelledby="navbarDropdownMenuLink">
              <!-- <div class="horizontal-line"></div> -->
              <li><a class="dropdown-item bi bi-person-fill" href="/verPoliciaObjAchados" > Objetos Achados </a></li>
              <div class="horizontal-line2"></div>
              <li><a class="dropdown-item bi bi-person-fill" href="/registarObjAchado" > Novo Objeto Achado </a></li>
              <div class="horizontal-line2"></div>
              <li><a class="dropdown-item bi bi-heart-fill" href="/buscaObjPerdidos"> Objetos Perdidos </a></li>
            </ul>
          </li>

          <li class="nav-item dropdown px-2">
            <a href="" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-bs-toggle="dropdown">
              Perfil
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
          <div class="layout">
          <h5 class="conta" >Olá,</h5> 
            <h5 class="conta" name="nome2"></h5> 
          </div>
            <div class="horizontal-line"></div>
              <li><a class="dropdown-item bi bi-person-fill" href="/perfilPolicia" > Perfil </a></li>
              <div class="horizontal-line2"></div>
              <li><a class="dropdown-item bi bi-person-fill" href="/postosPolicia" > Postos de Polícia </a></li>
              <div class="horizontal-line2"></div>
              <li><a class="dropdown-item bi bi-bag-fill link" href="/logout">Terminar sessão</a>
              <div class="horizontal-line2"></div>
              <li><a class="dropdown-item bi bi-bag-fill link deleteAcc" href="">Apagar Conta</a>
            </ul>
          </li>

        </ul>
      </div>
<<<<<<< HEAD
<<<<<<< HEAD
      <!--Search bar, needs fixing for sm (and maybe for xl not sure will need joao to test it)-->
      <div class="collapse navbar-collapse col-4-sm col-4-md">
        <form class="d-flex container-fluid m-0" role="search">
          <input class="form-control me-2" type="search" placeholder="Pesquisa" aria-label="Search">
          <button class="btn btn-primary btnSearch">
            <i class="bi bi-search search"></i> 
          </button>
        </form>
      </div>

    <div class="collapse navbar-collapse col-4" id="navmenu">
      <ul class="nav navbar-nav ms-auto">

        <li class="nav-item dropdown">
          <a href="" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-bs-toggle="dropdown">
            Objetos
          </a>
          <ul class="dropdown-menu dropdown-menu-end  " aria-labelledby="navbarDropdownMenuLink">
            <!-- <div class="horizontal-line"></div> -->
            <li><a class="dropdown-item" href="/verPoliciaObjAchados" > Objetos Achados </a></li>
            <div class="horizontal-line2"></div>
            <li><a class="dropdown-item" href="/registarObjAchado" > Novo Objeto Achado </a></li>
            <div class="horizontal-line2"></div>
            <li><a class="dropdown-item" href="/buscaObjPerdidos"> Objetos Perdidos </a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a href="" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-bs-toggle="dropdown">
            Perfil
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
         <div class="layout">
         <h5 class="conta" >Olá, </h5> 
          <h5 class="conta" name="nome"></h5> 
         </div>
          <div class="horizontal-line"></div>
            <li><a class="dropdown-item" href="/perfilPolicia" > Perfil </a></li>
            <div class="horizontal-line2"></div>
            <li><a class="dropdown-item" href="/postosPolicia" > Postos de Polícia </a></li>
            <div class="horizontal-line2"></div>
            <li><a class="dropdown-item link" href="/logout">Terminar sessão</a>
            <div class="horizontal-line2"></div>
            <li><a class="dropdown-item link deleteAcc" href="">Apagar Conta</a>
          </ul>
        </li>

      </ul>
=======
>>>>>>> 9066e1b00a697b86c108ca8966ec097f50b7c32f
=======
>>>>>>> Luiza
    </div>
  </nav>
</header>

<script src="{{ asset('js/nomePerfil.js') }}" type="text/javascript"></script>
