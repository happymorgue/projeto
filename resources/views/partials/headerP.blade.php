 <!-- Navbar -->
 <nav class="navbar navbar-expand-lg bg-dark navbar-dark cor-nav-bar py-2 fixed-top">
  <div class="container d-flex justify-content-center">
    <div class="collapse navbar-collapse col-4" id="navmenu">
      <ul class="nav navbar-nav">
        <li class="nav-item">
          <a href="/homePolicia#perguntas" class="nav-link">Perguntas</a>
        </li>
        <li class="nav-item">
          <a href="" class="nav-link">Leilões</a>
        </li>
        </ul>
    </div>
    <!--Logotipo-->
    <a href="/homePolicia" class="navbar-brand"><img class="logo-cogitavi" src="{{ asset('logo_cogitavi_vbegebranco.png') }}"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse col-4" id="navmenu">
      <ul class="nav navbar-nav ms-auto">

        <li class="nav-item dropdown">
          <a href="" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-bs-toggle="dropdown">
            Objetos
          </a>
          <ul class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item bi bi-person-fill" href="/verPoliciaObjAchados" > Objetos Achados </a></li>
            <li><a class="dropdown-item bi bi-person-fill" href="/registarObjAchado" > Novo Objeto Achado </a></li>
            <li><a class="dropdown-item bi bi-heart-fill" href="/buscaObjPerdidos"> Objetos Perdidos </a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a href="" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-bs-toggle="dropdown">
            Perfil
          </a>
          <ul class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item bi bi-person-fill" href="/perfilPolicia" > Perfil </a></li>
            <li><a class="dropdown-item bi bi-person-fill" href="/postosPolicia" > Postos de Polícia </a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="/logout" class="nav-link">Terminar sessão</a>
        </li>  
      </ul>
    </div>
  </div>
</nav>