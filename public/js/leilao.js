var idRegular;
let countdownDate

console.log(window.location.href.split('/')[4]);

window.addEventListener('load', startCountdown);


function carregarLeilao() {
    pedidoLeilao = new XMLHttpRequest();
    pedidoLeilao.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            leilao = JSON.parse(pedidoLeilao.responseText)['leilao'];
            //CARREGAR LEILAO
            console.log(leilao);
            divGlobal = document.getElementById('leilao');

            divContainerLeilao = document.createElement('div');
            divContainerLeilao.className = 'row justify-content-center';

            divLeilao = document.createElement('div');
            divLeilao.className = 'col-sm-12 col-md-12 col-xl-11';

            divCard = document.createElement('div');
            divCard.className = 'card shadow-0 border rounded-3';

            divCardBody = document.createElement('div');
            divCardBody.className = 'card-body p-4';

            divRow = document.createElement('div');
            divRow.className = 'row';

            divContent = document.createElement('div');
            divContent.className = 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-4 mb-lg-0 d-flex';

            divImage = document.createElement('div');
            divImage.className = 'bg-image';
            img = document.createElement('img');
            img.src = '/storage/imagens_objetos/' + leilao['objeto']['imagem'];
            img.onerror = function () {
                img.src = '/storage/imagens_objetos/default_objeto.jpg';
            };
            img.className = 'w-100';
            divImage.appendChild(img);

            divInfo = document.createElement('div');
            divInfo.className = 'col-sm-12 col-md-12 col-lg-6 col-xl-6 d-flex flex-column justify-content-between';

            divObjeto = document.createElement('div');
            divObjeto.className = 'nome align-self-start';
            h3DescricaoObjeto = document.createElement('h3');
            h3DescricaoObjeto.innerHTML = leilao['objeto']['descricao'];
            divObjeto.appendChild(h3DescricaoObjeto);
            pLocalObjeto = document.createElement('p');
            pLocalObjeto.className = 'text-muted fw-light';
            pLocalObjeto.innerHTML = "Localização: " + leilao['objeto']['localizacao'];
            divObjeto.appendChild(pLocalObjeto);
            divInfo.appendChild(divObjeto);

            divTimerLeilao = document.createElement('div');
            divTimerLeilao.className = 'container countdown-container';
            divTimerLeilao.innerHTML = '<div class="countdown d-flex flex-row justify-content-center align-items-center" id="countdown" style="width:70%;"> <span id="days" class="countdown-number">00</span>d <span class="divider">:</span> \
                    <span id="hours" class="countdown-number">00</span>h \
                    <span class="divider">:</span> \
                    <span id="minutes" class="countdown-number">00</span>m\
                    <span class="divider">:</span>\
                    <span id="seconds" class="countdown-number">00</span>s\
                </div> \
            </div > ';
            divInfo.appendChild(divTimerLeilao);

            divValorAtual = document.createElement('div');
            divValorAtual.className = 'col-sm-12 col-md-12 col-lg-12 col-xl-12 price align-self-start align-items-center p-2';
            divValor = document.createElement('div');
            divValor.className = 'd-flex flex-row mb-0';
            h1Valor = document.createElement('h1');
            h1Valor.innerHTML = leilao['valor'] + "€";

            divValor.appendChild(h1Valor);
            divValorAtual.appendChild(divValor);

            h6Terminar = document.createElement('h6');
            h6Terminar.className = 'text-success text-start fw-light';
            h6Terminar.innerHTML = "Termina em: " + leilao['data_fim'];

            divValorAtual.appendChild(h6Terminar);

            divInfoParaLicitante = document.createElement('div');
            divInfoParaLicitante.className = 'd-flex flex-column mt-4';
            divBotao1 = document.createElement('button');
            divBotao1.className = 'btn btn-primary btn-sm';
            divBotao1.innerHTML = 'Licitar';
            divBotao1.type = 'button';
            divBotao1.setAttribute('data-bs-toggle', 'modal');
            divBotao1.setAttribute('data-bs-target', '#licitarModal');

            divBotao2 = document.createElement('button');
            divBotao2.className = 'btn btn-outline-primary btn-sm mt-2';
            divBotao2.innerHTML = 'Inscrever-se';
            divBotao2.type = 'button';

            divInfoParaLicitante.appendChild(divBotao1);
            divInfoParaLicitante.appendChild(divBotao2);



            divInfo.appendChild(divValorAtual);
            divInfo.appendChild(divInfoParaLicitante);
            divContent.appendChild(divImage);
            divRow.appendChild(divContent);
            divRow.appendChild(divInfo);
            divCardBody.appendChild(divRow);
            divCard.appendChild(divCardBody);
            divLeilao.appendChild(divCard);
            divContainerLeilao.appendChild(divLeilao);
            divGlobal.appendChild(divContainerLeilao);

            startCountdown(leilao['data_fim']);




            //LICITACOES
            divGlobalLicitacoes = document.createElement('div');
            divGlobalLicitacoes.className = 'row justify-content-center mt-2';

            divContainerLicitacoes = document.createElement('div');
            divContainerLicitacoes.className = 'col-sm-12 col-md-12 col-xl-11';

            divLicitacoesPanel = document.createElement('div');
            divLicitacoesPanel.className = 'panel';

            divLicitacoesPanelHeader = document.createElement('div');
            divLicitacoesPanelHeader.className = 'panel-heading';

            divLicitacoesRow = document.createElement('div');
            divLicitacoesRow.className = 'row';

            divTabela = document.createElement('div');
            divTabela.className = 'col col-sm-12 col-xs-12 col-md-12 col-lg-12';

            h4Tabela = document.createElement('h4');
            h4Tabela.className = 'title';
            h4Tabela.innerHTML = 'Histórico de Licitações';

            divTabela.appendChild(h4Tabela);

            divPanelBody = document.createElement('div');
            divPanelBody.className = 'panel-body table-responsive';

            divTabelaLicitacoes = document.createElement('table');
            divTabelaLicitacoes.className = 'table';
            divTabelaLicitacoes.innerHTML = '<thead> \
                <tr> \
                    <th>#</th> \
                    <th>ID</th> \
                    <th>Data</th> \
                    <th>Valor</th> \
                </tr> \
            </thead>';


            licitacoes = leilao['licitacoes'];
            let numLicitacoes = 0;
            licitacoes.forEach(licitacao => {
                numLicitacoes += 1;
                divTabelaLicitacoes.innerHTML += '<tr> \
                    <td>'+ numLicitacoes + '</td> \
                    <td>' + licitacao['licitante_id'] + '</td> \
                    <td>' + licitacao['data_licitacao'] + '</td> \
                    <td>' + licitacao['valor'] + '</td> \
                </tr>';



            });
            divPanelBody.appendChild(divTabelaLicitacoes);
            divLicitacoesRow.appendChild(divTabela);
            divLicitacoesPanelHeader.appendChild(divLicitacoesRow);
            divLicitacoesPanel.appendChild(divLicitacoesPanelHeader);
            divLicitacoesPanel.appendChild(divPanelBody);
            divContainerLicitacoes.appendChild(divLicitacoesPanel);
            divGlobalLicitacoes.appendChild(divContainerLicitacoes);
            divGlobal.appendChild(divGlobalLicitacoes);





        }

    }
    pedidoLeilao.open("GET", "/api/regular/licitante/" + idRegular + "/verHistoricoLeilao/" + window.location.href.split('/')[4], true);
    pedidoLeilao.send();
}




