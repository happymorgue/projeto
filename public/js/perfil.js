
function getProfile() {
    console.log("1");
    let pedido = xhttp = new XMLHttpRequest();
    pedido.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var idRegular = JSON.parse(pedido.responseText);
            let pedido2 = xhttp = new XMLHttpRequest();
            pedido2.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var responseJson = JSON.parse(pedido2.responseText);
                    document.getElementsByName('nome')[0].innerHTML = responseJson['nome'];
                    document.getElementsByName('nome1')[0].innerHTML = responseJson['nome'];
                    document.getElementsByName('nif')[0].innerHTML = responseJson['nif'];
                    document.getElementsByName('telemovel')[0].innerHTML = responseJson['telemovel'];
                    document.getElementsByName('genero')[0].innerHTML = responseJson['genero'];
                    document.getElementsByName('morada')[0].innerHTML = responseJson['morada'];
                    document.getElementsByName('data_nascimento')[0].innerHTML = responseJson['data_nascimento'];
                    document.getElementsByName('email')[0].innerHTML = responseJson['email'];
                    document.getElementsByName('id_civil')[0].innerHTML = responseJson['identificador civil'];
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