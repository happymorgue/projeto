var idRegular;

function carregarLeiloes_licitacoes() {
    let pedido = xhttp = new XMLHttpRequest();
    pedido.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            idRegular = JSON.parse(pedido.responseText);
            let pedido2 = xhttp = new XMLHttpRequest();
            pedido2.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var responseJson = JSON.parse(pedido2.responseText);
                    let leiloes = responseJson['leilões'];
                    if (leiloes.length == 0) {
                        let divGlobal = document.getElementById('licitacoes');
                        let divRow = document.createElement('div');
                        divRow.className = 'row justify-content-center mb-3 ';
                        divContent = document.createElement('div');
                        divContent.className = 'col-md-12 col-xl-10';
                        let h5 = document.createElement('h5');
                        h5.innerHTML = 'Não está inscrito em nenhum leilão';
                        divContent.appendChild(h5);
                        divRow.appendChild(divContent);
                        divGlobal.appendChild(divRow);
                        return;
                    }
                    console.log(leiloes);
                    let divGlobal = document.getElementById('licitacoes');
                    leiloes.forEach(leilao => {
                        console.log(leilao);

                        let divRow = document.createElement('div');
                        divRow.className = 'row justify-content-center mb-3 ';

                        let divLeilao = document.createElement('div');
                        divLeilao.className = 'col-md-12 col-xl-10';

                        let divCard = document.createElement('div');
                        divCard.className = 'card shadow-0 border rounded-3';

                        let divCardBody = document.createElement('div');
                        divCardBody.className = 'card-body';

                        let divCardRow = document.createElement('div');
                        divCardRow.className = 'row';

                        let divCardContainerImage = document.createElement('div');
                        divCardContainerImage.className = 'col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0';

                        let divCardImage = document.createElement('div');
                        divCardImage.className = 'bg-image';

                        let img = document.createElement('img');
                        img.src = '/storage/imagens_objetos/' + leilao['objeto']['imagem'];
                        img.onerror = function () {
                            img.src = '/storage/imagens_objetos/default_objeto.jpg';
                        };
                        img.className = 'w-100';

                        divCardImage.appendChild(img);
                        divCardContainerImage.appendChild(divCardImage);
                        divCardRow.appendChild(divCardContainerImage);

                        let divCardContainerObjectInfo = document.createElement('div');
                        divCardContainerObjectInfo.className = 'col-md-6 col-lg-6 col-xl-6';

                        let divCardObjectInfoName = document.createElement('h5');
                        if (leilao['estado'] == 'A') {
                            divCardObjectInfoName.className = 'text-success';
                            divCardObjectInfoName.innerHTML = 'Leilão ativo';
                        } else if (leilao['estado'] == 'T') {
                            divCardObjectInfoName.className = 'text-danger';
                            divCardObjectInfoName.innerHTML = 'Leilão terminado';
                        } else {
                            divCardObjectInfoName.className = 'text-warning';
                            divCardObjectInfoName.innerHTML = 'Leilão por começar';
                        }

                        let divCardObjectInfoDesc = document.createElement('p');
                        divCardObjectInfoDesc.className = 'mb-4 mb-md-0';
                        divCardObjectInfoDesc.style = 'overflow: hidden; overflow - wrap: break-word;';
                        divCardObjectInfoDesc.innerHTML = "Descrição: " + leilao['objeto']['descricao'];

                        divCardContainerObjectInfo.appendChild(divCardObjectInfoName);
                        divCardContainerObjectInfo.appendChild(divCardObjectInfoDesc);

                        divCardRow.appendChild(divCardContainerObjectInfo);

                        let divCardContainerObjectInfo2 = document.createElement('div');
                        divCardContainerObjectInfo2.className = 'col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start d-flex flex-column';

                        let divCardContainerObjectInfo2FlexGrow = document.createElement('div');
                        divCardContainerObjectInfo2FlexGrow.className = 'flex-grow-1';

                        let divCardLeilaoInfoValor = document.createElement('div');
                        divCardLeilaoInfoValor.className = 'd-flex flex-row align-items-center mb-1';

                        let divValorAtual = document.createElement('h5');
                        divValorAtual.className = 'mb-1 me-1';
                        divValorAtual.innerHTML = "Valor atual: €" + leilao['valor'];

                        divCardLeilaoInfoValor.appendChild(divValorAtual);
                        divCardContainerObjectInfo2FlexGrow.appendChild(divCardLeilaoInfoValor);

                        let divCardLeilaoInfoMinhaLicitacao = document.createElement('h6');
                        divCardLeilaoInfoMinhaLicitacao.className = 'mb-1 me-1 fw-light';
                        if (leilao['licitacoes'].length == 0) {
                            divCardLeilaoInfoMinhaLicitacao.innerHTML = "Minha licitação: €--"
                        } else {
                            divCardLeilaoInfoMinhaLicitacao.innerHTML = "Minha licitação: €" + leilao['licitacoes'][0]['valor'];
                        }

                        divCardContainerObjectInfo2FlexGrow.appendChild(divCardLeilaoInfoMinhaLicitacao);
                        divCardContainerObjectInfo2.append(divCardContainerObjectInfo2FlexGrow);

                        let divCardLeilaoInfoLicitar = document.createElement('div');
                        divCardLeilaoInfoLicitar.className = 'mt-auto w-100';

                        let divCardLeilaoInfoLicitarBotao = document.createElement('button');
                        divCardLeilaoInfoLicitarBotao.className = 'btn btn-primary btn-sm w-100';
                        divCardLeilaoInfoLicitarBotao.innerHTML = 'Ver Detalhes';
                        divCardLeilaoInfoLicitarBotao.addEventListener('click', function () {
                            window.location.href = '/leilao/' + leilao['id'];
                        });
                        divCardLeilaoInfoLicitarBotao.type = 'button';

                        divCardLeilaoInfoLicitar.appendChild(divCardLeilaoInfoLicitarBotao);
                        divCardContainerObjectInfo2.appendChild(divCardLeilaoInfoLicitar);

                        divCardRow.appendChild(divCardContainerObjectInfo2);



                        divCardBody.appendChild(divCardRow);
                        divCard.appendChild(divCardBody);
                        divLeilao.appendChild(divCard);
                        divRow.appendChild(divLeilao);
                        divGlobal.appendChild(divRow);

                    });

                }
            }
            pedido2.open("GET", "/api/regular/licitante/" + idRegular + "/obterLeiloesSubcritos", true)
            pedido2.send();
        }
    }
    pedido.open("GET", "/api/convertUserEmailRegularId", true)
    pedido.send();
}


