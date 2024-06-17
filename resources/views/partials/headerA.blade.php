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
          <li class="nav-item dropdown me-2">
            <a class="nav-link" id="navbarDropdownMenuLink" href="/adminLeiloes">
              Objetos e Leilões
            </a>
          </li>
          <li class="nav-item me-2">
            <a href="/adminCategoriasAtributos" class="nav-link">
              Categorias e Atributos
            </a>
          </li>
          <li class="nav-item dropdown me-2">
            <a class="nav-link" id="navbarDropdownMenuLink" href="/adminStats">
              Estatísticas
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>

