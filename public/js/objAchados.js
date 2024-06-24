let idRegular = 0;

function carregarObjetos() {
    let pedido2 = xhttp = new XMLHttpRequest();
    let numObjetos = 0;
    pedido2.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var objetos = JSON.parse(pedido2.responseText)['objetos_perdidos'];

            //DIV QUE VAI CONTER AS LINHAS
            let divGlobal = document.getElementById('ObjetosEncontrados');
            let divRow = document.createElement('div');
            divRow.className = 'row d-flex justify-content-around';
            objetos.forEach(objeto => {
                if (numObjetos % 3 == 0) {
                    divGlobal.appendChild(divRow);
                    divRow = document.createElement('div');
                    divRow.className = 'row d-flex justify-content-around';
                }
                //DIV QUE VAI CONTER CADA OBJETO
                let divObjeto = document.createElement('div');
                divObjeto.className = 'card shadow-1 border rounded-3 col-md-3 m-1 my-3';
                divObjeto.addEventListener('click', function () {
                    window.location.href = '/verObj/' + objeto['id'];
                });

                let divCard = document.createElement('div');
                divCard.className = 'card-body m-0 pt-2';

                let divContent = document.createElement('div');
                divContent.className = 'w-100 m-0 p-0';

                let imagem = document.createElement('img');
                imagem.className = 'img-thumbnail border-0 py-2';
                imagem.alt = 'Imagem do objeto Achado';
                imagem.src = '/storage/imagens_objetos/' + objeto['imagem'];
                imagem.onerror = function () {
                    imagem.src = '/storage/imagens_objetos/default_objeto.jpg';
                };

                divInfo = document.createElement('div');
                divInfo.className = 'text-start';

                let nomeObjeto = document.createElement('h6');
                nomeObjeto.className = 'card-title';
                nomeObjeto.innerHTML = 'Objeto: ' + objeto['descricao'];

                let local = document.createElement('h6');
                local.className = 'card-subtitle text-body-secondary';
                local.innerHTML = 'Localização: ' + objeto['localizacao'];

                let data = document.createElement('p');
                data.className = 'card-text';
                data.innerHTML = "Achado dia: " + objeto['data_inicio'];

                let divBotao = document.createElement('div');
                divBotao.className = 'd-flex justify-content-end mt-auto';

                let botao = document.createElement('a');
                botao.className = 'btn btn-primary btn-meu d-flex aling-self-end';
                botao.innerHTML = "É meu!";
                botao.href = "#";

                divBotao.appendChild(botao);

                divInfo.appendChild(nomeObjeto);
                divInfo.appendChild(data);
                divInfo.appendChild(local);

                divContent.appendChild(imagem);
                divContent.appendChild(divInfo);

                divCard.appendChild(divContent);
                divCard.appendChild(divBotao);

                divObjeto.appendChild(divCard);

                divRow.appendChild(divObjeto);
                numObjetos = numObjetos + 1;
            });
            divGlobal.appendChild(divRow);


        }

    }
    pedido2.open("GET", "/api/regular/dono/" + idRegular + "/verObjetosAchados", true)
    pedido2.send();

    let pedidoObjetosPerdidosSeus = xhttp = new XMLHttpRequest();
    pedidoObjetosPerdidosSeus.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var objetosPerdidos = JSON.parse(pedidoObjetosPerdidosSeus.responseText)['objetos_perdidos'];
            console.log(objetosPerdidos);

            //DIV QUE VAI CONTER OS OBJETOS PERDIDOS
            let divGlobalPerdidos = document.getElementById('MeusObjetosPerdidos');
            if (objetosPerdidos.length == 0) {
                let divSemObjetos = document.createElement('h6');
                divSemObjetos.innerHTML = 'Não existem objetos perdidos que não tenham sido entregues';
                divSemObjetos.className = "fw-light";

                divGlobalPerdidos.appendChild(divSemObjetos);
            }

            objetosPerdidos.forEach(objeto => {
                let divCardPerdidos = document.createElement('div');
                divCardPerdidos.className = 'card shadow-1 border rounded-3 col-md-12 m-1 my-3';



                let divCardPerdidosBody = document.createElement('div');
                divCardPerdidosBody.className = 'card-body m-0 pt-2 d-flex flex-column'; // Remove position-relative class

                let divCardPerdidosContent = document.createElement('div');
                divCardPerdidosContent.className = 'w-100 m-0 p-0';

                let divCardPerdidosImagem = document.createElement('img');
                divCardPerdidosImagem.className = 'img-thumbnail border-0';
                divCardPerdidosImagem.alt = 'Imagem do objeto perdido';
                divCardPerdidosImagem.src = '/storage/imagens_objetos/' + objeto['imagem'];
                divCardPerdidosImagem.onerror = function () {
                    divCardPerdidosImagem.src = '/storage/imagens_objetos/default_objeto.jpg';
                };

                let divCardPerdidosInfo = document.createElement('div');
                divCardPerdidosInfo.className = 'text-start';

                let divCardPerdidosNomeObjeto = document.createElement('h5');
                divCardPerdidosNomeObjeto.className = 'card-title';
                divCardPerdidosNomeObjeto.innerHTML = objeto['descricao'];

                let divCardPerdidosLocal = document.createElement('h6');
                divCardPerdidosLocal.className = 'card-subtitle text-body-secondary';
                divCardPerdidosLocal.innerHTML = objeto['localizacao'];

                let divCardPerdidosData = document.createElement('p');
                divCardPerdidosData.className = 'card-text';
                divCardPerdidosData.innerHTML = "Perdido de: " + objeto['data_inicio'] + " a " + objeto['data_fim'];

                let divCardPerdidosBotao = document.createElement('div');
                divCardPerdidosBotao.className = 'd-flex justify-content-end';

                let botao = document.createElement('a');
                botao.className = 'btn btn-primary btn-editar';
                botao.innerHTML = "Editar";
                botao.addEventListener('click', function () {
                    window.location.href = '/editObjPerdido/' + objeto['id'];
                });

                let botaoApagar = document.createElement('a');
                botaoApagar.className = 'btn btn-danger btn-apagar me-1';
                botaoApagar.innerHTML = "Apagar";
                botaoApagar.onclick = function () {
                    Swal.fire({
                        title: 'Tem a certeza?',
                        text: "Esta ação não pode ser desfeita!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
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
                            pedidoAtributo.open("DELETE", "/api/regular/dono/" + idRegular + "/removerObjetoPerdido/" + objeto['id'], true);
                            pedidoAtributo.send();
                        }
                    })
                };

                divCardPerdidosBotao.appendChild(botaoApagar);
                divCardPerdidosBotao.appendChild(botao);

                divCardPerdidosInfo.appendChild(divCardPerdidosNomeObjeto);
                divCardPerdidosInfo.appendChild(divCardPerdidosData);
                divCardPerdidosInfo.appendChild(divCardPerdidosLocal);

                divCardPerdidosContent.appendChild(divCardPerdidosImagem);
                divCardPerdidosContent.appendChild(divCardPerdidosInfo);

                divCardPerdidosBody.appendChild(divCardPerdidosContent);
                divCardPerdidosBody.appendChild(divCardPerdidosBotao);

                divCardPerdidos.appendChild(divCardPerdidosBody);

                divGlobalPerdidos.appendChild(divCardPerdidos);
            });

        }
    }
    pedidoObjetosPerdidosSeus.open("GET", "/api/regular/dono/" + idRegular + "/verHistoricoObjetosPerdidos", true)
    pedidoObjetosPerdidosSeus.send();



}

