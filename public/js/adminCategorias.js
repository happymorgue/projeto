var idCat;
var idAtr;

function carregarCategorias() {
    let pedidoCategorias = new XMLHttpRequest();
    pedidoCategorias.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            categorias = JSON.parse(pedidoCategorias.responseText);
            console.log(categorias);

            divGlobal = document.getElementById("Cat");
            for (let i = 0; i < categorias.length; i++) {
                let tr = document.createElement("tr");
                divGlobal.appendChild(tr);

                let th = document.createElement("th");
                th.scope = "row";
                th.innerText = categorias[i].id;
                tr.appendChild(th);

                let tdNome = document.createElement("td");
                tdNome.innerText = categorias[i].nome.substring(0, 40);
                tr.appendChild(tdNome);

                let tdEditar = document.createElement("td");

                let buttonEditarCat = document.createElement("button");
                buttonEditarCat.type = "button";
                buttonEditarCat.className = "btn btn-dark";
                buttonEditarCat.innerText = "Editar";
                buttonEditarCat.setAttribute('data-bs-toggle', 'modal');
                buttonEditarCat.setAttribute('data-bs-target', '#ModalCatEditar');
                buttonEditarCat.addEventListener('click', function () {
                    idCat = categorias[i].id;
                    console.log("Button clicked, category ID:", categorias[i].id);
                    carregarInformacaoCategoriaModal(categorias[i].id);
                });

                tdEditar.appendChild(buttonEditarCat);
                tr.appendChild(tdEditar);

                let tdRemoverCat = document.createElement("td");

                let buttonRemoverCat = document.createElement("button");
                buttonRemoverCat.type = "button";
                buttonRemoverCat.className = "btn btn-danger ms-1";
                buttonRemoverCat.innerText = "Remover";
                buttonRemoverCat.addEventListener('click', function () {
                    removerCat(categorias[i].id);
                });

                tdRemoverCat.appendChild(buttonRemoverCat);
                tr.appendChild(tdRemoverCat);
            }
        }

    }
    pedidoCategorias.open("GET", "/api/avaliador/1/getCategorias", true);
    pedidoCategorias.send();
}

function carregarAtributos() {
    let pedidoAtributos = new XMLHttpRequest();
    pedidoAtributos.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            atributos = JSON.parse(pedidoAtributos.responseText);
            console.log(atributos);

            divGlobal = document.getElementById("Atr");
            for (let i = 0; i < atributos.length; i++) {
                let tr = document.createElement("tr");
                divGlobal.appendChild(tr);
                let th = document.createElement("th");
                th.scope = "row";
                th.innerText = atributos[i].id;
                tr.appendChild(th);

                let tdNome = document.createElement("td");
                tdNome.innerText = atributos[i].nome.substring(0, 40);
                tr.appendChild(tdNome);

                let tdTipo = document.createElement("td");
                tdTipo.innerText = atributos[i].tipo_dados;
                tr.appendChild(tdTipo);

                let tdCategoria = document.createElement("td");
                tdCategoria.innerText = atributos[i].categoria;
                tr.appendChild(tdCategoria);

                let tdEditar = document.createElement("td");

                let buttonEditarAtr = document.createElement("button");
                buttonEditarAtr.type = "button";
                buttonEditarAtr.className = "btn btn-dark";
                buttonEditarAtr.innerText = "Editar";
                buttonEditarAtr.setAttribute('data-bs-toggle', 'modal');
                buttonEditarAtr.setAttribute('data-bs-target', '#ModalAtEditar');
                buttonEditarAtr.addEventListener('click', function () {
                    idAtr = atributos[i].id;
                    console.log("Button clicked, atribute ID:", atributos[i].id);
                    carregarInformacaoAtributoModal(atributos[i].id);
                });

                tdEditar.appendChild(buttonEditarAtr);
                tr.appendChild(tdEditar);

                let tdRemoverAtr = document.createElement("td");

                let buttonRemoverAtr = document.createElement("button");
                buttonRemoverAtr.type = "button";
                buttonRemoverAtr.className = "btn btn-danger ms-1";
                buttonRemoverAtr.innerText = "Remover";
                buttonRemoverAtr.addEventListener('click', function () {
                    removerAtributo(atributos[i].id);
                });

                tdRemoverAtr.appendChild(buttonRemoverAtr);
                tr.appendChild(tdRemoverAtr);
            }
        }

    }
    pedidoAtributos.open("GET", "/api/avaliador/1/getAtributos", true);
    pedidoAtributos.send();
}


function carregarInformacaoCategoriaModal(id) {
    let pedidoCategoria = new XMLHttpRequest();
    pedidoCategoria.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            categoria = JSON.parse(pedidoCategoria.responseText)[0];
            console.log(categoria);
            document.getElementById("nomeCat").value = categoria.nome;
        }
    }
    pedidoCategoria.open("GET", "/api/avaliador/1/categoria/" + id, true);
    pedidoCategoria.send();

}

