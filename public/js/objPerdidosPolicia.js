let idPolicia = 0;

function carregarObjetos() {
    let pedido2 = xhttp = new XMLHttpRequest();
    let numObjetos = 0;
    pedido2.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var objetos = JSON.parse(pedido2.responseText)['objetos_perdidos'];

            //DIV QUE VAI CONTER AS LINHAS
            let divGlobal = document.getElementById('ObjetosPerdidosPolicia');
            let divRow = document.createElement('div');
            divRow.className = 'row d-flex justify-content-around';
            objetos.forEach(objeto => {
                if (numObjetos % 3 == 0) {
                    divGlobal.appendChild(divRow);
                    divRow = document.createElement('div');
                    divRow.className = 'row d-flex justify-content-around';
                }
                //DIV QUE VAI CONTER CADA OBJETO
                let divObjeto = document.createElement('div');
                divObjeto.className = 'card shadow-1 border rounded-3 col-md-3 m-1 my-3';
                divObjeto.addEventListener('click', function () {
                    window.location.href = '/objetoAchado/' + objeto['id'];
                });

                let divCard = document.createElement('div');
                divCard.className = 'card-body m-0 pt-2';

                let divContent = document.createElement('div');
                divContent.className = 'w-100 m-0 p-0';

                let imagem = document.createElement('img');
                imagem.className = 'img-thumbnail border-0 py-2';

                imagem.src = '/storage/imagens_objetos/' + objeto['imagem'];
                imagem.onerror = function () {
                    imagem.src = '/storage/imagens_objetos/default_objeto.jpg';
                };

                divInfo = document.createElement('div');
                divInfo.className = 'text-start';

                let nomeObjeto = document.createElement('h5');
                nomeObjeto.className = 'card-title';
                nomeObjeto.innerHTML = objeto['descricao'];

                let local = document.createElement('h6');
                local.className = 'card-subtitle text-body-secondary';
                local.innerHTML = objeto['localizacao'];

                let data = document.createElement('p');
                data.className = 'card-text';
                data.innerHTML = "Achado dia: " + objeto['data_inicio'];

                let divBotao = document.createElement('div');
                divBotao.className = 'd-flex justify-content-end mt-auto';

                let botao = document.createElement('a');
                botao.className = 'btn btn-primary btn-meu d-flex aling-self-end';
                botao.innerHTML = "É meu!";
                botao.href = "#";

                divBotao.appendChild(botao);

                divInfo.appendChild(nomeObjeto);
                divInfo.appendChild(data);
                divInfo.appendChild(local);

                divContent.appendChild(imagem);
                divContent.appendChild(divInfo);

                divCard.appendChild(divContent);
                divCard.appendChild(divBotao);

                divObjeto.appendChild(divCard);

                divRow.appendChild(divObjeto);
                numObjetos = numObjetos + 1;
            });
            divGlobal.appendChild(divRow);


        }

    }
    pedido2.open("GET", "/api/policia/" + idPolicia + "/verObjetosPerdidos", true)
    pedido2.send();

    let pedidoObjetosPerdidosSeus = xhttp = new XMLHttpRequest();
    pedidoObjetosPerdidosSeus.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var objetosPerdidos = JSON.parse(pedidoObjetosPerdidosSeus.responseText)['objetos_encontrados'];
            console.log(objetosPerdidos);

            //DIV QUE VAI CONTER OS OBJETOS PERDIDOS
            let divGlobalPerdidos = document.getElementById('MeusObjetosAchados');

            objetosPerdidos.forEach(objeto => {
                let divCardPerdidos = document.createElement('div');
                divCardPerdidos.className = 'card shadow-1 border rounded-3 col-md-12 m-1 my-3';
            
                divCardPerdidos.addEventListener('click', function () {
                    window.location.href = '/editObjAchado/' + objeto['id'];
                });
            
                let divCardPerdidosBody = document.createElement('div');
                divCardPerdidosBody.className = 'card-body m-0 pt-2 d-flex flex-column'; // Remove position-relative class
            
                let divCardPerdidosContent = document.createElement('div');
                divCardPerdidosContent.className = 'w-100 m-0 p-0';
            
                let divCardPerdidosImagem = document.createElement('img');
                divCardPerdidosImagem.className = 'img-thumbnail border-0';
                divCardPerdidosImagem.src = '/storage/imagens_objetos/' + objeto['imagem'];
                divCardPerdidosImagem.onerror = function () {
                    divCardPerdidosImagem.src = '/storage/imagens_objetos/default_objeto.jpg';
                };
            
                let divCardPerdidosInfo = document.createElement('div');
                divCardPerdidosInfo.className = 'text-start';
            
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
                divCardPerdidosBotao.className = 'd-flex justify-content-end';
            
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
            
                divGlobalPerdidos.appendChild(divCardPerdidos);
            });

        }
    }
    pedidoObjetosPerdidosSeus.open("GET", "/api/policia/" + idPolicia + "/verHistoricoObjetosEncontrados", true)
    pedidoObjetosPerdidosSeus.send();



}

function obterIdECarregarObjetos() {
    let pedido = xhttp = new XMLHttpRequest();
    pedido.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            idPolicia = JSON.parse(pedido.responseText);
            console.log(idPolicia);
            carregarObjetos();
        }

    }
    pedido.open("GET", "/api/convertUserEmailPoliciaId", true)
    pedido.send();
}




window.addEventListener('DOMContentLoaded', function () {
    obterIdECarregarObjetos();
});
