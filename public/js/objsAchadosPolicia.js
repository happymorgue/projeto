let idPolicia = 0;

function carregarObjetos() {
    let pedidoObjetosPerdidosSeus = new XMLHttpRequest();
    pedidoObjetosPerdidosSeus.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var objetosPerdidos = JSON.parse(pedidoObjetosPerdidosSeus.responseText)['objetos_encontrados'];
            console.log(objetosPerdidos);

            // DIV QUE VAI CONTER OS OBJETOS PERDIDOS
            let divGlobalPerdidos = document.getElementById('objetosAchadosPolicia');
            let numObjetos = 0;
            let divRow = document.createElement('div');
            divRow.className = 'row d-flex justify-content-around';

            if (objetosPerdidos.length == 0) {
                let h5 = document.createElement('h5');
                h5.className = 'fw-light';
                h5.innerHTML = "Não existem objetos achados que não tenham sido entregues";
                divGlobalPerdidos.appendChild(h5);
            }

            objetosPerdidos.forEach(objeto => {
                if (numObjetos % 3 == 0) {
                    divGlobalPerdidos.appendChild(divRow);
                    divRow = document.createElement('div');
                    divRow.className = 'row d-flex justify-content-around';
                }

                // DIV QUE VAI CONTER CADA OBJETO
                let divCardPerdidos = document.createElement('div');
                divCardPerdidos.className = 'card shadow-1 border rounded-3 col-md-3 m-1 my-3';

                let divCardPerdidosBody = document.createElement('div');
                divCardPerdidosBody.className = 'card-body m-0 pt-2 d-flex flex-column justify-content-between';

                let divCardPerdidosContent = document.createElement('div');
                divCardPerdidosContent.className = 'w-100 m-0 p-0';

                let divCardPerdidosImagem = document.createElement('img');
                divCardPerdidosImagem.className = 'img-thumbnail border-0';
                divCardPerdidosImagem.alt = 'Imagem do objeto achado';
                divCardPerdidosImagem.src = '/storage/imagens_objetos/' + objeto['imagem'];
                divCardPerdidosImagem.onerror = function () {
                    divCardPerdidosImagem.src = '/storage/imagens_objetos/default_objeto.jpg';
                };

                let divCardPerdidosInfo = document.createElement('div');
                divCardPerdidosInfo.className = 'text-start content-wrapper';

                let divCardPerdidosNomeObjeto = document.createElement('h5');
                divCardPerdidosNomeObjeto.className = 'card-title';
                divCardPerdidosNomeObjeto.innerHTML = 'Objeto: ' + objeto['descricao'];

                let divCardPerdidosLocal = document.createElement('h6');
                divCardPerdidosLocal.className = 'card-subtitle text-body-secondary';
                divCardPerdidosLocal.innerHTML = 'Localização: ' + objeto['localizacao'];

                let divCardPerdidosData = document.createElement('p');
                divCardPerdidosData.className = 'card-text';
                divCardPerdidosData.innerHTML = "Perdido de: " + objeto['data_inicio'] + " a " + objeto['data_fim'];

                let divCardPerdidosBotao = document.createElement('div');
                divCardPerdidosBotao.className = 'd-flex justify-content-end mt-auto';

                let botao = document.createElement('a');
                botao.className = 'btn btn-primary btn-editar';
                botao.innerHTML = "Editar";
                botao.addEventListener('click', function () {
                    window.location.href = '/editObjAchado/' + objeto['id'];
                });

                let botaoApagar = document.createElement('a');
                botaoApagar.className = 'btn btn-danger btn-apagar me-1';
                botaoApagar.innerHTML = "Apagar";
                botaoApagar.onclick = function () {
                    Swal.fire({
                        title: 'Tem a certeza?',
                        text: "Esta ação não pode ser desfeita!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Sim, apagar!',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            let pedidoAtributo = new XMLHttpRequest();
                            pedidoAtributo.onreadystatechange = function () {
                                if (this.readyState == 4 && this.status == 200) {
                                    window.location.reload();
                                }
                            }
                            pedidoAtributo.open("DELETE", "/api/policia/" + idPolicia + "/removerObjetoAchado/" + objeto['id'], true);
                            pedidoAtributo.send();
                        }
                    })
                };

                divCardPerdidosBotao.appendChild(botaoApagar);
                divCardPerdidosBotao.appendChild(botao);

                divCardPerdidosInfo.appendChild(divCardPerdidosNomeObjeto);
                divCardPerdidosInfo.appendChild(divCardPerdidosData);
                divCardPerdidosInfo.appendChild(divCardPerdidosLocal);

                divCardPerdidosContent.appendChild(divCardPerdidosImagem);
                divCardPerdidosContent.appendChild(divCardPerdidosInfo);

                divCardPerdidosBody.appendChild(divCardPerdidosContent);
                divCardPerdidosBody.appendChild(divCardPerdidosBotao);

                divCardPerdidos.appendChild(divCardPerdidosBody);
                divRow.appendChild(divCardPerdidos);
                numObjetos++;
            });

            divGlobalPerdidos.appendChild(divRow);
        }
    }
    pedidoObjetosPerdidosSeus.open("GET", "/api/policia/" + idPolicia + "/verHistoricoObjetosEncontrados", true);
    pedidoObjetosPerdidosSeus.send();
}