function carregarObjetosComPesquisa(pesquisa) {
    let pedido2 = xhttp = new XMLHttpRequest();
    let numObjetos = 0;
    pedido2.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var objetos = JSON.parse(pedido2.responseText)['objetos'];

            //DIV QUE VAI CONTER AS LINHAS
            let divGlobal = document.getElementById('ObjetosEncontrados');
            let divRow = document.createElement('div');
            divRow.className = 'row d-flex justify-content-around';
            objetos.forEach(objeto => {
                if (numObjetos % 3 == 0) {
                    divGlobal.appendChild(divRow);
                    divRow = document.createElement('div');
                    divRow.className = 'row d-flex justify-content-around';
                }
                //DIV QUE VAI CONTER CADA OBJETO
                let divObjeto = document.createElement('div');
                divObjeto.className = 'card shadow-1 border rounded-3 col-md-3 m-1 my-3';
                divObjeto.addEventListener('click', function () {
                    window.location.href = '/verObj/' + objeto['id'];
                });

                let divCard = document.createElement('div');
                divCard.className = 'card-body m-0 pt-2';

                let divContent = document.createElement('div');
                divContent.className = 'w-100 m-0 p-0';

                let imagem = document.createElement('img');
                imagem.className = 'img-thumbnail border-0 py-2';
                imagem.alt = 'Imagem do objeto Achado';
                imagem.src = '/storage/imagens_objetos/' + objeto['imagem'];
                imagem.onerror = function () {
                    imagem.src = '/storage/imagens_objetos/default_objeto.jpg';
                };

                divInfo = document.createElement('div');
                divInfo.className = 'text-start';

                let nomeObjeto = document.createElement('h6');
                nomeObjeto.className = 'card-title';
                nomeObjeto.innerHTML = 'Objeto: ' + objeto['descricao'];

                let local = document.createElement('h6');
                local.className = 'card-subtitle text-body-secondary';
                local.innerHTML = 'Localização: ' + objeto['localizacao'];

                let data = document.createElement('p');
                data.className = 'card-text';
                data.innerHTML = "Achado dia: " + objeto['data_inicio'];

                let divBotao = document.createElement('div');
                divBotao.className = 'd-flex justify-content-end mt-auto';

                let botao = document.createElement('a');
                botao.className = 'btn btn-primary btn-meu d-flex aling-self-end';
                botao.innerHTML = "É meu!";
                botao.href = "#";

                divBotao.appendChild(botao);

                divInfo.appendChild(nomeObjeto);
                divInfo.appendChild(data);
                divInfo.appendChild(local);

                divContent.appendChild(imagem);
                divContent.appendChild(divInfo);

                divCard.appendChild(divContent);
                divCard.appendChild(divBotao);

                divObjeto.appendChild(divCard);

                divRow.appendChild(divObjeto);
                numObjetos = numObjetos + 1;
            });
            divGlobal.appendChild(divRow);


        }

    }
    pedido2.open("GET", "/api/regular/dono/" + idRegular + "/encontrarObjetoPorDescricao/" + pesquisa, true)
    pedido2.send();

    let pedidoObjetosPerdidosSeus = xhttp = new XMLHttpRequest();
    pedidoObjetosPerdidosSeus.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var objetosPerdidos = JSON.parse(pedidoObjetosPerdidosSeus.responseText)['objetos_perdidos'];
            console.log(objetosPerdidos);

            //DIV QUE VAI CONTER OS OBJETOS PERDIDOS
            let divGlobalPerdidos = document.getElementById('MeusObjetosPerdidos');
            if (objetosPerdidos.length == 0) {
                let divSemObjetos = document.createElement('h6');
                divSemObjetos.innerHTML = 'Não existem objetos perdidos que não tenham sido entregues';
                divSemObjetos.className = "fw-light";

                divGlobalPerdidos.appendChild(divSemObjetos);
            }

            objetosPerdidos.forEach(objeto => {
                let divCardPerdidos = document.createElement('div');
                divCardPerdidos.className = 'card shadow-1 border rounded-3 col-md-12 m-1 my-3';



                let divCardPerdidosBody = document.createElement('div');
                divCardPerdidosBody.className = 'card-body m-0 pt-2 d-flex flex-column'; // Remove position-relative class

                let divCardPerdidosContent = document.createElement('div');
                divCardPerdidosContent.className = 'w-100 m-0 p-0';

                let divCardPerdidosImagem = document.createElement('img');
                divCardPerdidosImagem.className = 'img-thumbnail border-0';
                divCardPerdidosImagem.alt = 'Imagem do objeto perdido';
                divCardPerdidosImagem.src = '/storage/imagens_objetos/' + objeto['imagem'];
                divCardPerdidosImagem.onerror = function () {
                    divCardPerdidosImagem.src = '/storage/imagens_objetos/default_objeto.jpg';
                };

                let divCardPerdidosInfo = document.createElement('div');
                divCardPerdidosInfo.className = 'text-start';

                let divCardPerdidosNomeObjeto = document.createElement('h5');
                divCardPerdidosNomeObjeto.className = 'card-title';
                divCardPerdidosNomeObjeto.innerHTML = objeto['descricao'];

                let divCardPerdidosLocal = document.createElement('h6');
                divCardPerdidosLocal.className = 'card-subtitle text-body-secondary';
                divCardPerdidosLocal.innerHTML = objeto['localizacao'];

                let divCardPerdidosData = document.createElement('p');
                divCardPerdidosData.className = 'card-text';
                divCardPerdidosData.innerHTML = "Perdido de: " + objeto['data_inicio'] + " a " + objeto['data_fim'];

                let divCardPerdidosBotao = document.createElement('div');
                divCardPerdidosBotao.className = 'd-flex justify-content-end';

                let botao = document.createElement('a');
                botao.className = 'btn btn-primary btn-editar';
                botao.innerHTML = "Editar";
                botao.addEventListener('click', function () {
                    window.location.href = '/editObjPerdido/' + objeto['id'];
                });

                let botaoApagar = document.createElement('a');
                botaoApagar.className = 'btn btn-danger btn-apagar me-1';
                botaoApagar.innerHTML = "Apagar";
                botaoApagar.onclick = function () {
                    Swal.fire({
                        title: 'Tem a certeza?',
                        text: "Esta ação não pode ser desfeita!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
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
                            pedidoAtributo.open("DELETE", "/api/regular/dono/" + idRegular + "/removerObjetoPerdido/" + objeto['id'], true);
                            pedidoAtributo.send();
                        }
                    })
                };

                divCardPerdidosBotao.appendChild(botaoApagar);
                divCardPerdidosBotao.appendChild(botao);

                divCardPerdidosInfo.appendChild(divCardPerdidosNomeObjeto);
                divCardPerdidosInfo.appendChild(divCardPerdidosData);
                divCardPerdidosInfo.appendChild(divCardPerdidosLocal);

                divCardPerdidosContent.appendChild(divCardPerdidosImagem);
                divCardPerdidosContent.appendChild(divCardPerdidosInfo);

                divCardPerdidosBody.appendChild(divCardPerdidosContent);
                divCardPerdidosBody.appendChild(divCardPerdidosBotao);

                divCardPerdidos.appendChild(divCardPerdidosBody);

                divGlobalPerdidos.appendChild(divCardPerdidos);
            });

        }
    }
    pedidoObjetosPerdidosSeus.open("GET", "/api/regular/dono/" + idRegular + "/verHistoricoObjetosPerdidos", true)
    pedidoObjetosPerdidosSeus.send();
}

