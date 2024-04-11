function getProfile(){
    console.log("1");
    let pedido = new XMLHttpRequest();
    pedido.onreadystatechange = function () {
        if (this.readyState == 4 && this.status==200){
            var idRegular = JSON.parse(pedido.responseText);
            let pedido2 = new XMLHttpRequest();
                pedido2.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status==200){
                        var responseJson = JSON.parse(pedido2.responseText);
                        document.getElementsByName('nome')[0].innerHTML = responseJson['nome'];
                        document.getElementsByName('nif')[0].innerHTML = responseJson['nif'];
                        document.getElementsByName('telemovel')[0].innerHTML = responseJson['telemovel'];
                        if (responseJson['genero'] != null){
                            document.getElementsByName('genero')[0].value = responseJson['genero'];
                        }
                        document.getElementsByName('morada')[0].innerHTML = responseJson['morada'];
                        document.getElementsByName('data_nascimento')[0].innerHTML = responseJson['data_nascimento'];
                        document.getElementsByName('identificador civil')[0].innerHTML = responseJson['identificador civil'];
                        
                    }
                }
                pedido2.open("GET", "/regular/" + idRegular, true)
                pedido2.send();
        }
    }
    pedido.open("GET", "/convertUserEmailRegularId", true)
    pedido.send();
}

function guardarMudancas(){
    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    let pedido = new XMLHttpRequest();
    pedido.onreadystatechange = function () {
        if (this.readyState == 4 && this.status==200){
            var idRegular = JSON.parse(pedido.responseText);
                let json = '{"nome":"'+ document.getElementsByName("nome")[0].value+'", "nif":'+document.getElementsByName("nif")[0].value+', "telemovel":'+document.getElementsByName("telemovel")[0].value+', "genero":"'+document.getElementsByName("genero")[0].value+'", "morada":"'+document.getElementsByName("morada")[0].value+'", "data_nascimento":"'+document.getElementsByName("data_nascimento")[0].value+'", "idcivil":"'+document.getElementsByName("identificador civil")[0].value+'"}';
                let JsonParse = JSON.parse(json);
                let enviarDados = new XMLHttpRequest();
                enviarDados.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status==200){
                    }
                }
                enviarDados.open("POST", "/regular/" + idRegular, true);
                enviarDados.setRequestHeader("Content-Type", "application/json");
                enviarDados.setRequestHeader("X-CSRF-TOKEN", csrfToken);
                enviarDados.send(JSON.stringify(JsonParse));
                window.location.replace("/perfilRegular");
            }
        }
        pedido.open("GET", "/convertUserEmailRegularId", true)
        pedido.send();

}




window.onload= getProfile();