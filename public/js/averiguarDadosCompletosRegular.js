function getProfileVerificar() {
    let pedido = new XMLHttpRequest();
    pedido.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var idRegular = JSON.parse(pedido.responseText);
            let pedido2 = new XMLHttpRequest();
            pedido2.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var responseJson = JSON.parse(pedido2.responseText);
                    if (responseJson['nif'] == null || responseJson['nome'] == null || responseJson['email'] == null || responseJson['telemovel'] == null || responseJson['data_nascimento'] == null || responseJson['morada'] == null || responseJson['identificador civil'] == null || responseJson['genero'] == null) {
                        var pathname = window.location.pathname;
                        if (pathname == "/perfilRegular" || pathname == "/editPerfilRegular") {
                            document.getElementById('preencherDadosRegular').removeAttribute('hidden');
                        } else {
                            window.location.replace("/perfilRegular");
                        }
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




window.onload = getProfileVerificar();