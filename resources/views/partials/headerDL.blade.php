


<header>
  <!-- Navbar -->
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
            <a href="/leiloes" class="nav-link">Leilões</a>
          </li>
          <li class="nav-item d-flex justify-content-around px-2">
            <a href="/buscaObjAchados" class="nav-link">Objetos</a>
          </li>
        </ul>
      </div>
      <!--Search bar, needs fixing for sm (and maybe for xl not sure will need joao to test it)-->
      <div class="collapse navbar-collapse col-4-sm col-4-md">
        <form class="d-flex container-fluid m-0" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-primary" type="submit">Search</button>
        </form>
      </div>
      <div class="collapse navbar-collapse col-2-lg" id="navmenu">
        <ul class="nav navbar-nav d-flex justify-content-end w-100">
        @if(isset($_SESSION['user_email'])) <!-- Check if user_id session key exists -->
          <!-- If exists, user logged in -->
          <li class="nav-item dropdown d-flex justify-content-around px-2">
            <a href="" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-bs-toggle="dropdown">
              Perfil
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
            <div class="layout">
              <h5 class="conta" >Olá,</h5> 
              <h5 class="conta" name="nome"></h5> 
            </div>
              <div class="horizontal-line"></div>
              <li><a class="dropdown-item bi bi-person-fill link" href="/perfilRegular" > Perfil </a></li> 
              <!-- <hr> -->
              <div class="horizontal-line2"></div>
              <li><a class="dropdown-item bi bi-heart-fill link" href="/verObjPerdidos"> Meus objetos perdidos </a></li>
               <!-- <hr>  -->
              <div class="horizontal-line2"></div>
              <li><a class="dropdown-item bi bi-bag-fill link" href=""> Minhas licitações </a></li>
              <div class="horizontal-line2"></div>
              <li><a class="dropdown-item bi bi-bag-fill link" href="/logout">Terminar sessão</a>
              <div class="horizontal-line2"></div>
              <li><a class="dropdown-item bi bi-bag-fill link deleteAcc" href="">Apagar Conta</a>
          </li>
            </ul>
          </li> 
          @else
          <!-- If not, user logged out -->
          <li class="nav-item d-flex justify-content-center px-2">
            <a href="/login" class="nav-link">Iniciar Sessão</a>
          </li>
          <li class="nav-item dropdown d-flex justify-content-center px-2">
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

<script src="{{ asset('js/perfil.js') }}" type="text/javascript"></script>