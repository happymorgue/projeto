function carregarUsers() {
    let pedidoUsers = new XMLHttpRequest();
    pedidoUsers.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            utilizadores = JSON.parse(pedidoUsers.responseText);
            console.log(utilizadores);

            divGlobal = document.getElementById("Users");
            for (let i = 0; i < utilizadores.length; i++) {
                let tr = document.createElement("tr");
                divGlobal.appendChild(tr);
                let th = document.createElement("th");
                th.scope = "row";
                th.innerText = utilizadores[i].id;
                tr.appendChild(th);

                let tdNome = document.createElement("td");
                tdNome.innerText = utilizadores[i].email.substring(0, 40);
                tr.appendChild(tdNome);

                let tdTipo = document.createElement("td");
                if (utilizadores[i].ativo == 'S') {
                    tdTipo.innerText = "Ativo";
                } else {
                    tdTipo.innerText = "Inativo";
                }

                tr.appendChild(tdTipo);

                let tdEditar = document.createElement("td");

                let buttonEditarAtr = document.createElement("button");
                buttonEditarAtr.type = "button";
                buttonEditarAtr.className = "btn btn-success";
                buttonEditarAtr.innerText = "Ativar";
                if (utilizadores[i].ativo == 'N') {
                    buttonEditarAtr.addEventListener('click', function () {
                        console.log("Button clicked, atribute ID:", utilizadores[i].email);
                        ativar(utilizadores[i].email);
                    });
                } else {
                    buttonEditarAtr.disabled = true;
                }


                tdEditar.appendChild(buttonEditarAtr);
                tr.appendChild(tdEditar);

                let tdRemoverAtr = document.createElement("td");

                let buttonRemoverAtr = document.createElement("button");
                buttonRemoverAtr.type = "button";
                buttonRemoverAtr.className = "btn btn-danger";
                buttonRemoverAtr.innerText = "Desativar";
                if (utilizadores[i].ativo == 'S') {
                    buttonRemoverAtr.addEventListener('click', function () {
                        desativar(utilizadores[i].email);
                    });
                } else {
                    buttonRemoverAtr.disabled = true;
                }

                tdRemoverAtr.appendChild(buttonRemoverAtr);
                tr.appendChild(tdRemoverAtr);
            }
        }

    }
    pedidoUsers.open("GET", "/api/avaliador/1/getUtilizadores", true);
    pedidoUsers.send();
}


function ativar(id) {
    let pedido = new XMLHttpRequest();
    pedido.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            window.location.reload();
        }
    }
    pedido.open("GET", "/api/avaliador/1/ativar/" + id, true);
    pedido.send();

}

function desativar(id) {
    let pedido = new XMLHttpRequest();
    pedido.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log("Avaliador desativado");
            window.location.reload();
        }
    }
    pedido.open("GET", "/api/avaliador/1/desativar/" + id, true);
    pedido.send();

}


window.addEventListener('DOMContentLoaded', function () {
    carregarUsers();
    //carregarAtributos();
    //carregarCategoriasModal();
});