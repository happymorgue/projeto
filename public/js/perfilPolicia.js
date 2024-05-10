function getProfile() {
    console.log("1");
    let pedido = xhttp = new XMLHttpRequest();
    pedido.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var idPolicia = JSON.parse(pedido.responseText);
            let pedido2 = xhttp = new XMLHttpRequest();
            pedido2.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var responseJson = JSON.parse(pedido2.responseText);
                    document.getElementsByName('nome')[0].innerHTML = responseJson['nome'];
                    document.getElementsByName('email')[0].innerHTML = responseJson['email'];
                    document.getElementsByName('identificador_interno')[0].innerHTML = responseJson['idInterno'];
                    if (responseJson['posto_id'] != null) {
                        document.getElementsByName('posto_policia')[0].innerHTML = responseJson['posto_id']['morada'];
                    } else {
                        document.getElementsByName('posto_policia')[0].innerHTML = "";
                    }
                    console.log(responseJson);
                    console.log(responseJson['email']);

                }
            }
            pedido2.open("GET", "/api/policia/" + idPolicia, true)
            pedido2.send();
        }
    }
    pedido.open("GET", "/api/convertUserEmailPoliciaId", true)
    pedido.send();
}




window.onload = getProfile();