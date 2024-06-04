<header>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark cor-nav-bar py-3 fixed-top">
  <div class="container d-flex justify-content-between align-items-center">
      <!-- Logo para telas grandes ou + -->
      <div class="d-none d-lg-flex col-lg-4 col-xl-4 col-xxl-4 ps-lg-3">
        <a href="/homeGeral" class="navbar-brand">
          <img class="logo-cogitavi" src="{{ asset('logo_cogitavi_vbegebranco.png') }}">
        </a>
      </div>
      <!-- Menu hamburguer para telas medias ou - -->
      <div class="d-flex align-items-center d-lg-none">
        <!-- Hamburger menu button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>

      <!-- Logo centrado para telas medias ou - -->
      <div class="d-flex justify-content-center flex-grow-1 d-lg-none">
        <a href="/homeGeral" class="navbar-brand">
          <img class="logo-cogitavi" src="{{ asset('logo_cogitavi_vbegebranco.png') }}">
        </a>
      </div>

      <!-- Search bar para telas grandes ou + -->
      <div class="d-none d-lg-flex justify-content-center col-lg-4 col-xl-4 col-xxl-4">
        <form class="d-flex container-fluid m-0" role="search">
          <input class="form-control me-2" type="search" placeholder="Pesquisa" aria-label="Search">
          <button class="btn btn-primary btnSearch">
            <i class="bi bi-search search"></i>
          </button>
        </form>
      </div>

      <!-- Navbar collapse content -->
      <div class="collapse navbar-collapse justify-content-end col-lg-4 col-xl-4 col-xxl-4" id="navmenu">
        <!-- Search bar para telas pequenas -->
        <div class="d-lg-none my-2">
          <form class="d-flex container-fluid m-0" role="search">
            <input class="form-control me-2" type="search" placeholder="Pesquisa" aria-label="Search">
            <button class="btn btn-primary btnSearch">
              <i class="bi bi-search search"></i>
            </button>
          </form>
        </div>

        <!-- Navbar links -->
        <ul class="navbar-nav ms-auto">
          @if(isset($_SESSION['user_email']))
          <li class="nav-item me-2">
            <a href="/leiloes" class="nav-link">Leilões</a>
          </li>
          <li class="nav-item dropdown me-2">
            <a href="" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-bs-toggle="dropdown">
              Objetos
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item link" href="/buscaObjAchados">Objetos achados</a></li>
              <div class="horizontal-line2"></div>
              <li><a class="dropdown-item link" href="/verObjPerdidos">Meus objetos perdidos</a></li>
              <div class="horizontal-line2"></div>
              <li><a class="dropdown-item link" href="/meusleiloes">Leilões Subscritos</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a href="" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-bs-toggle="dropdown">
              Perfil
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
              <div class="layout">
                <h5 class="conta">Olá,</h5>
                <h5 class="conta" name="nome2"></h5>
              </div>
              <div class="horizontal-line"></div>
              <li><a class="dropdown-item link" href="/perfilRegular">Perfil</a></li>
              <div class="horizontal-line2"></div>
              <li><a class="dropdown-item link" href="/verObjPerdidos">Meus objetos perdidos</a></li>
              <div class="horizontal-line2"></div>
              <li><a class="dropdown-item link" href="/logout">Terminar sessão</a></li>
              <div class="horizontal-line2"></div>
              <li><a class="dropdown-item link deleteAcc" href="/api/utilizador/conta/apagar">Apagar Conta</a></li>
            </ul>
          </li>
          @else
          <li class="nav-item me-2">
            <a href="/leiloesLoggedOut" class="nav-link">Leilões</a>
          </li>
          <li class="nav-item">
            <a href="/login" class="nav-link">Iniciar Sessão</a>
          </li>
          <li class="nav-item dropdown">
            <a href="" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-bs-toggle="dropdown">
              Registo
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="/register_dono">Utilizador</a></li>
              <li><a class="dropdown-item" href="/register_policia">Polícia</a></li>
            </ul>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>
</header>

<script src="{{ asset('js/nomePerfil.js') }}" type="text/javascript"></script>
