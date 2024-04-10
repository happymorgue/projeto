<!-- <!DOCTYPE html> -->
@extends('layouts.layoutDL')

@section('title', 'Cogitavi - Início')

@section('content')


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
        <div class="accordion" id="questions">
            <!-- Item 1 -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-one">
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
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-two">
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
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-three">
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
</section>
  @endsection


