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
  <title>Cogitavi - Início</title>
  <link href = "{{ asset('lupa.png') }}" rel="icon" />
  <!-- Bootstrap icons-->
  <link href = "{{ asset('bootstrap-4.6.2-dist/css/bootstrap.min.css') }}" rel="stylesheet" />
  <!--<link rel="stylesheet" href="<?php $app?>/../public/bootstrap-4.6.2-dist/css/bootstrap.min.css">-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
  <!-- Google fonts-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <!-- Core theme CSS -->
  <link href = "{{ asset('css/geral.css') }}" rel="stylesheet" />
  <link href = "{{ asset('css/home.css') }}" rel="stylesheet" />
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
      <a href="home.html" class="navbar-brand"><img class="logo-cogitavi" src="{{ asset('logo_cogitavi_vbegebranco.png') }}"></a>
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
  
  <!-- Showcase --> <!-- p-padding telas pequenas, pt-padding top, lg-tela grande-->
  <section class="section-showcase text-white p-5 text-center text-sm-start d-flex" style="background-image: url('{{ asset('img3.jpg') }}'); background-size: cover; background-position: center;">
    <div class="container d-flex justify-content-center">
      <div class="d-md-flex align-items-center justify-content-between col-5 aling-self-center" id="section">
        <div class="quadrado-showcase w-100">
          <h1 class="title" style="--duration: 1s">
          <span style="--delay: 0.5s"> Encontre o perdido, </span>
          <span style="--delay: 0.8s"> Recupere o achado. </span>
          </h1>
          <p class="lead my-3">
            Encontre seu objeto perdido!
          </p>
          <a href="objAchados.html" id="venderProd">
            <button class="btn btn_vender btn-lg" href>  
              Procurar
            </button>
          </a>
        </div>
      </div>
      <div class="separate"></div>
    </div>
  </section>

  <!-- Perguntas -->
  <section id="perguntas" class="p-5">
    <div class="container">
      <h2 class="text-center mb-4">Perguntas Frequentes</h2>
      <div class="accordion accordion-flush" id="questions">
        <!-- Item 1 -->
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#question-one">
              Como pesquisar objetos achados?
            </button>
          </h2>
          <div id="question-one" class="accordion-collapse collapse" data-bs-parent="#questions">
            <div class="accordion-body">
              Vestuário e acessórios para mulher, homem e criança. Não é permitido vender artigos
              que não estejam em conformidade com qualquer lei, regra ou regulamento aplicável, artigos
              falsificados, reproduções ilícitas, artigos recebidos como oferta, animais vivos, medicamentos,
              produtos higiênicos, comida, bedida, cosméticos e eletrônicos. 
            </div>
          </div>
        </div>
        <!-- Item 2 -->
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#question-two">
              Como licitar em um leilão?
            </button>
          </h2>
          <div id="question-two" class="accordion-collapse collapse" data-bs-parent="#questions">
            <div class="accordion-body">
              <ol start="1">
                <li>Cria uma conta se ainda não é membro da nossa comunidade.</li>
                <li>Descobre o que podes vender na 2HandClothes.</li>
                <li>Tira de 4 a 5 boas fotografias do teu produto e adiciona ao anúncio.</li>
                <li>Cria uma descrição breve e honesta sobre o produto, e seleciona o tamanho, a marca e a categoria do mesmo.</li>
                <li>Para finalizar, informa o preço do artigo. Lembra-te que não pagas qualquer taxa sobre este valor.</li>
                <li>Quando vender, é só empacotar e enviar o pedido de acordo com as opções do comprador.</li>
                <li>Entregue! Assim que o comprador confirmar a entrega, o teu pagamento ficará disponível.</li>
              </ol>
            </div>
          </div>
        </div>
        <!-- Item 3 -->
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#question-three">
              Como reportar um objeto perdido?
            </button>
          </h2>
          <div id="question-three" class="accordion-collapse collapse" data-bs-parent="#questions">
            <div class="accordion-body">
              <ol start="1">
                <li>Cria uma conta se ainda não é membro da nossa comunidade.</li>
                <li>Encontra um artigo que gostes.</li>
                <li>Contacta o vendedor se deseja esclarecer alguma dúvida.</li>
                <li>Paga o artigo, introduz a tua morada e escolhe a opção de entrega.</li>
                <li>Recebido! Diz-nos se o artigo foi entregue e se está tudo bem.</li>
                <li>Caso não esteja tudo bem, contacta-nos.</li>
              </ol>
            </div>
          </div>
        </div>
        
        </div>
      </div>
    </div>
  </section>


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
          <a href="" class="link_footer">Defenições de Cookies </a>
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
