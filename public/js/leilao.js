var idRegular;
var idLeilao;
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
            idLeilao = leilao['id'];
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
            img.alt = 'Imagem do objeto';
            img.onerror = function () {
                img.src = '/storage/imagens_objetos/default_objeto.jpg';
            };
            img.className = 'w-100';
            divImage.appendChild(img);

            divInfo = document.createElement('div');
            divInfo.className = 'col-sm-12 col-md-12 col-lg-6 col-xl-6 d-flex flex-column justify-content-between';

            divObjeto = document.createElement('div');
            divObjeto.className = 'nome align-self-start';
            h5DescricaoObjeto = document.createElement('h5');
            h5DescricaoObjeto.innerHTML = "Descrição: " + leilao['objeto']['descricao'];
            divObjeto.appendChild(h5DescricaoObjeto);
            pLocalObjeto = document.createElement('p');
            pLocalObjeto.className = 'text-muted fw-light';
            pLocalObjeto.innerHTML = "Localização: " + leilao['objeto']['localizacao'];
            divObjeto.appendChild(pLocalObjeto);

            pCategoriaObjeto = document.createElement('p');
            pCategoriaObjeto.className = 'text-muted fw-light';
            pCategoriaObjeto.innerHTML = "Categoria: " + leilao['objeto']['categoria']['nome'];
            divObjeto.appendChild(pCategoriaObjeto);

            leilao['objeto']['atributos'].forEach(atributo => {
                pAtributoObjeto = document.createElement('p');
                pAtributoObjeto.className = 'text-muted fw-light';
                pAtributoObjeto.innerHTML = atributo['nome'] + ": " + atributo['valor'];
                divObjeto.appendChild(pAtributoObjeto);
            });

            if (leilao['objeto']['atributos'].length == 0) {
                pAtributoObjeto = document.createElement('p');
                pAtributoObjeto.className = 'text-muted fw-light';
                pAtributoObjeto.innerHTML = "Este objeto não possuí atributos associados";
                divObjeto.appendChild(pAtributoObjeto);
            }

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
            if (leilao['estado'] == 'T' || leilao['estado'] == 'I') {
                divBotao1.disabled = 'true';
            }

            divBotao2 = document.createElement('button');
            divBotao2.className = 'btn btn-outline-primary btn-sm mt-2';
            divBotao2.innerHTML = 'Inscrever-se';
            divBotao2.type = 'button';
            if (leilao['estado'] == 'T') {
                divBotao2.disabled = 'true';
            }

            divBotao3 = document.createElement('button');
            divBotao3.className = 'btn btn-outline-primary btn-sm mt-2';
            divBotao3.innerHTML = 'Voltar';
            divBotao3.type = 'button';

            // Voltar a página anterior que estava
            divBotao3.addEventListener('click', function () {
                window.history.back();
            });

            divInfoParaLicitante.appendChild(divBotao1);
            divInfoParaLicitante.appendChild(divBotao2);
            divInfoParaLicitante.appendChild(divBotao3);


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

            pedidoVerificarSubscricao = new XMLHttpRequest();
            pedidoVerificarSubscricao.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(pedidoVerificarSubscricao.responseText);
                    var responseJson = JSON.parse(pedidoVerificarSubscricao.responseText);
                    console.log(responseJson);
                    if (responseJson['subscrito']) {
                        divBotao2.innerHTML = 'Cancelar Subscrição';
                        divBotao2.addEventListener('click', function () {
                            inscreverLeilao(leilao['id'], event);
                        });
                    } else {
                        divBotao2.addEventListener('click', function () {
                            inscreverLeilao(leilao['id'], event);
                        });
                    }
                }
            }
            pedidoVerificarSubscricao.open("GET", "/api/regular/licitante/" + idRegular + "/verificarSubscricao/" + leilao['id'], false)
            pedidoVerificarSubscricao.send();

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


            console.log(leilao['valor']);
            $('#licitarModal').on('show.bs.modal', function (event) {
                // Replace this with the actual current bid value
                var currentBid = leilao['valor'] + 1;

                // Get the input field
                var inputField = document.getElementById('licitacaoUser');

                // Set the min attribute
                inputField.min = currentBid;

                inputField.value = currentBid;

                // Add an input event listener
                inputField.addEventListener('input', function () {
                    if (this.value < currentBid) {
                        this.value = currentBid;
                    }
                });
            })
            console.log(leilao['valor']);




        }

    }
    pedidoLeilao.open("GET", "/api/regular/licitante/" + idRegular + "/verHistoricoLeilao/" + window.location.href.split('/')[4], true);
    pedidoLeilao.send();
}

function inscreverLeilao(idLeilao, event) {
    if (event.target.innerHTML == 'Cancelar Subscrição') {
        cancelarSubLeilao(idLeilao, event);
        return;
    }
    let pedido2 = new XMLHttpRequest();
    pedido2.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var idRegular = JSON.parse(pedido2.responseText);
            let pedido = new XMLHttpRequest();
            pedido.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log("Subbed com sucesso");
                    event.target.innerHTML = 'Cancelar Subscrição';
                }
            }
            pedido.open("GET", "/api/regular/licitante/" + idRegular + "/subscreverLeilao/" + idLeilao, true)
            pedido.send();
        }

    }
    pedido2.open("GET", "/api/convertUserEmailRegularId", true)
    pedido2.send();
}

function cancelarSubLeilao(idLeilao, event) {
    let pedido2 = new XMLHttpRequest();
    pedido2.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var idRegular = JSON.parse(pedido2.responseText);
            let pedido = new XMLHttpRequest();
            pedido.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log("Cancelado com sucesso");
                    event.target.innerHTML = 'Inscrever-se';
                }
            }
            pedido.open("GET", "/api/regular/licitante/" + idRegular + "/anularSubscreverLeilao/" + idLeilao, true)
            pedido.send();
        }
    }
    pedido2.open("GET", "/api/convertUserEmailRegularId", true)
    pedido2.send();
}



function licitar() {
    let pedido2 = new XMLHttpRequest();
    pedido2.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var idRegular = JSON.parse(pedido2.responseText);
            let pedido = new XMLHttpRequest();
            let json = '{ "valor": ' + document.getElementById('licitacaoUser').value + '}';
            let JsonParse = JSON.parse(json);
            pedido.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    window.location.reload();
                }
            }
            pedido.open("POST", "/api/regular/licitante/" + idRegular + "/licitar/" + idLeilao, true)
            pedido.setRequestHeader("Content-Type", "application/json");
            pedido.send(JSON.stringify(JsonParse));
        }
    }
    pedido2.open("GET", "/api/convertUserEmailRegularId", true)
    pedido2.send();
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