function carregarLeiloes_vencer() {
    let pedido = xhttp = new XMLHttpRequest();
    pedido.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var idRegular = JSON.parse(pedido.responseText);
            let pedido2 = xhttp = new XMLHttpRequest();
            pedido2.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var responseJson = JSON.parse(pedido2.responseText);
                    let leiloes = responseJson['leiloes_ganhos'];
                    if (leiloes.length == 0) {
                        let divGlobal = document.getElementById('licitacoes');

                        let divTituloBox = document.createElement('div');
                        divTituloBox.className = 'row justify-content-center mb-3 ';

                        let divTitulo = document.createElement('div');
                        divTitulo.className = 'col-md-12 col-xl-10';

                        let h3vencer = document.createElement('h3');
                        h3vencer.innerHTML = 'Leilões Ganhos';

                        let hr = document.createElement('hr');

                        divTitulo.appendChild(h3vencer);
                        divTitulo.appendChild(hr);
                        divTituloBox.appendChild(divTitulo);
                        divGlobal.appendChild(divTituloBox);



                        let divRow = document.createElement('div');
                        divRow.className = 'row justify-content-center mb-3 ';
                        divContent = document.createElement('div');
                        divContent.className = 'col-md-12 col-xl-10';
                        let h5 = document.createElement('h5');
                        h5.innerHTML = 'Não ganhou nenhum leilão';
                        divContent.appendChild(h5);
                        divRow.appendChild(divContent);
                        divGlobal.appendChild(divRow);
                        return;
                    }
                    console.log(leiloes);
                    let divGlobal = document.getElementById('licitacoes');


                    let divTituloBox = document.createElement('div');
                    divTituloBox.className = 'row justify-content-center mb-3 ';

                    let divTitulo = document.createElement('div');
                    divTitulo.className = 'col-md-12 col-xl-10';

                    let h3vencer = document.createElement('h3');
                    h3vencer.innerHTML = 'Leilões Ganhos';

                    let hr = document.createElement('hr');

                    divTitulo.appendChild(h3vencer);
                    divTitulo.appendChild(hr);
                    divTituloBox.appendChild(divTitulo);
                    divGlobal.appendChild(divTituloBox);



                    leiloes.forEach(leilao => {
                        console.log(leilao);

                        let divRow = document.createElement('div');
                        divRow.className = 'row justify-content-center mb-3 ';

                        let divLeilao = document.createElement('div');
                        divLeilao.className = 'col-md-12 col-xl-10';

                        let divCard = document.createElement('div');
                        divCard.className = 'card shadow-0 border rounded-3';

                        let divCardBody = document.createElement('div');
                        divCardBody.className = 'card-body';

                        let divCardRow = document.createElement('div');
                        divCardRow.className = 'row';

                        let divCardContainerImage = document.createElement('div');
                        divCardContainerImage.className = 'col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0';

                        let divCardImage = document.createElement('div');
                        divCardImage.className = 'bg-image';

                        let img = document.createElement('img');
                        img.src = '/storage/imagens_objetos/' + leilao['objeto']['imagem'];
                        img.onerror = function () {
                            img.src = '/storage/imagens_objetos/default_objeto.jpg';
                        };
                        img.className = 'w-100';

                        divCardImage.appendChild(img);
                        divCardContainerImage.appendChild(divCardImage);
                        divCardRow.appendChild(divCardContainerImage);

                        let divCardContainerObjectInfo = document.createElement('div');
                        divCardContainerObjectInfo.className = 'col-md-6 col-lg-6 col-xl-6';

                        let divCardObjectInfoName = document.createElement('h5');
                        if (leilao['pagamento'] == true) {
                            divCardObjectInfoName.className = 'text-success';
                            divCardObjectInfoName.innerHTML = 'Leilão pago';
                        } else {
                            divCardObjectInfoName.className = 'text-danger';
                            divCardObjectInfoName.innerHTML = 'Leilão por pagar';
                        }

                        let divCardObjectInfoDesc = document.createElement('p');
                        divCardObjectInfoDesc.className = 'mb-4 mb-md-0';
                        divCardObjectInfoDesc.style = 'overflow: hidden; overflow - wrap: break-word;';
                        divCardObjectInfoDesc.innerHTML = "Descrição: " + leilao['objeto']['descricao'];

                        divCardContainerObjectInfo.appendChild(divCardObjectInfoName);
                        divCardContainerObjectInfo.appendChild(divCardObjectInfoDesc);

                        divCardRow.appendChild(divCardContainerObjectInfo);

                        let divCardContainerObjectInfo2 = document.createElement('div');
                        divCardContainerObjectInfo2.className = 'col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start d-flex flex-column';

                        let divCardContainerObjectInfo2FlexGrow = document.createElement('div');
                        divCardContainerObjectInfo2FlexGrow.className = 'flex-grow-1';

                        let divCardLeilaoInfoValor = document.createElement('div');
                        divCardLeilaoInfoValor.className = 'd-flex flex-row align-items-center mb-1';

                        let divValorAtual = document.createElement('h5');
                        divValorAtual.className = 'mb-1 me-1';
                        divValorAtual.innerHTML = "Valor atual: €" + leilao['valor'];

                        divCardLeilaoInfoValor.appendChild(divValorAtual);
                        divCardContainerObjectInfo2FlexGrow.appendChild(divCardLeilaoInfoValor);

                        let divCardLeilaoInfoMinhaLicitacao = document.createElement('h6');
                        divCardLeilaoInfoMinhaLicitacao.className = 'mb-1 me-1 fw-light';
                        if (leilao['licitacoes'].length == 0) {
                            divCardLeilaoInfoMinhaLicitacao.innerHTML = "Minha licitação: €--"
                        } else {
                            let feitaLicitacao = false;
                            leilao['licitacoes'].forEach(licitacao => {
                                if (licitacao['licitante_id'] == idRegular && !feitaLicitacao) {
                                    divCardLeilaoInfoMinhaLicitacao.innerHTML = "Minha licitação: €" + licitacao['valor'];
                                    feitaLicitacao = true;
                                }
                            });
                            if (!feitaLicitacao) {
                                divCardLeilaoInfoMinhaLicitacao.innerHTML = "Minha licitação: €--"
                            }
                        }

                        divCardContainerObjectInfo2FlexGrow.appendChild(divCardLeilaoInfoMinhaLicitacao);
                        divCardContainerObjectInfo2.append(divCardContainerObjectInfo2FlexGrow);

                        let divCardLeilaoInfoLicitar = document.createElement('div');
                        divCardLeilaoInfoLicitar.className = 'mt-auto w-100';

                        let divCardLeilaoInfoLicitarBotao = document.createElement('button');
                        divCardLeilaoInfoLicitarBotao.className = 'btn btn-primary btn-sm w-100';
                        divCardLeilaoInfoLicitarBotao.innerHTML = 'Ver Detalhes';
                        divCardLeilaoInfoLicitarBotao.addEventListener('click', function () {
                            window.location.href = '/leilao/' + leilao['id'];
                        });
                        divCardLeilaoInfoLicitarBotao.type = 'button';

                        let divCardLeilaoInfoLicitarBotao2 = document.createElement('button');
                        divCardLeilaoInfoLicitarBotao2.className = 'btn btn-primary btn-sm w-100 mt-3';
                        divCardLeilaoInfoLicitarBotao2.innerHTML = 'Realizar pagamento';
                        divCardLeilaoInfoLicitarBotao2.addEventListener('click', function () {
                            realizarPagamento(leilao['id']);
                        });
                        divCardLeilaoInfoLicitarBotao2.type = 'button';
                        if (leilao['pagamento'] == true) {
                            divCardLeilaoInfoLicitarBotao2.disabled = true;
                        }

                        divCardLeilaoInfoLicitar.appendChild(divCardLeilaoInfoLicitarBotao);
                        divCardLeilaoInfoLicitar.appendChild(divCardLeilaoInfoLicitarBotao2);
                        divCardContainerObjectInfo2.appendChild(divCardLeilaoInfoLicitar);

                        divCardRow.appendChild(divCardContainerObjectInfo2);



                        divCardBody.appendChild(divCardRow);
                        divCard.appendChild(divCardBody);
                        divLeilao.appendChild(divCard);
                        divRow.appendChild(divLeilao);
                        divGlobal.appendChild(divRow);

                    });

                }
            }
            pedido2.open("GET", "/api/regular/licitante/" + idRegular + "/verHistoricoLeilaoGanho", true)
            pedido2.send();
        }
    }
    pedido.open("GET", "/api/convertUserEmailRegularId", true)
    pedido.send();
}

function realizarPagamento(idLeilao) {
    Swal.fire({
        title: 'Tem a certeza?',
        text: "Após confirmar já não pode voltar atrás!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, pagar!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            console.log(idLeilao);
            let pedidoPagar = new XMLHttpRequest();
            pedidoPagar.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    window.location.reload();
                }
            }
            pedidoPagar.open("GET", "/api/regular/licitante/" + idRegular + "/pagarLeilao/" + idLeilao, true);
            pedidoPagar.send();
        }
    })
}


window.addEventListener('DOMContentLoaded', function () {
    carregarLeiloes_licitacoes();
    carregarLeiloes_vencer();
});

