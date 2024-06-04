function carregarPostos() {
    let pedidogetId = new XMLHttpRequest();
    console.log("ola");
    pedidogetId.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let PoliciaId=this.responseText;
            let pedido = new XMLHttpRequest();
            pedido.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    let responseJson = JSON.parse(this.responseText);
                    console.log(responseJson);
                    let divGlobal = document.getElementById('postosPolicia');
                    responseJson.forEach(station => {
                        let divRow = document.createElement('div');
                        divRow.className = 'row justify-content-center mb-3';

                        let divPosto = document.createElement('div');
                        divPosto.className = 'col-md-12 col-xl-10';

                        let divCard = document.createElement('div');
                        divCard.className = 'card shadow-0 border rounded-3';

                        let divCardBody = document.createElement('div');
                        divCardBody.className = 'card-body';

                        let divCardRow = document.createElement('div');
                        divCardRow.className = 'row';

                        let divCardContainerImage = document.createElement('div');
                        divCardContainerImage.className = 'col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0';

                        let divCardImage = document.createElement('div');
                        divCardImage.className = 'bg-image';

                        let img = document.createElement('img');
                        img.src = '/posto.png';
                        img.onerror = function () {
                            img.src = '/storage/imagens_posto/default_posto.jpg';
                        };
                        img.className = 'w-100';

                        divCardImage.appendChild(img);
                        divCardContainerImage.appendChild(divCardImage);
                        divCardRow.appendChild(divCardContainerImage);

                        let divCardContainerInfo = document.createElement('div');
                        divCardContainerInfo.className = 'col-md-6 col-lg-6 col-xl-6';

                        let divCardInfoName = document.createElement('h5');
                        divCardInfoName.innerHTML = station['morada'];

                        let divCardInfoAddress = document.createElement('p');
                        divCardInfoAddress.className = 'mb-4 mb-md-0';
                        divCardInfoAddress.innerHTML = "Morada: " + station['morada'];

                        let divCardInfoPhone = document.createElement('p');
                        divCardInfoPhone.className = 'mb-4 mb-md-0';
                        divCardInfoPhone.innerHTML = "Telemóvel: " + station['telefone'];

                        divCardContainerInfo.appendChild(divCardInfoName);
                        divCardContainerInfo.appendChild(divCardInfoAddress);
                        divCardContainerInfo.appendChild(divCardInfoPhone);

                        divCardRow.appendChild(divCardContainerInfo);

                        divCardBody.appendChild(divCardRow);
                        divCard.appendChild(divCardBody);
                        divPosto.appendChild(divCard);
                        divRow.appendChild(divPosto);
                        divGlobal.appendChild(divRow);
                    });
                }
            }
            pedido.open("GET", "/api/policia/"+PoliciaId+"/allPostoPolicia", true);
            pedido.send();
        }
    }
    pedidogetId.open("GET", "/api/convertUserEmailPoliciaId", true);
    pedidogetId.send();
}

window.onload = carregarPostos();
