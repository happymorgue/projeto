let idRegular = 0;

function carregarObjetos() {
    let pedidoObjetosPerdidos = new XMLHttpRequest();
    pedidoObjetosPerdidos.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var objetosPerdidos = JSON.parse(pedidoObjetosPerdidos.responseText)['objetos_perdidos'];
            console.log(objetosPerdidos);

            // DIV QUE VAI CONTER OS OBJETOS PERDIDOS
            let divGlobalPerdidos = document.getElementById('MeusObjetosPerdidos');
            let numObjetos = 0;
            let divRow = document.createElement('div');
            divRow.className = 'row d-flex justify-content-around';

            if (objetosPerdidos.length == 0) {
                let divGlobalPerdidos = document.getElementById('MeusObjetosPerdidos');

                let divSemObjetos = document.createElement('h5');
                divSemObjetos.innerHTML = 'Não existem objetos perdidos que não tenham sido entregues';
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
                    window.location.href = '/editObjPerdido/' + objeto['id'];
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

                let botaoApagar = document.createElement('a');
                botaoApagar.className = 'btn btn-danger btn-apagar me-1';
                botaoApagar.innerHTML = "Apagar";
                botaoApagar.href = "#";

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
    pedidoObjetosPerdidos.open("GET", "/api/regular/dono/" + idRegular + "/verHistoricoObjetosPerdidos", true);
    pedidoObjetosPerdidos.send();
}

function carregarObjetosEncontrados() {
    let pedidoObjetosEncontradosSeus = new XMLHttpRequest();
    pedidoObjetosEncontradosSeus.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var objetosEncontrados = JSON.parse(pedidoObjetosEncontradosSeus.responseText)['objetos_perdidos_encontrados'];
            console.log(objetosEncontrados);
            if (objetosEncontrados.length == 0) {
                let divGlobalEncontrados = document.getElementById('MeusObjetosEncontrados');

                let divSemObjetos = document.createElement('h5');
                divSemObjetos.innerHTML = 'Não existem objetos encontrados';
                divSemObjetos.className = "fw-light";

                divGlobalEncontrados.appendChild(divSemObjetos);

                return;
            }

            // DIV QUE VAI CONTER OS OBJETOS Encontrados
            let divGlobalEncontrados = document.getElementById('MeusObjetosEncontrados');
            let numObjetos = 0;
            let divRow = document.createElement('div');
            divRow.className = 'row d-flex justify-content-around';

            objetosEncontrados.forEach(objeto => {
                if (numObjetos % 3 == 0) {
                    divGlobalEncontrados.appendChild(divRow);
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

            divGlobalEncontrados.appendChild(divRow);
        }
    }
    pedidoObjetosEncontradosSeus.open("GET", "/api/regular/dono/" + idRegular + "/verHistoricoObjetosPerdidosEncontrados", true);
    pedidoObjetosEncontradosSeus.send();
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
