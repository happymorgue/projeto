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
                    document.getElementsByName('nome')[0].value = responseJson['nome'].trim();
                    document.getElementsByName('nif')[0].value = responseJson['nif'].trim();
                    document.getElementsByName('telemovel')[0].value = responseJson['telemovel'].trim();
                    if (responseJson['genero'] != null) {
                        document.getElementsByName('genero')[0].value = responseJson['genero'];
                    }
                    document.getElementsByName('morada')[0].value = responseJson['morada'].trim();
                    document.getElementsByName('data_nascimento')[0].value = responseJson['data_nascimento'].trim();
                    document.getElementsByName('identificador civil')[0].value = responseJson['identificador civil'].trim();

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
    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    let pedido = new XMLHttpRequest();
    pedido.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var idRegular = JSON.parse(pedido.responseText);
            let json = '{"nome":"' + document.getElementsByName("nome")[0].value.trim() + '", "nif":' + document.getElementsByName("nif")[0].value.trim() + ', "telemovel":' + document.getElementsByName("telemovel")[0].value.trim() + ', "genero":"' + document.getElementsByName("genero")[0].value.trim() + '", "morada":"' + document.getElementsByName("morada")[0].value.trim() + '", "data_nascimento":"' + document.getElementsByName("data_nascimento")[0].value.trim() + '", "idcivil":"' + document.getElementsByName("identificador civil")[0].value.trim() + '"}';
            let JsonParse = JSON.parse(json);
            let enviarDados = new XMLHttpRequest();
            enviarDados.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                }
            }
            enviarDados.open("POST", "/api/regular/" + idRegular, true);
            enviarDados.setRequestHeader("Content-Type", "application/json");
            enviarDados.setRequestHeader("X-CSRF-TOKEN", csrfToken);
            enviarDados.send(JSON.stringify(JsonParse));
            window.location.replace("/perfilRegular");
        }
    }
    pedido.open("GET", "/api/convertUserEmailRegularId", true)
    pedido.send();

}




window.onload = getProfile();