function carregarInformacaoAtributoModal(id) {
    let pedidoAtributo = new XMLHttpRequest();
    console.log(id);
    pedidoAtributo.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            atributo = JSON.parse(pedidoAtributo.responseText);
            console.log(atributo);
            document.getElementById("nomeAtri").value = atributo.nome;
            document.getElementById("tipoAtri").value = atributo.tipo_dados;
        }
    }
    pedidoAtributo.open("GET", "/api/avaliador/1/atributo/" + id, true);
    pedidoAtributo.send();

}


function editarCat() {
    let nome = document.getElementById("nomeCat").value;
    let categoria = {
        "nome": nome
    }
    let pedidoCategoria = new XMLHttpRequest();
    pedidoCategoria.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(pedidoCategoria.responseText);
            window.location.reload();
        }
    }
    pedidoCategoria.open("POST", "/api/avaliador/1/categoria/" + idCat, true);
    pedidoCategoria.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    pedidoCategoria.send(JSON.stringify(categoria));

}


function editarAtributo() {
    let nome = document.getElementById("nomeAtri").value;
    let tipo = document.getElementById("tipoAtri").value;
    let atributo = {
        "nome": nome,
        "tipo_dados": tipo
    }
    let pedidoAtributo = new XMLHttpRequest();
    pedidoAtributo.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(pedidoAtributo.responseText);
            window.location.reload();
        }
    }
    pedidoAtributo.open("POST", "/api/avaliador/1/atributo/" + idAtr, true);
    pedidoAtributo.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    pedidoAtributo.send(JSON.stringify(atributo));
}

function removerCat(id) {
    console.log(id);
    Swal.fire({
        title: 'Tem a certeza?',
        text: "Esta ação não pode ser desfeita!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, apagar!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            let pedidoCategoria = new XMLHttpRequest();
            pedidoCategoria.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    window.location.reload();
                }
            }
            pedidoCategoria.open("DELETE", "/api/avaliador/1/categoria/" + id, true);
            pedidoCategoria.send();
        }
    })
}

function removerAtributo(id) {
    console.log(id);
    Swal.fire({
        title: 'Tem a certeza?',
        text: "Esta ação não pode ser desfeita!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, apagar!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            let pedidoAtributo = new XMLHttpRequest();
            pedidoAtributo.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    window.location.reload();
                }
            }
            pedidoAtributo.open("DELETE", "/api/avaliador/1/atributo/" + id, true);
            pedidoAtributo.send();
            console.log("Atributo removido com sucesso!");
        }
    })
}

function criarCategoria() {
    //TODO
    let nome = document.getElementById("nomeCatCriar").value;
    let descricao = document.getElementById("descricaoCat").value;
    let categoria = {
        "nome": nome,
        "descricao": descricao
    }
    let pedidoCategoria = new XMLHttpRequest();
    pedidoCategoria.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(pedidoCategoria.responseText);
            window.location.reload();
        }
    }
    pedidoCategoria.open("POST", "/api/avaliador/1/categoria", true);
    pedidoCategoria.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    pedidoCategoria.send(JSON.stringify(categoria));
}

function criarAtributos() {
    //TODO
    let nome = document.getElementById("nomeAtriCriar").value;
    let tipo = document.getElementById("tipoAtriCriar").value;
    let categoria = document.getElementById("criarAt").value;
    let atributo = {
        "nome": nome,
        "tipo_dados": tipo,
        "categoria_id": categoria
    }
    let pedidoAtributo = new XMLHttpRequest();
    pedidoAtributo.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(pedidoAtributo.responseText);
            window.location.reload();
        }
    }
    pedidoAtributo.open("POST", "/api/avaliador/1/atributo", true);
    pedidoAtributo.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    pedidoAtributo.send(JSON.stringify(atributo));
}

function carregarCategoriasModal() {
    let pedidoCategorias = new XMLHttpRequest();
    pedidoCategorias.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            categorias = JSON.parse(pedidoCategorias.responseText);
            console.log(categorias);

            let select = document.getElementById("criarAt");
            for (let i = 0; i < categorias.length; i++) {
                let option = document.createElement("option");
                option.value = categorias[i].id;
                option.innerText = categorias[i].nome;
                select.appendChild(option);
            }
        }

    }
    pedidoCategorias.open("GET", "/api/avaliador/1/getCategorias", true);
    pedidoCategorias.send();

}


window.addEventListener('DOMContentLoaded', function () {
    carregarCategorias();
    carregarAtributos();
    carregarCategoriasModal();
});