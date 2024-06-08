function carregarLeiloes() {
    let pedido2 = xhttp = new XMLHttpRequest();
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
                divCardObjectInfoName.innerHTML = "Data final do leilao: " + leilao['data_fim'];
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
                    botaoLicitar.innerHTML = 'Licitar';
                    botaoLicitar.href = '/register_dono';
                    botaoLicitar.role = 'button';

                    botaoInscrever = document.createElement('a');
                    botaoInscrever.className = 'btn btn-outline-primary btn-sm mt-2';
                    botaoInscrever.innerHTML = 'Inscrever-se';
                    botaoInscrever.href = '/register_dono';
                    botaoInscrever.type = 'button';

                } else if (leilao['estado'] == "T") {
                    divCardLeilaoInfoEstado.className = 'text-danger';
                    divCardLeilaoInfoEstado.innerHTML = 'Leilão Concluido';

                    botaoLicitar = document.createElement('a');
                    botaoLicitar.className = 'btn btn-primary btn-sm disabled';
                    botaoLicitar.innerHTML = 'Licitar';
                    botaoLicitar.href = '/register_dono';
                    botaoLicitar.role = 'button';

                    botaoInscrever = document.createElement('a');
                    botaoInscrever.className = 'btn btn-outline-primary btn-sm mt-2 disabled';
                    botaoInscrever.innerHTML = 'Inscrever-se';
                    botaoInscrever.href = '/register_dono';
                    botaoInscrever.type = 'button';
                } else {
                    divCardLeilaoInfoEstado.className = 'text-warning';
                    divCardLeilaoInfoEstado.innerHTML = 'Leilão começa em breve';

                    botaoLicitar = document.createElement('a');
                    botaoLicitar.className = 'btn btn-primary btn-sm disabled';
                    botaoLicitar.innerHTML = 'Licitar';
                    botaoLicitar.href = '/register_dono';
                    botaoLicitar.role = 'button';

                    botaoInscrever = document.createElement('a');
                    botaoInscrever.className = 'btn btn-outline-primary btn-sm mt-2';
                    botaoInscrever.innerHTML = 'Inscrever-se';
                    botaoInscrever.href = '/register_dono';
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
            });


        }
    }
    pedido2.open("GET", "/api/utilizador/leiloes/buscarLeiloes", true)
    pedido2.send();

}





window.onload = carregarLeiloes();

