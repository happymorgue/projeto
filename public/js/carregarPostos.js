idPosto = 0;

function carregarPostos() {
    let pedidogetId = new XMLHttpRequest();
    numObj = 1;
    pedidogetId.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let PoliciaId = this.responseText;
            let pedido = new XMLHttpRequest();
            pedido.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    let responseJson = JSON.parse(this.responseText);
                    // console.log(responseJson);
                    // ordenar pela morada
                    responseJson.sort((a, b) => (a.morada > b.morada) ? 1 : -1); 
                    let divGlobal = document.getElementById('main');

                    let title = document.createElement('h2');
                    title.textContent = 'Lista de Postos Existentes'; 
                    divGlobal.appendChild(title);

                    let divRow;
                    responseJson.forEach((station, index) => {
                        if (index % 4 == 0) {
                            divRow = document.createElement('div');
                            divRow.className = 'row gutters-sm';
                            divGlobal.appendChild(divRow);
                        }
                        let divInicial = document.createElement('div');
                        divInicial.className = 'col-md-6 col-xl-3 mb-3';


                        let divCard = document.createElement('div');
                        divCard.className = 'card';

                        let divCardBody = document.createElement('div');
                        divCardBody.className = 'card-body';

                        let divCardInformacao = document.createElement('div');
                        divCardInformacao.className = 'd-flex flex-column align-items-center text-center';

                        let img = document.createElement('img');
                        img.src = 'posto.png';
                        img.class = 'rounded-circle';
                        img.width = '120';
                        img.alt = "Ícone de um posto de polícia"

                        divCardInformacao.appendChild(img);

                        let divDados = document.createElement('div');
                        divDados.className = 'mt-3';

                        let h5Morada = document.createElement('h5');
                        h5Morada.innerHTML = station.morada;

                        let pTelemovel = document.createElement('p');
                        pTelemovel.innerHTML = station.telefone;

                        divDados.appendChild(h5Morada);
                        divDados.appendChild(pTelemovel);

                        divCardInformacao.appendChild(divDados);


                        let divCardBotoes = document.createElement('div');
                        divCardBotoes.className = 'mt-3 text-center';

                        let bEditar = document.createElement('button');
                        bEditar.className = 'btn btn-primary';
                        bEditar.innerHTML = 'Editar';
                        bEditar.type = 'button';
                        bEditar.setAttribute('data-bs-toggle', 'modal');
                        bEditar.setAttribute('data-bs-target', '#editModal');
                        bEditar.id = station.id;
                        bEditar.onclick = function () { mostrarModal(station.id); };

                        let bApagar = document.createElement('button');
                        bApagar.className = 'btn btn-danger';
                        bApagar.innerHTML = 'Apagar';
                        bApagar.onclick = function () { apagarPosto(station.id); };

                        divCardBotoes.appendChild(bEditar);
                        divCardBotoes.appendChild(bApagar);


                        divCardBody.appendChild(divCardInformacao);
                        divCardBody.appendChild(divCardBotoes);
                        divCard.appendChild(divCardBody);
                        divInicial.appendChild(divCard);
                        divRow.appendChild(divInicial);

                        divRow.appendChild(divInicial);
                    });
                }
            }
            pedido.open("GET", "/api/policia/" + PoliciaId + "/allPostoPolicia", true);
            pedido.send();
        }
    }
    pedidogetId.open("GET", "/api/convertUserEmailPoliciaId", true);
    pedidogetId.send();


}


function mostrarModal(id) {
    console.log(id);
    idPosto = id;

    let pedidogetId = new XMLHttpRequest();
    pedidogetId.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            pedidoApagarPosto = new XMLHttpRequest();
            pedidoApagarPosto.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById('editMoradaPosto').value = JSON.parse(this.responseText).morada;
                    document.getElementById('editTelemovelPosto').value = JSON.parse(this.responseText).telefone;
                }
            }
            pedidoApagarPosto.open("GET", "/api/policia/" + this.responseText + "/postoPolicia/" + id, true);
            pedidoApagarPosto.send();
        }
    }
    pedidogetId.open("GET", "/api/convertUserEmailPoliciaId", true);
    pedidogetId.send();

}

