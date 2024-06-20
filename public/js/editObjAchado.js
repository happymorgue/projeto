var idObjeto;
function getCategorias() {
    fetch('/api/obterCategorias')
        .then(response => response.json())
        .then(data => {
            let categorias = data;
            let select = document.getElementById('categoria');
            document.getElementById('categoria').addEventListener('change', alterarAtributos);
            document.getElementById('form').addEventListener('submit', function (event) {
                event.preventDefault();
            });
            categorias.forEach(categoria => {
                let option = document.createElement('option');
                option.value = categoria.id;
                option.text = categoria.nome;
                select.appendChild(option);
            });
        });
}

function getAtributossss() {
    //Este codigo foi todo constuido pelo amigo Copilot, é lindo, vamos todos tirar um momento para lhe agradecer
    let idCategoria = document.getElementById('categoria').value;
    fetch('/api/obterAtributos/' + idCategoria)
        .then(response => response.json())
        .then(data => {
            let atributos = data;
            let form = document.getElementById('form');
            form.innerHTML = '';
            atributos.forEach(atributo => {
                let div = document.createElement('div');
                div.className = 'form-group';
                let label = document.createElement('label');
                label.htmlFor = atributo.nome;
                label.innerHTML = atributo.nome;
                let input = document.createElement('input');
                input.type = 'text';
                input.className = 'form-control';
                input.id = atributo.nome;
                div.appendChild(label);
                div.appendChild(input);
                form.appendChild(div);
            });
        });
}

function alterarAtributos() {
    idCategoria = document.getElementById('categoria').value;
    return fetch('/api/obterAtributos/' + idCategoria)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            let divAtributos = document.getElementById('atributos');
            divAtributos.innerHTML = '';
            let atributos = data;
            atributos.forEach(atributo => {
                let div = document.createElement('div');
                div.className = 'form-group';
                let label = document.createElement('label');
                label.htmlFor = atributo.nome;
                label.innerHTML = atributo.nome;
                let input = document.createElement('input');
                input.type = atributo.tipo_dados;
                input.className = 'form-control atributo';
                input.id = atributo.id;
                input.name = atributo.nome;
                div.appendChild(label);
                div.appendChild(input);
                divAtributos.appendChild(div);
            });
        });
}

function registoObjeto() {
    fetch('/api/convertUserEmailPoliciaId')
        .then(response => response.json())
        .then(data => {
            registarObjetoPerdido(data);
        });

}

function registarObjetoPerdido(idPolicia) {
    let descricao = document.getElementById('descricao').value;
    let categoria = document.getElementById('categoria').value;
    let data_inicio = document.getElementById('dataInicio').value;
    let data_fim = document.getElementById('dataFim').value;
    let pais = document.getElementById('pais').value;
    let distrito = document.getElementById('distrito').value;
    let cidade = document.getElementById('cidade').value;
    let freguesia = document.getElementById('freguesia').value;
    let rua = document.getElementById('rua').value;
    //DEPOIS VER NO MAPBOX SE EH PRECISO VERICAR SE OS CAMPOS ESTAO VAZIOS OU NAO
    let localizacao = pais + ', ' + distrito + ', ' + cidade + ', ' + freguesia + ', ' + rua;

    let atributos = document.getElementById('atributos').getElementsByClassName('atributo');
    let atributosParsed = [];
    for (let i = 0; i < atributos.length; i++) {
        if (atributos[i].value != "") {
            atributosParsed.push({
                'atributo_id': atributos[i].id,
                'valor': atributos[i].value
            });
        }
    }

    let objeto = {};
    objeto['descricao'] = descricao;
    objeto['categoria_id'] = categoria;
    objeto['data_inicio'] = data_inicio;
    objeto['data_fim'] = data_fim;
    objeto['pais'] = pais;
    objeto['distrito'] = distrito;
    objeto['cidade'] = cidade;
    objeto['freguesia'] = freguesia;
    objeto['rua'] = rua;
    objeto['localizacao'] = localizacao;
    objeto['atributos'] = atributosParsed;
    sendImage().then(image => {
        if (image != null) {
            objeto['imagem'] = image;
        }
        fetch('/api/policia/' + idPolicia + '/atualizarObjetoAchado/' + idObjeto, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(objeto)
        })
            .then(response => {
                if (response.ok) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Objeto atualizado com sucesso',
                        text: 'O objeto foi atualizado com sucesso.',
                        confirmButtonText: 'Prosseguir',
                    }).then((result) => {
                        if (result) {
                            window.location.href = '/verPoliciaObjAchados';
                        }
                    });

                    //window.location.replace('/perfilPolicia');
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro ao atualizado objeto',
                        text: 'Houve um erro ao atualizado o objeto. Por favor, tente novamente mais tarde.',
                    });
                }
            })
            .catch(error => console.error('Error:', error));
    });
}

function retornar() {
    window.location.href = '/verPoliciaObjAchados';
}


function sendImage() {
    // Get the file input element
    let fileInput = document.getElementById('imagem');
    if (fileInput.files.length == 0) {
        return new Promise((resolve, reject) => {
            resolve(null);
        });
    }

    // Get the files from the input
    let files = fileInput.files;

    // Create a new FormData object
    let formData = new FormData();

    // If there are files selected
    if (files.length > 0) {
        // Get the first file in the list
        let file = files[0];
        console.log(file);

        // Append the file to the FormData object
        formData.append('imagem', file);
    }

    // Now send the FormData object with the fetch API
    return fetch('/api/uploadImage', {
        method: 'POST',
        body: formData
    })
        .then(response => response.text())
        .then(text => {
            console.log("ola");
            console.log(text);
            console.log("ola");
            return text;
        })
        .catch(error => console.error('Error in sendImage:', error));
}

function verificarAtributos() {
    let atributos = document.getElementById('atributos').getElementsByClassName('atributo');
    let atributosParsed = [];
    for (let i = 0; i < atributos.length; i++) {
        if (atributos[i].value != "") {
            atributosParsed.push({
                'atributo_id': atributos[i].id,
                'valor': atributos[i].value
            });
        }
    }
    console.log(atributosParsed);

}

function inserirDados() {
    pedidoObj = new XMLHttpRequest();
    pedidoObj.onreadystatechange = async function () {
        if (this.readyState == 4 && this.status == 200) {
            objeto = JSON.parse(pedidoObj.responseText)['objeto'];
            //CARREGAR OBJETO
            console.log(objeto);
            document.getElementById("descricao").value = objeto.descricao;
            document.getElementById("categoria").value = objeto.categoria_id;
            await alterarAtributos();
            //SECCAO ATRIBUTOS
            let atributos = objeto.atributos;
            atributos.forEach(atributo => {
                console.log(atributo.atributo_id);
                document.getElementById(atributo.atributo_id).value = atributo.valor;
            });

            document.getElementById("dataInicio").value = objeto.data_inicio;
            document.getElementById("dataFim").value = objeto.data_fim;
            document.getElementById("pais").value = objeto.pais;
            document.getElementById("distrito").value = objeto.distrito;
            document.getElementById("cidade").value = objeto.cidade;
            document.getElementById("freguesia").value = objeto.freguesia;
            document.getElementById("rua").value = objeto.rua;

            idObjeto = objeto.id;

        }

    }
    pedidoObj.open("GET", "/api/obterObjeto/" + window.location.href.split('/')[4], true);
    pedidoObj.send();
}


window.addEventListener('DOMContentLoaded', function () {
    getCategorias();
    inserirDados();
});