function getProfile() {
    console.log("1");
    let pedido = new XMLHttpRequest();
    pedido.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var idRegular = JSON.parse(pedido.responseText);
            let pedido2 = new XMLHttpRequest();
            pedido2.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var responseJson = JSON.parse(pedido2.responseText);
                    console.log(responseJson['nome']);
                    console.log(document.getElementsByName('nome'));
                    if (responseJson['nome'] != null) {
                        document.getElementsByName('nome')[0].value = responseJson['nome'].trim();
                    } else {
                        document.getElementsByName('nome')[0].value = responseJson['nome'];
                    }

                    if (responseJson['nif'] != null) {
                        document.getElementsByName('nif')[0].value = responseJson['nif'].trim();
                    } else {
                        document.getElementsByName('nif')[0].value = responseJson['nif'];
                    }

                    if (responseJson['telemovel'] != null) {
                        document.getElementsByName('telemovel')[0].value = responseJson['telemovel'].trim();
                    } else {
                        document.getElementsByName('telemovel')[0].value = responseJson['telemovel'];
                    }

                    if (responseJson['genero'] != null) {
                        document.getElementsByName('genero')[0].value = responseJson['genero'];
                    }

                    if (responseJson['morada'] != null) {
                        document.getElementsByName('morada')[0].value = responseJson['morada'].trim();
                    } else {
                        document.getElementsByName('morada')[0].value = responseJson['morada'];
                    }

                    if (responseJson['data_nascimento'] != null) {
                        document.getElementsByName('data_nascimento')[0].value = responseJson['data_nascimento'].trim();
                    } else {
                        document.getElementsByName('data_nascimento')[0].value = responseJson['data_nascimento'];
                    }

                    if (responseJson['identificador civil'] != null) {
                        document.getElementsByName('identificador civil')[0].value = responseJson['identificador civil'].trim();
                    } else {
                        document.getElementsByName('identificador civil')[0].value = responseJson['identificador civil'];
                    }
                }
            }
            pedido2.open("GET", "/api/regular/" + idRegular, true)
            pedido2.send();
        }
    }
    pedido.open("GET", "/api/convertUserEmailRegularId", true)
    pedido.send();
}

function guardarMudancas() {

    let dataNascimento = document.getElementById('data_nascimento').innerText;

    let pedido = new XMLHttpRequest();
    pedido.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var idRegular = JSON.parse(pedido.responseText);
            let json = '{"nome":"' + document.getElementsByName("nome")[0].value.trim() + '", "nif":"' + document.getElementsByName("nif")[0].value.trim() + '", "telemovel":"' + document.getElementsByName("telemovel")[0].value.trim() + '", "genero":"' + document.getElementsByName("genero")[0].value.trim() + '", "morada":"' + document.getElementsByName("morada")[0].value.trim() + '", "data_nascimento":"' + dataNascimento + '", "idcivil":"' + document.getElementsByName("identificador civil")[0].value.trim() + '"}';
            let JsonParse = JSON.parse(json);
            let enviarDados = new XMLHttpRequest();
            enviarDados.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    window.location.replace("/perfilRegular");
                }
            }
            console.log("ola");
            console.log(json);
            enviarDados.open("POST", "/api/regular/" + idRegular, true);
            enviarDados.setRequestHeader("Content-Type", "application/json");
            enviarDados.send(JSON.stringify(JsonParse));
        }
    }
    pedido.open("GET", "/api/convertUserEmailRegularId", true)
    pedido.send();

}




window.onload = getProfile();