function carregarPerdidos() {
    let pedidoObjetosPerdidosSeus = new XMLHttpRequest();
    pedidoObjetosPerdidosSeus.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var objetosPerdidos = JSON.parse(pedidoObjetosPerdidosSeus.responseText)['objetos_perdidos_encontrados'];
            console.log(objetosPerdidos);

            // DIV QUE VAI CONTER OS OBJETOS PERDIDOS
            let divGlobalPerdidos = document.getElementById('objetosCorrespondentesPolicia');
            let numObjetos = 0;
            let divRow = document.createElement('div');
            divRow.className = 'row d-flex justify-content-around';

            if (objetosPerdidos.length == 0) {
                let h5 = document.createElement('h5');
                h5.className = 'fw-light';
                h5.innerHTML = "Não existem objetos achados e perdidos correspondentes";
                divGlobalPerdidos.appendChild(h5);
            }

            objetosPerdidos.forEach(objeto => {
                if (numObjetos % 3 == 0) {
                    divGlobalPerdidos.appendChild(divRow);
                    divRow = document.createElement('div');
                    divRow.className = 'row d-flex justify-content-around';
                }

                // DIV QUE VAI CONTER CADA OBJETO
                let divCardPerdidos = document.createElement('div');
                divCardPerdidos.className = 'card shadow-1 border rounded-3 col-md-3 m-1 my-3';


                let divCardPerdidosBody = document.createElement('div');
                divCardPerdidosBody.className = 'card-body m-0 pt-2 d-flex flex-column justify-content-between';

                let divCardPerdidosContent = document.createElement('div');
                divCardPerdidosContent.className = 'w-100 m-0 p-0';

                let divCardPerdidosImagem = document.createElement('img');
                divCardPerdidosImagem.className = 'img-thumbnail border-0';
                divCardPerdidosImagem.alt = 'Imagem do objeto reclamado';
                divCardPerdidosImagem.src = '/storage/imagens_objetos/' + objeto['imagem'];
                divCardPerdidosImagem.onerror = function () {
                    divCardPerdidosImagem.src = '/storage/imagens_objetos/default_objeto.jpg';
                };

                let divCardPerdidosInfo = document.createElement('div');
                divCardPerdidosInfo.className = 'text-start content-wrapper';

                let divCardPerdidosNomeObjeto = document.createElement('h5');
                divCardPerdidosNomeObjeto.className = 'card-title';
                divCardPerdidosNomeObjeto.innerHTML = 'Objeto: ' + objeto['descricao'];

                let divCardPerdidosLocal = document.createElement('h6');
                divCardPerdidosLocal.className = 'card-subtitle text-body-secondary';
                divCardPerdidosLocal.innerHTML = 'Localização: ' + objeto['localizacao'];

                let divCardPerdidosData = document.createElement('p');
                divCardPerdidosData.className = 'card-text';
                divCardPerdidosData.innerHTML = "Perdido de: " + objeto['data_inicio'] + " a " + objeto['data_fim'];

                let divCardPerdidosBotao = document.createElement('div');
                divCardPerdidosBotao.className = 'd-flex justify-content-end mt-auto';

                divCardPerdidosInfo.appendChild(divCardPerdidosNomeObjeto);
                divCardPerdidosInfo.appendChild(divCardPerdidosData);
                divCardPerdidosInfo.appendChild(divCardPerdidosLocal);

                divCardPerdidosContent.appendChild(divCardPerdidosImagem);
                divCardPerdidosContent.appendChild(divCardPerdidosInfo);

                divCardPerdidosBody.appendChild(divCardPerdidosContent);
                divCardPerdidosBody.appendChild(divCardPerdidosBotao);

                divCardPerdidos.appendChild(divCardPerdidosBody);
                divRow.appendChild(divCardPerdidos);
                numObjetos++;
            });

            divGlobalPerdidos.appendChild(divRow);
        }
    }
    pedidoObjetosPerdidosSeus.open("GET", "/api/policia/" + idPolicia + "/verHistoricoObjetosEntregues", true);
    pedidoObjetosPerdidosSeus.send();
}


function obterIdECarregarObjetos() {
    let pedido = xhttp = new XMLHttpRequest();
    pedido.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            idPolicia = JSON.parse(pedido.responseText);
            console.log(idPolicia);
            carregarObjetos();
            carregarPerdidos();
        }

    }
    pedido.open("GET", "/api/convertUserEmailPoliciaId", true)
    pedido.send();
}




window.addEventListener('DOMContentLoaded', function () {
    obterIdECarregarObjetos();
});
