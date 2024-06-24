function carregarLeiloes() {
    let pedido = new XMLHttpRequest();
    pedido.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var idRegular = JSON.parse(pedido.responseText);
            let pedido2 = new XMLHttpRequest();
            pedido2.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var responseJson = JSON.parse(pedido2.responseText);
                    console.log(responseJson);
                    let leiloes = responseJson['leiloes'];
                    console.log(leiloes);
                    let divGlobal = document.getElementById('leiloes');
                    leiloes.forEach(leilao => {
                        console.log(leilao);

                        let divContainer = document.createElement('div');
                        divContainer.className = 'row justify-content-center mb-3 ';

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
                        img.alt = 'Imagem do objeto';
                        img.onerror = function () {
                            img.src = '/storage/imagens_objetos/default_objeto.jpg';
                        };
                        img.className = 'w-100';

                        divCardImage.appendChild(img);
                        divCardContainerImage.appendChild(divCardImage);

                        let divCardContainerObjectInfo = document.createElement('div');
                        divCardContainerObjectInfo.className = 'col-md-6 col-lg-6 col-xl-6';

                        let divCardObjectInfoName = document.createElement('h5');
                        divCardObjectInfoName.className = 'card-title';
                        divCardObjectInfoName.innerHTML = "Data final do leilão: " + leilao['data_fim'];
                        let divCardObjectInfoDesc = document.createElement('p');
                        divCardObjectInfoDesc.className = 'mb-4 mb-md-0';
                        divCardObjectInfoDesc.style = 'overflow: hidden; overflow - wrap: break-word;';
                        divCardObjectInfoDesc.innerHTML = "Descrição: " + leilao['objeto']['descricao'];

                        divCardContainerObjectInfo.appendChild(divCardObjectInfoName);
                        divCardContainerObjectInfo.appendChild(divCardObjectInfoDesc);

                        let divCardContainerLeilaoInfo = document.createElement('div');
                        divCardContainerLeilaoInfo.className = 'col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start';

                        let divCardLeilaoInfoValor = document.createElement('div');
                        divCardLeilaoInfoValor.className = 'd-flex flex-row align-items-center mb-1';
                        let divCardLeilaoInfoValorText = document.createElement('h4');
                        divCardLeilaoInfoValorText.className = 'mb-1 me-1';
                        divCardLeilaoInfoValorText.innerHTML = leilao['valor'] + "€";
                        divCardLeilaoInfoValor.appendChild(divCardLeilaoInfoValorText);

                        let divCardLeilaoInfoEstado = document.createElement('h6');
                        let divOpcoesLicitante = document.createElement('div');
                        let botaoLicitar = null;
                        let botaoInscrever = null;

                        if (leilao['estado'] == "A") {
                            divCardLeilaoInfoEstado.className = 'text-success';
                            divCardLeilaoInfoEstado.innerHTML = 'Leilão a Decorrer';

                            botaoLicitar = document.createElement('a');
                            botaoLicitar.className = 'btn btn-primary btn-sm';
                            botaoLicitar.innerHTML = 'Ver Detalhes';
                            botaoLicitar.href = '/leilao/' + leilao['id'];
                            botaoLicitar.role = 'button';

                            botaoInscrever = document.createElement('a');
                            botaoInscrever.className = 'btn btn-outline-primary btn-sm mt-2';
                            botaoInscrever.innerHTML = 'Inscrever-se';
                            botaoInscrever.type = 'button';

                        } else if (leilao['estado'] == "T") {
                            divCardLeilaoInfoEstado.className = 'text-danger';
                            divCardLeilaoInfoEstado.innerHTML = 'Leilão Concluído';

                            botaoLicitar = document.createElement('a');
                            botaoLicitar.className = 'btn btn-primary btn-sm';
                            botaoLicitar.innerHTML = 'Ver Detalhes';
                            botaoLicitar.href = '/leilao/' + leilao['id'];
                            botaoLicitar.role = 'button';

                            botaoInscrever = document.createElement('a');
                            botaoInscrever.className = 'btn btn-outline-primary btn-sm mt-2 disabled';
                            botaoInscrever.innerHTML = 'Inscrever-se';
                            botaoInscrever.type = 'button';
                        } else {
                            divCardLeilaoInfoEstado.className = 'text-warning';
                            divCardLeilaoInfoEstado.innerHTML = 'Leilão começa em breve';

                            botaoLicitar = document.createElement('a');
                            botaoLicitar.className = 'btn btn-primary btn-sm';
                            botaoLicitar.innerHTML = 'Ver Detalhes';
                            botaoLicitar.href = '/leilao/' + leilao['id'];
                            botaoLicitar.role = 'button';

                            botaoInscrever = document.createElement('a');
                            botaoInscrever.className = 'btn btn-outline-primary btn-sm mt-2';
                            botaoInscrever.innerHTML = 'Inscrever-se';
                            botaoInscrever.type = 'button';
                        }

                        let divCardContainerLeilaoInfoLicitante = document.createElement('div');
                        divCardContainerLeilaoInfoLicitante.className = 'd-flex flex-column mt-4';

                        divCardContainerLeilaoInfoLicitante.appendChild(botaoLicitar);
                        divCardContainerLeilaoInfoLicitante.appendChild(botaoInscrever);

                        divCardContainerLeilaoInfo.appendChild(divCardLeilaoInfoValor);
                        divCardContainerLeilaoInfo.appendChild(divCardLeilaoInfoEstado);
                        divCardContainerLeilaoInfo.appendChild(divCardContainerLeilaoInfoLicitante);

                        divCardRow.appendChild(divCardContainerImage);
                        divCardRow.appendChild(divCardContainerObjectInfo);
                        divCardRow.appendChild(divCardContainerLeilaoInfo);
                        divCardBody.appendChild(divCardRow);
                        divCard.appendChild(divCardBody);
                        divLeilao.appendChild(divCard);
                        divContainer.appendChild(divLeilao);

                        divGlobal.appendChild(divContainer);
                        pedidoVerificarSubscricao = new XMLHttpRequest();
                        pedidoVerificarSubscricao.onreadystatechange = function () {
                            if (this.readyState == 4 && this.status == 200) {
                                console.log(pedidoVerificarSubscricao.responseText);
                                var responseJson = JSON.parse(pedidoVerificarSubscricao.responseText);
                                console.log(responseJson);
                                if (responseJson['subscrito']) {
                                    botaoInscrever.innerHTML = 'Cancelar Subscrição';
                                    botaoInscrever.addEventListener('click', function () {
                                        inscreverLeilao(leilao['id'], event);
                                    });
                                } else {
                                    botaoInscrever.addEventListener('click', function () {
                                        inscreverLeilao(leilao['id'], event);
                                    });
                                }
                            }
                        }
                        pedidoVerificarSubscricao.open("GET", "/api/regular/licitante/" + idRegular + "/verificarSubscricao/" + leilao['id'], false)
                        pedidoVerificarSubscricao.send();
                    });
                }
            }
            pedido2.open("GET", "/api/regular/licitante/" + idRegular + "/verLeiloes", true)
            pedido2.send();
        }
    }
    pedido.open("GET", "/api/convertUserEmailRegularId", true)
    pedido.send();
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
                    Swal.fire({
                        title: "Sucesso!",
                        text: "Subscreveu-se a notificações com sucesso!",
                        icon: "success",
                        confirmButtonColor: "#007bff", // Bootstrap's btn-primary color
                        confirmButtonText: "OK",
                    }).then(() => {
                        event.target.innerHTML = 'Cancelar Subscrição';
                    });
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
                    Swal.fire({
                        title: "Sucesso!",
                        text: "Cancelou a sua subscrição com sucesso!",
                        icon: "success",
                        confirmButtonColor: "#007bff", // Bootstrap's btn-primary color
                        confirmButtonText: "OK",
                    }).then(() => {
                        event.target.innerHTML = 'Inscrever-se';
                    });
                }
            }
            pedido.open("GET", "/api/regular/licitante/" + idRegular + "/anularSubscreverLeilao/" + idLeilao, true)
            pedido.send();
        }
    }
    pedido2.open("GET", "/api/convertUserEmailRegularId", true)
    pedido2.send();
}



window.onload = carregarLeiloes();

