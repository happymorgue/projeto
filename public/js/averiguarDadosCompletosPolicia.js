function getProfileVerificar() {
    let pedido = new XMLHttpRequest();
    pedido.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var idPolicia = JSON.parse(pedido.responseText);
            let pedido2 = new XMLHttpRequest();
            pedido2.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var responseJson = JSON.parse(pedido2.responseText);
                    if (responseJson['posto_id'] == null || responseJson['nome'] == null || responseJson['email'] == null || responseJson['idInterno'] == null) {
                        var pathname = window.location.pathname;
                        if (pathname == "/perfilPolicia" || pathname == "/editPerfilPolicia") {
                            document.getElementById('preencherDadosPolicia').removeAttribute('hidden');
                        } else {
                            window.location.replace("/perfilPolicia");
                        }
                    }
                }
            }
            pedido2.open("GET", "/api/policia/" + idPolicia, true)
            pedido2.send();
        }
    }
    pedido.open("GET", "/api/convertUserEmailPoliciaId", true)
    pedido.send();

}




window.onload = getProfileVerificar();