function carregarObjetosComCategoria(categoria) {
    let pedido2 = xhttp = new XMLHttpRequest();
    let numObjetos = 0;
    pedido2.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var objetos = JSON.parse(pedido2.responseText)['objetos'];

            //DIV QUE VAI CONTER AS LINHAS
            let divGlobal = document.getElementById('ObjetosEncontrados');
            let divRow = document.createElement('div');
            divRow.className = 'row d-flex justify-content-around';
            objetos.forEach(objeto => {
                if (numObjetos % 3 == 0) {
                    divGlobal.appendChild(divRow);
                    divRow = document.createElement('div');
                    divRow.className = 'row d-flex justify-content-around';
                }
                //DIV QUE VAI CONTER CADA OBJETO
                let divObjeto = document.createElement('div');
                divObjeto.className = 'card shadow-1 border rounded-3 col-md-3 m-1 my-3';
                divObjeto.addEventListener('click', function () {
                    window.location.href = '/verObj/' + objeto['id'];
                });

                let divCard = document.createElement('div');
                divCard.className = 'card-body m-0 pt-2';

                let divContent = document.createElement('div');
                divContent.className = 'w-100 m-0 p-0';

                let imagem = document.createElement('img');
                imagem.className = 'img-thumbnail border-0 py-2';
                imagem.alt = 'Imagem do objeto Achado';
                imagem.src = '/storage/imagens_objetos/' + objeto['imagem'];
                imagem.onerror = function () {
                    imagem.src = '/storage/imagens_objetos/default_objeto.jpg';
                };

                divInfo = document.createElement('div');
                divInfo.className = 'text-start';

                let nomeObjeto = document.createElement('h6');
                nomeObjeto.className = 'card-title';
                nomeObjeto.innerHTML = 'Objeto: ' + objeto['descricao'];

                let local = document.createElement('h6');
                local.className = 'card-subtitle text-body-secondary';
                local.innerHTML = 'Localização: ' + objeto['localizacao'];

                let data = document.createElement('p');
                data.className = 'card-text';
                data.innerHTML = "Achado dia: " + objeto['data_inicio'];

                let divBotao = document.createElement('div');
                divBotao.className = 'd-flex justify-content-end mt-auto';

                let botao = document.createElement('a');
                botao.className = 'btn btn-primary btn-meu d-flex aling-self-end';
                botao.innerHTML = "É meu!";
                botao.href = "#";

                divBotao.appendChild(botao);

                divInfo.appendChild(nomeObjeto);
                divInfo.appendChild(data);
                divInfo.appendChild(local);

                divContent.appendChild(imagem);
                divContent.appendChild(divInfo);

                divCard.appendChild(divContent);
                divCard.appendChild(divBotao);

                divObjeto.appendChild(divCard);

                divRow.appendChild(divObjeto);
                numObjetos = numObjetos + 1;
            });
            divGlobal.appendChild(divRow);


        }

    }
    pedido2.open("GET", "/api/regular/dono/" + idRegular + "/encontrarObjetoPorCategoria/" + categoria, true)
    pedido2.send();

    let pedidoObjetosPerdidosSeus = xhttp = new XMLHttpRequest();
    pedidoObjetosPerdidosSeus.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var objetosPerdidos = JSON.parse(pedidoObjetosPerdidosSeus.responseText)['objetos_perdidos'];
            console.log(objetosPerdidos);

            //DIV QUE VAI CONTER OS OBJETOS PERDIDOS
            let divGlobalPerdidos = document.getElementById('MeusObjetosPerdidos');
            if (objetosPerdidos.length == 0) {
                let divSemObjetos = document.createElement('h6');
                divSemObjetos.innerHTML = 'Não existem objetos perdidos que não tenham sido entregues';
                divSemObjetos.className = "fw-light";

                divGlobalPerdidos.appendChild(divSemObjetos);
            }

            objetosPerdidos.forEach(objeto => {
                let divCardPerdidos = document.createElement('div');
                divCardPerdidos.className = 'card shadow-1 border rounded-3 col-md-12 m-1 my-3';



                let divCardPerdidosBody = document.createElement('div');
                divCardPerdidosBody.className = 'card-body m-0 pt-2 d-flex flex-column'; // Remove position-relative class

                let divCardPerdidosContent = document.createElement('div');
                divCardPerdidosContent.className = 'w-100 m-0 p-0';

                let divCardPerdidosImagem = document.createElement('img');
                divCardPerdidosImagem.className = 'img-thumbnail border-0';
                divCardPerdidosImagem.alt = 'Imagem do objeto perdido';
                divCardPerdidosImagem.src = '/storage/imagens_objetos/' + objeto['imagem'];
                divCardPerdidosImagem.onerror = function () {
                    divCardPerdidosImagem.src = '/storage/imagens_objetos/default_objeto.jpg';
                };

                let divCardPerdidosInfo = document.createElement('div');
                divCardPerdidosInfo.className = 'text-start';

                let divCardPerdidosNomeObjeto = document.createElement('h5');
                divCardPerdidosNomeObjeto.className = 'card-title';
                divCardPerdidosNomeObjeto.innerHTML = objeto['descricao'];

                let divCardPerdidosLocal = document.createElement('h6');
                divCardPerdidosLocal.className = 'card-subtitle text-body-secondary';
                divCardPerdidosLocal.innerHTML = objeto['localizacao'];

                let divCardPerdidosData = document.createElement('p');
                divCardPerdidosData.className = 'card-text';
                divCardPerdidosData.innerHTML = "Perdido de: " + objeto['data_inicio'] + " a " + objeto['data_fim'];

                let divCardPerdidosBotao = document.createElement('div');
                divCardPerdidosBotao.className = 'd-flex justify-content-end';

                let botao = document.createElement('a');
                botao.className = 'btn btn-primary btn-editar';
                botao.innerHTML = "Editar";
                botao.addEventListener('click', function () {
                    window.location.href = '/editObjPerdido/' + objeto['id'];
                });

                let botaoApagar = document.createElement('a');
                botaoApagar.className = 'btn btn-danger btn-apagar me-1';
                botaoApagar.innerHTML = "Apagar";
                botaoApagar.onclick = function () {
                    Swal.fire({
                        title: 'Tem a certeza?',
                        text: "Esta ação não pode ser desfeita!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
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
                            pedidoAtributo.open("DELETE", "/api/regular/dono/" + idRegular + "/removerObjetoPerdido/" + objeto['id'], true);
                            pedidoAtributo.send();
                        }
                    })
                };

                divCardPerdidosBotao.appendChild(botaoApagar);
                divCardPerdidosBotao.appendChild(botao);

                divCardPerdidosInfo.appendChild(divCardPerdidosNomeObjeto);
                divCardPerdidosInfo.appendChild(divCardPerdidosData);
                divCardPerdidosInfo.appendChild(divCardPerdidosLocal);

                divCardPerdidosContent.appendChild(divCardPerdidosImagem);
                divCardPerdidosContent.appendChild(divCardPerdidosInfo);

                divCardPerdidosBody.appendChild(divCardPerdidosContent);
                divCardPerdidosBody.appendChild(divCardPerdidosBotao);

                divCardPerdidos.appendChild(divCardPerdidosBody);

                divGlobalPerdidos.appendChild(divCardPerdidos);
            });

        }
    }
    pedidoObjetosPerdidosSeus.open("GET", "/api/regular/dono/" + idRegular + "/verHistoricoObjetosPerdidos", true)
    pedidoObjetosPerdidosSeus.send();
}

