
<header>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark cor-nav-bar py-2 fixed-top">
    <div class="container d-flex justify-content-center">
      <div class="collapse navbar-collapse col-4" id="navmenu">
        <ul class="nav navbar-nav">
          <li class="nav-item">
            <a href="/homeGeral#perguntas" class="nav-link">Perguntas</a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link">Leilões</a>
          </li>
          <li class="nav-item">
            <a href="/buscaObjAchados" class="nav-link">Objetos Achados</a>
          </li>
        </ul>
      </div>
      <!--Logotipo-->
      <a href="/homeGeral" class="navbar-brand"><img class="logo-cogitavi" src="{{ asset('logo_cogitavi_vbegebranco.png') }}"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse col-4" id="navmenu">
        <ul class="nav navbar-nav ms-auto">
        @if(isset($_SESSION['user_email'])) <!-- Check if user_id session key exists -->
          <!-- If exists, user logged in -->
          <li class="nav-item dropdown">
            <a href="" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-bs-toggle="dropdown">
              Perfil
            </a>
            <ul class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item bi bi-person-fill" href="/perfilRegular" > Perfil </a></li>
              <li><a class="dropdown-item bi bi-heart-fill" href="/verObjPerdidos"> Meus objetos perdidos </a></li>
              <li><a class="dropdown-item bi bi-bag-fill" href=""> Minhas licitações </a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/logout" class="nav-link">Terminar sessão</a>
          </li>
          @else
          <!-- If not, user logged out -->
          <li class="nav-item">
            <a href="/login" class="nav-link">Login</a>
          </li>
          <li class="nav-item dropdown">
            <a href="" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-bs-toggle="dropdown">
              Registo
            </a>
            <ul class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item bi bi-person-fill" href="/register_dono" > Utilizador </a></li>
              <li><a class="dropdown-item bi bi-heart-fill" href="/register_policia"> Polícia </a></li>
            </ul>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>
</header>