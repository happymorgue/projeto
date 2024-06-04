function getProfile() {
    console.log("1");
    let pedido = new XMLHttpRequest();
    pedido.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var idPolicia = JSON.parse(pedido.responseText);
            let pedido2 = new XMLHttpRequest();
            pedido2.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var responseJson = JSON.parse(pedido2.responseText);
                    console.log(responseJson);
                    console.log(document.getElementsByName('nome'));
                    if (responseJson['nome'] != null) {
                        document.getElementsByName('nome')[0].value = responseJson['nome'].trim();
                    } else {
                        document.getElementsByName('nome')[0].value = responseJson['nome']
                    }

                    if (responseJson['idInterno'] != null) {
                        document.getElementsByName('numero_interno')[0].value = String(responseJson['idInterno']).trim();
                    } else {
                        document.getElementsByName('numero_interno')[0].value = responseJson['idInterno']
                    }
                    carregarPostos(responseJson['posto_id']);
                }
            }
            pedido2.open("GET", "/api/policia/" + idPolicia, true)
            pedido2.send();
        }
    }
    pedido.open("GET", "/api/convertUserEmailPoliciaId", true)
    pedido.send();
}

function guardarMudancas() {
    let pedido = new XMLHttpRequest();
    console.log("ola");
    pedido.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log("ola");
            var idPolicia = JSON.parse(pedido.responseText);
            let json = '{"nome":"' + document.getElementsByName("nome")[0].value.trim() + '", "idInterno":"' + document.getElementsByName("numero_interno")[0].value.trim() + '", "postoId":' + document.getElementsByName("posto_policia")[0].value.trim() + '}';
            console.log(json);
            let JsonParse = JSON.parse(json);
            let enviarDados = new XMLHttpRequest();
            enviarDados.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    window.location.replace("/perfilPolicia");
                }
            }
            enviarDados.open("POST", "/api/policia/" + idPolicia, true);
            enviarDados.setRequestHeader("Content-Type", "application/json");
            enviarDados.send(JSON.stringify(JsonParse));

        }
    }
    pedido.open("GET", "/api/convertUserEmailPoliciaId", true)
    pedido.send();
}

function carregarPostos(posto) {
    let pedido = new XMLHttpRequest();
    pedido.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var postos = JSON.parse(pedido.responseText);
            let select = document.getElementsByName('posto_policia')[0];
            var option = document.createElement("option");
            option.text = "";
            option.value = null;
            select.add(option);
            for (var i = 0; i < postos.length; i++) {
                if (posto != null && postos[i].id == posto['id']) {
                    var option = document.createElement("option");
                    option.text = postos[i].morada;
                    option.value = postos[i].id;
                    option.selected = 'selected';
                    select.add(option);
                } else {
                    var option = document.createElement("option");
                    option.text = postos[i].morada;
                    option.value = postos[i].id;
                    select.add(option);
                }
            }
        }
    }
    pedido.open("GET", "/api/obterPostosPolicia", true)
    pedido.send();
}

window.onload = getProfile();