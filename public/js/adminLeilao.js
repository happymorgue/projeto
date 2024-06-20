function carregarObjetos() {
    let pedidoObjetos = new XMLHttpRequest();
    pedidoObjetos.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            objetos = JSON.parse(pedidoObjetos.responseText)['objetos'];
            console.log(objetos);

            divGlobal = document.getElementById("tableObj");

            for (let i = 0; i < objetos.length; i++) {
                let tr = document.createElement("tr");
                divGlobal.appendChild(tr);

                let th = document.createElement("th");
                th.scope = "row";
                th.innerText = objetos[i].id;
                tr.appendChild(th);

                let tdNome = document.createElement("td");
                tdNome.innerText = objetos[i].descricao.substring(0, 40);
                tr.appendChild(tdNome);

                let tdCategoria = document.createElement("td");
                tdCategoria.innerText = objetos[i].categoria;
                tr.appendChild(tdCategoria);

                let tdData = document.createElement("td");
                tdData.innerText = objetos[i].data;
                tr.appendChild(tdData);

                let tdAvaliar = document.createElement("td");

                let inputAvaliar = document.createElement("input");
                inputAvaliar.type = "number";
                inputAvaliar.id = "inputAvaliar" + objetos[i].id;
                inputAvaliar.min = "0";
                inputAvaliar.className = "form-control inputValor";
                inputAvaliar.placeholder = "Valor do objeto";

                tdAvaliar.appendChild(inputAvaliar);
                tr.appendChild(tdAvaliar);

                let tdCriarLeilao = document.createElement("td");

                let buttonCriarLeilao = document.createElement("button");
                buttonCriarLeilao.type = "button";
                buttonCriarLeilao.className = "btn btn-success ms-1";
                buttonCriarLeilao.innerText = "Avaliar";
                buttonCriarLeilao.addEventListener('click', function () {
                    avaliarObjeto(objetos[i].id);
                });

                tdCriarLeilao.appendChild(buttonCriarLeilao);
                tr.appendChild(tdCriarLeilao);
            }
        }

    }
    pedidoObjetos.open("GET", "/api/avaliador/1/getObjetos", true);
    pedidoObjetos.send();
}

function carregarObjetosParaLeilao() {
    let pedidoObjetos = new XMLHttpRequest();
    pedidoObjetos.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            objetosAvaliados = JSON.parse(pedidoObjetos.responseText)['objetos'];
            console.log(objetosAvaliados);

            divGlobal = document.getElementById("tableObjAva");
            for (let i = 0; i < objetosAvaliados.length; i++) {
                let tr = document.createElement("tr");
                divGlobal.appendChild(tr);

                let th = document.createElement("th");
                th.scope = "row";
                th.innerText = objetosAvaliados[i].id;
                tr.appendChild(th);

                let tdNome = document.createElement("td");
                tdNome.innerText = objetosAvaliados[i].descricao.substring(0, 40);
                tr.appendChild(tdNome);

                let idDataInicio = document.createElement("td");

                let inputDataInicio = document.createElement("input");
                inputDataInicio.type = "date";
                inputDataInicio.id = "inputDataInicio" + objetosAvaliados[i].id;
                inputDataInicio.className = "form-control inputData";


                idDataInicio.appendChild(inputDataInicio);
                tr.appendChild(idDataInicio);

                let idDataFim = document.createElement("td");

                let inputDataFim = document.createElement("input");
                inputDataFim.type = "date";
                inputDataFim.id = "inputDataFim" + objetosAvaliados[i].id;
                inputDataFim.className = "form-control inputData";

                idDataFim.appendChild(inputDataFim);
                tr.appendChild(idDataFim);

                let tdCriarLeilao = document.createElement("td");

                let buttonCriarLeilao = document.createElement("button");
                buttonCriarLeilao.type = "button";
                buttonCriarLeilao.className = "btn btn-success ms-1";
                buttonCriarLeilao.innerText = "Criar Leilão";
                buttonCriarLeilao.addEventListener('click', function () {
                    criarLeilao(objetosAvaliados[i].id);
                });

                tdCriarLeilao.appendChild(buttonCriarLeilao);
                tr.appendChild(tdCriarLeilao);


            }
        }

    }
    pedidoObjetos.open("GET", "/api/avaliador/1/getObjetosAvaliados", true);
    pedidoObjetos.send();
}