function carregarCategorias() {
    let pedidoCategorias = new XMLHttpRequest();
    pedidoCategorias.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            categorias = JSON.parse(pedidoCategorias.responseText);
            console.log(categorias);

            divGlobal = document.getElementById("catList");
            for (let i = 0; i < categorias.length; i++) {
                let li = document.createElement('li');


                let a = document.createElement('a');
                a.className = 'dropdown-item';
                a.addEventListener('click', function () {
                    localStorage.setItem('categoriaSearch', categorias[i]['id']);
                    window.location.href = '/buscaObjAchados';
                });

                let div = document.createElement('div');
                div.className = 'form-check';

                let input = document.createElement('input');
                input.type = 'checkbox';
                input.className = 'form-check-input';

                let label = document.createElement('label');
                label.className = 'form-check-label';
                label.innerHTML = categorias[i]['nome'];

                div.appendChild(input);
                div.appendChild(label);
                a.appendChild(div);
                li.appendChild(a);
                divGlobal.appendChild(li);
            }
        }

    }
    pedidoCategorias.open("GET", "/api/avaliador/1/getCategorias", true);
    pedidoCategorias.send();
}


function obterIdECarregarObjetos() {
    let pedido = xhttp = new XMLHttpRequest();
    pedido.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            idRegular = JSON.parse(pedido.responseText);
            console.log(idRegular);
            let searchTerm = localStorage.getItem('searchTerm');
            let categoriaSearch = localStorage.getItem('categoriaSearch');
            if (searchTerm != null) {
                carregarObjetosComPesquisa(searchTerm);
            } if (categoriaSearch != null) {
                carregarObjetosComCategoria(categoriaSearch)
            } else {
                carregarObjetos();
            }
            localStorage.removeItem('searchTerm');
            localStorage.removeItem('categoriaSearch');
        }

    }
    pedido.open("GET", "/api/convertUserEmailRegularId", true)
    pedido.send();
}





window.addEventListener('DOMContentLoaded', function () {
    obterIdECarregarObjetos();
    carregarCategorias();
});
