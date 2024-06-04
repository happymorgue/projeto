let idRegular = 0;

function carregarObjetos() {
    let pedidoObjetosEncontrados = new XMLHttpRequest();
    pedidoObjetosEncontrados.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var objetosPerdidos = JSON.parse(pedidoObjetosEncontrados.responseText)['objetos_perdidos'];
            console.log(objetosPerdidos);

            // DIV QUE VAI CONTER OS OBJETOS PERDIDOS
            let divGlobalEncontrados = document.getElementById('MeusObjetosPerdidos');
            let numObjetos = 0;
            let divRow = document.createElement('div');
            divRow.className = 'row d-flex justify-content-around';

            if (objetosPerdidos.length ==0){
                let divGlobalPerdidos = document.getElementById('MeusObjetosEncontrados');

                let divSemObjetos = document.createElement('h5');
                divSemObjetos.innerHTML = 'Não existem objetos encontrados';
                divSemObjetos.className = "fw-light";

                divGlobalPerdidos.appendChild(divSemObjetos);
                
                return;
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

                divCardPerdidos.addEventListener('click', function () {
                    window.location.href = '/editObjAchado/' + objeto['id'];
                });

                let divCardPerdidosBody = document.createElement('div');
                divCardPerdidosBody.className = 'card-body m-0 pt-2 d-flex flex-column justify-content-between';

                let divCardPerdidosContent = document.createElement('div');
                divCardPerdidosContent.className = 'w-100 m-0 p-0';

                let divCardPerdidosImagem = document.createElement('img');
                divCardPerdidosImagem.className = 'img-thumbnail border-0';
                divCardPerdidosImagem.src = '/storage/imagens_objetos/' + objeto['imagem'];
                divCardPerdidosImagem.onerror = function () {
                    divCardPerdidosImagem.src = '/storage/imagens_objetos/default_objeto.jpg';
                };

                let divCardPerdidosInfo = document.createElement('div');
                divCardPerdidosInfo.className = 'text-start content-wrapper';

                let divCardPerdidosNomeObjeto = document.createElement('h5');
                divCardPerdidosNomeObjeto.className = 'card-title';
                divCardPerdidosNomeObjeto.innerHTML = objeto['descricao'];

                let divCardPerdidosLocal = document.createElement('h6');
                divCardPerdidosLocal.className = 'card-subtitle text-body-secondary';
                divCardPerdidosLocal.innerHTML = objeto['localizacao'];

                let divCardPerdidosData = document.createElement('p');
                divCardPerdidosData.className = 'card-text';
                divCardPerdidosData.innerHTML = "Perdido de: " + objeto['data_inicio'] + " a " + objeto['data_fim'];

                let divCardPerdidosBotao = document.createElement('div');
                divCardPerdidosBotao.className = 'd-flex justify-content-end mt-auto';

                let botao = document.createElement('a');
                botao.className = 'btn btn-primary btn-editar';
                botao.innerHTML = "Editar";
                botao.href = "#";

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
    pedidoObjetosPerdidosSeus.open("GET", "/api/regular/dono/" + idRegular + "/verHistoricoObjetosPerdidos", true);
    pedidoObjetosPerdidosSeus.send();
}

function carregarObjetosEncontrados() {
    let pedidoObjetosPerdidosSeus = new XMLHttpRequest();
    pedidoObjetosPerdidosSeus.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var objetosPerdidos = JSON.parse(pedidoObjetosPerdidosSeus.responseText)['objetos_perdidos_encontrados'];
            console.log(objetosPerdidos);
            if (objetosPerdidos.length ==0){
                let divGlobalPerdidos = document.getElementById('MeusObjetosEncontrados');

                let divSemObjetos = document.createElement('h5');
                divSemObjetos.innerHTML = 'Não existem objetos encontrados';
                divSemObjetos.className = "fw-light";

                divGlobalPerdidos.appendChild(divSemObjetos);
                
                return;
            }

            // DIV QUE VAI CONTER OS OBJETOS PERDIDOS
            let divGlobalPerdidos = document.getElementById('MeusObjetosEncontrados');
            let numObjetos = 0;
            let divRow = document.createElement('div');
            divRow.className = 'row d-flex justify-content-around';

            objetosPerdidos.forEach(objeto => {
                if (numObjetos % 3 == 0) {
                    divGlobalPerdidos.appendChild(divRow);
                    divRow = document.createElement('div');
                    divRow.className = 'row d-flex justify-content-around';
                }

                // DIV QUE VAI CONTER CADA OBJETO
                let divCardPerdidos = document.createElement('div');
                divCardPerdidos.className = 'card shadow-1 border rounded-3 col-md-3 m-1 my-3';

                divCardPerdidos.addEventListener('click', function () {
                    window.location.href = '/editObjAchado/' + objeto['id'];
                });

                let divCardPerdidosBody = document.createElement('div');
                divCardPerdidosBody.className = 'card-body m-0 pt-2 d-flex flex-column justify-content-between';

                let divCardPerdidosContent = document.createElement('div');
                divCardPerdidosContent.className = 'w-100 m-0 p-0';

                let divCardPerdidosImagem = document.createElement('img');
                divCardPerdidosImagem.className = 'img-thumbnail border-0';
                divCardPerdidosImagem.src = '/storage/imagens_objetos/' + objeto['imagem'];
                divCardPerdidosImagem.onerror = function () {
                    divCardPerdidosImagem.src = '/storage/imagens_objetos/default_objeto.jpg';
                };

                let divCardPerdidosInfo = document.createElement('div');
                divCardPerdidosInfo.className = 'text-start content-wrapper';

                let divCardPerdidosNomeObjeto = document.createElement('h5');
                divCardPerdidosNomeObjeto.className = 'card-title';
                divCardPerdidosNomeObjeto.innerHTML = objeto['descricao'];

                let divCardPerdidosLocal = document.createElement('h6');
                divCardPerdidosLocal.className = 'card-subtitle text-body-secondary';
                divCardPerdidosLocal.innerHTML = objeto['localizacao'];

                let divCardPerdidosData = document.createElement('p');
                divCardPerdidosData.className = 'card-text';
                divCardPerdidosData.innerHTML = "Perdido de: " + objeto['data_inicio'] + " a " + objeto['data_fim'];

                let divCardPerdidosBotao = document.createElement('div');
                divCardPerdidosBotao.className = 'd-flex justify-content-end mt-auto';

                let botao = document.createElement('a');
                botao.className = 'btn btn-primary btn-editar';
                botao.innerHTML = "Editar";
                botao.href = "#";

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
    pedidoObjetosPerdidosSeus.open("GET", "/api/regular/dono/" + idRegular + "/verHistoricoObjetosPerdidosEncontrados", true);
    pedidoObjetosPerdidosSeus.send();
}


function obterIdECarregarObjetos() {
    let pedido = xhttp = new XMLHttpRequest();
    pedido.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            idRegular = JSON.parse(pedido.responseText);
            console.log(idRegular);
            carregarObjetos();
            carregarObjetosEncontrados();
        }

    }
    pedido.open("GET", "/api/convertUserEmailRegularId", true)
    pedido.send();
}




window.addEventListener('DOMContentLoaded', function () {
    obterIdECarregarObjetos();
});
