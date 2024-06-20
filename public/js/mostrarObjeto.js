var idRegular;
var idLeilao;
let countdownDate

console.log(window.location.href.split('/')[4]);

function carregarObjeto() {
    pedidoLeilao = new XMLHttpRequest();
    pedidoLeilao.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            objeto = JSON.parse(pedidoLeilao.responseText)['objeto'];
            //CARREGAR LEILAO
            console.log(objeto);
            document.getElementById("img").src = '/storage/imagens_objetos/' + objeto.imagem;
            img.onerror = function () {
                img.src = '/storage/imagens_objetos/default_objeto.jpg';
            };
            document.getElementById("nome").innerHTML = objeto.descricao;
            document.getElementById("datas").innerHTML = objeto.data_inicio + " até " + objeto.data_fim;
            document.getElementById("local").innerHTML = objeto.localizacao;
            document.getElementById("categoria").innerHTML = objeto.categoria;
            let atributos = objeto.atributos;
            atributos.forEach(atributo => {
                document.getElementById("atributo").innerHTML = document.getElementById("atributo").innerHTML + atributo.nome + ": " + atributo.valor + "<br>";
            });
            searchLocationAndAddMarker(objeto.localizacao);







        }

    }
    pedidoLeilao.open("GET", "/api/obterObjeto/" + window.location.href.split('/')[4], true);
    pedidoLeilao.send();
}


function obterIdECarregarObjeto() {
    pedidoIdRegular = new XMLHttpRequest();
    pedidoIdRegular.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            idRegular = JSON.parse(pedidoIdRegular.responseText);
            console.log(idRegular);
            carregarObjeto();
        }

    }
    pedidoIdRegular.open("GET", "/api/convertUserEmailUtilizadorId", true);
    pedidoIdRegular.send();
}


window.addEventListener('DOMContentLoaded', function () {
    obterIdECarregarObjeto();
});
