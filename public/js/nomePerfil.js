
function getProfile() {
    console.log("js: nomePerfil");
    let pedido = xhttp = new XMLHttpRequest();
    pedido.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var idRegular = JSON.parse(pedido.responseText);
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
            pedido2.open("GET", "/api/regular/" + idRegular, true)
            pedido2.send();
        }
    }
    pedido.open("GET", "/api/convertUserEmailRegularId", true)
    pedido.send();
}




window.onload = getProfile();