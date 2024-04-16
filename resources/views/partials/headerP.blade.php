<nav class="navbar navbar-expand-lg bg-dark navbar-dark cor-nav-bar py-3 fixed-top">
    <div class="container d-flex justify-content-around">
      <!--Logotipo-->
      <div class="d-none d-lg-block">
        <div class="collapse navbar-collapse w-100 d-flex justify-content-around">
          <a href="/homeGeral" class="navbar-brand"><img class="logo-cogitavi" src="{{ asset('logo_cogitavi_vbegebranco.png') }}"></a>
        </div>
      </div>
      <!--Logotipo small screen tab-->
      <div class="d-lg-none d-md-flex d-sm-inline-flex justify-content-around">
        <div class="col-2-sm col-2-md">
          <div class="collapse navbar-collapse w-100 d-flex justify-content-center">
            <a href="/homeGeral" class="navbar-brand"><img class="logo-cogitavi" src="{{ asset('logo_cogitavi_vbegebranco.png') }}"></a>
          </div>
        </div>
        <div class="col-2-sm col-2-md">
          <button class="navbar-toggler d-flex justify-content-around" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
      <!-- ILL FUCKING FIX THIS SHIT LATER-->
      <div class="collapse navbar-collapse col-2-lg" id="navmenu">
        <ul class="nav navbar-nav d-flex justify-content-start w-100">
          <li class="nav-item d-flex justify-content-around px-2">
            <a href="" class="nav-link">Leilões</a>
          </li>
          <li class="nav-item d-flex justify-content-around px-2">
            <a href="/buscaObjPerdido" class="nav-link">Objetos</a>
          </li>
        </ul>
      </div>

    <div class="collapse navbar-collapse col-4" id="navmenu">
      <ul class="nav navbar-nav ms-auto">

        <li class="nav-item dropdown">
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

        <li class="nav-item dropdown">
          <a href="" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-bs-toggle="dropdown">
            Perfil
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
          <h5 class="conta" >Olá, P</h5> 
          <div class="horizontal-line"></div>
            <li><a class="dropdown-item bi bi-person-fill" href="/perfilPolicia" > Perfil </a></li>
            <div class="horizontal-line2"></div>
            <li><a class="dropdown-item bi bi-person-fill" href="/postosPolicia" > Postos de Polícia </a></li>
            <div class="horizontal-line2"></div>
            <li><a class="dropdown-item bi bi-bag-fill link" href="/logout">Terminar sessão</a>
          </ul>
        </li>

        <!-- <li class="nav-item">
          <a href="/logout" class="nav-link">Terminar sessão</a>
        </li>   -->
      </ul>
    </div>
  </div>
</nav>