function startCountdown(time) {
    // Get the date and time
    console.log(time);
    let dateString = new Date(time + "T00:00:00Z");
    countdownDate = dateString.getTime();

    // Update the countdown every 1 second
    let x = setInterval(function () {
        // Get the current date and time
        let now = new Date().getTime();

        // Calculate the distance between now and the countdown date
        let distance = countdownDate - now;

        // Calculate days, hours, minutes and seconds
        let days = Math.floor(distance / (1000 * 60 * 60 * 24));
        let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        let seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result
        document.getElementById("days").innerHTML = days.
            toString().padStart(2, '0');
        document.getElementById("hours").innerHTML = hours.
            toString().padStart(2, '0');
        document.getElementById("minutes").innerHTML = minutes.
            toString().padStart(2, '0');
        document.getElementById("seconds").innerHTML = seconds.
            toString().padStart(2, '0');

    }, 1000);
}



function obterIdECarregarLeilao() {
    pedidoIdRegular = new XMLHttpRequest();
    pedidoIdRegular.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            idRegular = JSON.parse(pedidoIdRegular.responseText);
            console.log(idRegular);
            carregarLeilao();
        }

    }
    pedidoIdRegular.open("GET", "/api/convertUserEmailRegularId", true);
    pedidoIdRegular.send();
}


window.addEventListener('DOMContentLoaded', function () {
    obterIdECarregarLeilao();
});