function salvarAlteracoes() {
    let pedidogetId = new XMLHttpRequest();
    pedidogetId.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            pedidoSalvarPosto = new XMLHttpRequest();
            pedidoSalvarPosto.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    // Success message after saving changes
                    Swal.fire({
                        title: "Sucesso!",
                        text: "As alterações foram salvas com sucesso!",
                        icon: "success",
                        confirmButtonColor: "#007bff", // Bootstrap's btn-primary color
                        confirmButtonText: "OK",
                    }).then(() => {
                        location.reload();
                    });
                }
            }
            let json = '{"morada":"' + document.getElementById("editMoradaPosto").value + '", "telefone":' + document.getElementById("editTelemovelPosto").value + '}';
            console.log(json);
            let JsonParse = JSON.parse(json);
            pedidoSalvarPosto.open("POST", "/api/policia/" + this.responseText + "/postoPolicia/" + idPosto, true);
            pedidoSalvarPosto.setRequestHeader("Content-Type", "application/json");
            pedidoSalvarPosto.send(JSON.stringify(JsonParse));
        }
    }
    pedidogetId.open("GET", "/api/convertUserEmailPoliciaId", true);
    pedidogetId.send();

}

function apagarPosto(id) {
    Swal.fire({
        title: "Tem a certeza?",
        text: "Ao apagar, não será possível recuperar este posto!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#dc3545",
        confirmButtonText: "Sim, apagar!",
        cancelButtonText: "Não, cancelar!",
    }).then((result) => {
        if (result.isConfirmed) {
            let pedidogetId = new XMLHttpRequest();
            pedidogetId.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    pedidoApagarPosto = new XMLHttpRequest();
                    pedidoApagarPosto.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                            Swal.fire({
                                title: "Sucesso!",
                                text: "O posto foi apagado com sucesso!",
                                icon: "success",
                                confirmButtonColor: "#007bff", 
                                confirmButtonText: "OK",
                            }).then(() => {
                                location.reload();
                            });
                        }
                    }
                    pedidoApagarPosto.open("DELETE", "/api/policia/" + this.responseText + "/postoPolicia/" + id, true);
                    pedidoApagarPosto.send();
                }
            }
            pedidogetId.open("GET", "/api/convertUserEmailPoliciaId", true);
            pedidogetId.send();
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire("Cancelado", "O seu posto está seguro :)", "info");
        }
    });
}

function adicionarPosto() {
    document.getElementById('FAdicionarPosto').addEventListener('submit', function (e) {
        e.preventDefault();
        // your form submission code here
    });
    if (document.getElementById('moradaPostoF').value == '' || document.getElementById('telemovelPostoF').value == '') {
        return;
    } else {
        let pedidogetId = new XMLHttpRequest();
        pedidogetId.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                pedidoApagarPosto = new XMLHttpRequest();
                pedidoApagarPosto.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        Swal.fire({
                            title: "Sucesso!",
                            text: "O posto foi adicionado com sucesso!",
                            icon: "success",
                            confirmButtonColor: "#007bff", 
                            confirmButtonText: "OK",
                        }).then(() => {
                            // Recarregar postos e reordenar
                            location.reload();
                            carregarPostos();
                        });
                    }
                }
                let json = '{"morada":"' + document.getElementsByName("moradaPostoF")[0].value + '", "telefone":' + document.getElementsByName("telemovelPostoF")[0].value + '}';
                console.log(json);
                let JsonParse = JSON.parse(json);
                pedidoApagarPosto.open("POST", "/api/policia/" + this.responseText + "/postoPolicia", true);
                pedidoApagarPosto.setRequestHeader("Content-Type", "application/json");
                pedidoApagarPosto.send(JSON.stringify(JsonParse));
            }
        }
        pedidogetId.open("GET", "/api/convertUserEmailPoliciaId", true);
        pedidogetId.send();
    }
}




window.onload = carregarPostos();
