
function getProfile() {
    console.log("js: nomePerfilPolicia");
    let pedido = xhttp = new XMLHttpRequest();
    pedido.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var idPolicia = JSON.parse(pedido.responseText);
            let pedido2 = xhttp = new XMLHttpRequest();
            pedido2.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var responseJson = JSON.parse(pedido2.responseText);
                    if(responseJson['nome'] != "null"){
                        document.getElementsByName('nome2')[0].innerHTML = responseJson['nome'];
                        document.getElementsByName('nome3')[0].innerHTML = responseJson['nome'];
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