function carregarLeiloesPorIniciar() {
    let pedidoLeilao = new XMLHttpRequest();
    pedidoLeilao.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            leilaoI = JSON.parse(pedidoLeilao.responseText)['leiloes'];
            console.log(leilaoI);

            divGlobal = document.getElementById("LeilaoI");
            for (let i = 0; i < leilaoI.length; i++) {
                let tr = document.createElement("tr");
                divGlobal.appendChild(tr);

                let th = document.createElement("th");
                th.scope = "row";
                th.innerText = leilaoI[i].id;
                tr.appendChild(th);

                let tdNome = document.createElement("td");
                tdNome.innerText = leilaoI[i].objeto.descricao.substring(0, 40);
                tr.appendChild(tdNome);

                let tdDataInicio = document.createElement("td");
                tdDataInicio.innerText = leilaoI[i].data_inicio;
                tr.appendChild(tdDataInicio);

                let tdDataFim = document.createElement("td");
                tdDataFim.innerText = leilaoI[i].data_fim;
                tr.appendChild(tdDataFim);

                let tdValorObjeto = document.createElement("td");
                tdValorObjeto.innerText = leilaoI[i].valor;
                tr.appendChild(tdValorObjeto);

                let tdCriarLeilao = document.createElement("td");

                let buttonCriarLeilao = document.createElement("button");
                buttonCriarLeilao.type = "button";
                buttonCriarLeilao.className = "btn btn-success ms-1";
                buttonCriarLeilao.innerText = "Iniciar Leilão";
                buttonCriarLeilao.addEventListener('click', function () {
                    iniciarLeilao(leilaoI[i].id);
                });

                tdCriarLeilao.appendChild(buttonCriarLeilao);
                tr.appendChild(tdCriarLeilao);


            }
        }

    }
    pedidoLeilao.open("GET", "/api/avaliador/1/verLeiloesI", true);
    pedidoLeilao.send();
}

function carregarLeiloesEmAndamento() {
    let pedidoLeilaoA = new XMLHttpRequest();
    pedidoLeilaoA.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            leilaoA = JSON.parse(pedidoLeilaoA.responseText)['leiloes'];
            console.log(leilaoA);

            divGlobal = document.getElementById("LeilaoA");
            for (let i = 0; i < leilaoA.length; i++) {
                let tr = document.createElement("tr");
                divGlobal.appendChild(tr);

                let th = document.createElement("th");
                th.scope = "row";
                th.innerText = leilaoA[i].id;
                tr.appendChild(th);

                let tdNome = document.createElement("td");
                tdNome.innerText = leilaoA[i].objeto.descricao.substring(0, 40);
                tr.appendChild(tdNome);

                let tdDataInicio = document.createElement("td");
                tdDataInicio.innerText = leilaoA[i].data_inicio;
                tr.appendChild(tdDataInicio);

                let tdDataFim = document.createElement("td");
                tdDataFim.innerText = leilaoA[i].data_fim;
                tr.appendChild(tdDataFim);

                let tdValorObjeto = document.createElement("td");
                tdValorObjeto.innerText = leilaoA[i].valor;
                tr.appendChild(tdValorObjeto);

                let tdCriarLeilao = document.createElement("td");

                let buttonCriarLeilao = document.createElement("button");
                buttonCriarLeilao.type = "button";
                buttonCriarLeilao.className = "btn btn-danger ms-1";
                buttonCriarLeilao.innerText = "Terminar Leilão";
                buttonCriarLeilao.addEventListener('click', function () {
                    terminarLeilao(leilaoA[i].id);
                });

                tdCriarLeilao.appendChild(buttonCriarLeilao);
                tr.appendChild(tdCriarLeilao);


            }
        }

    }
    pedidoLeilaoA.open("GET", "/api/avaliador/1/verLeiloesA", true);
    pedidoLeilaoA.send();
}

function avaliarObjeto(idObjeto) {
    console.log(idObjeto);
    let pedidoAvaliacao = new XMLHttpRequest();
    pedidoAvaliacao.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(pedidoAvaliacao.responseText);
            window.location.reload();
        }
    }
    pedidoAvaliacao.open("POST", "/api/avaliador/1/avaliarObjeto/" + idObjeto, true);
    pedidoAvaliacao.setRequestHeader("Content-Type", "application/json");
    pedidoAvaliacao.send(JSON.stringify({ valor: document.getElementById("inputAvaliar" + idObjeto).value }));

}


function criarLeilao(idObjeto) {
    console.log(idObjeto);
    let pedidoCriarLeilao = new XMLHttpRequest();
    pedidoCriarLeilao.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(pedidoCriarLeilao.responseText);
            window.location.reload();
        }
    }
    pedidoCriarLeilao.open("POST", "/api/avaliador/1/criarLeilao/" + idObjeto, true);
    pedidoCriarLeilao.setRequestHeader("Content-Type", "application/json");
    pedidoCriarLeilao.send(JSON.stringify({
        data_inicio: document.getElementById("inputDataInicio" + idObjeto).value,
        data_fim: document.getElementById("inputDataFim" + idObjeto).value,
        estado: "I"
    }));

}

function iniciarLeilao(idLeilao) {
    console.log(idLeilao);
    let pedidoAvaliacao = new XMLHttpRequest();
    pedidoAvaliacao.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(pedidoAvaliacao.responseText);
            window.location.reload();
        }
    }
    pedidoAvaliacao.open("GET", "/api/avaliador/1/iniciarLeilao/" + idLeilao, true);
    pedidoAvaliacao.send();

}

function terminarLeilao(idLeilao) {
    console.log(idLeilao);
    let pedidoAvaliacao = new XMLHttpRequest();
    pedidoAvaliacao.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(pedidoAvaliacao.responseText);
            window.location.reload();
        }
    }
    pedidoAvaliacao.open("GET", "/api/avaliador/1/terminarLeilao/" + idLeilao, true);
    pedidoAvaliacao.send();

}

window.addEventListener('DOMContentLoaded', function () {
    carregarObjetos();
    carregarObjetosParaLeilao();
    carregarLeiloesPorIniciar();
    carregarLeiloesEmAndamento();
});
