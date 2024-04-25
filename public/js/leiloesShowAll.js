function carregarLeiloes() {
    let pedido = xhttp = new XMLHttpRequest();
    pedido.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var idRegular = JSON.parse(pedido.responseText);
            let pedido2 = xhttp = new XMLHttpRequest();
            pedido2.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var responseJson = JSON.parse(pedido2.responseText);
                    console.log(responseJson);
                    let leiloes = responseJson['leiloes'];
                    console.log(leiloes);
                    let divGlobal = document.getElementById('leiloes');
                    leiloes.forEach(leilao => {
                        let row_justify_content_center_mb3 = document.createElement('div');
                        row_justify_content_center_mb3.className = 'row justify-content-center mb-3 ';



                        divGlobal.appendChild(row_justify_content_center_mb3);
                    });


                }
            }
            pedido2.open("GET", "/api/regular/licitante/" + idRegular + "/verLeiloes", true)
            pedido2.send();
        }
    }
    pedido.open("GET", "/api/convertUserEmailRegularId", true)
    pedido.send();
}




window.onload = carregarLeiloes();