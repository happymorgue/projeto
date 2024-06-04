var idUtilizador;

function carregarNotifs() {
    pedidoNotificacao = new XMLHttpRequest();
    pedidoNotificacao.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            notifs = JSON.parse(pedidoNotificacao.responseText)['notificacoes'];
            console.log(notifs)
            //CARREGAR AS NOTIFICACOES
            notifs.forEach(notif => {
                console.log(notif['leilao_id'] == null);
                let divGlobal = document.getElementById("notificacoes");
                if (notif['leilao_id'] != null) {
                    let divNotificacaoLeilao = document.createElement("div");
                    divNotificacaoLeilao.className = "col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-1";

                    let divNotificacaoLeilaoCard = document.createElement("div");
                    divNotificacaoLeilaoCard.className = "card shadow-0 border rounded-3";

                    let divNotificacaoLeilaoCardBody = document.createElement("div");
                    divNotificacaoLeilaoCardBody.className = "card-body";

                    let divNotificacaoLeilaoCardBodyRow = document.createElement("div");
                    divNotificacaoLeilaoCardBodyRow.className = "row";

                    let divNotificacaoLeilaoCardBodyRowCol1 = document.createElement("div");
                    divNotificacaoLeilaoCardBodyRowCol1.className = "col-sm-7 col-md-6 col-lg-7 col-xl-8 p-md-3 p-lg-3 p-xl-3";

                    let divNotificacaoLeilaoCardBodyRowCol1P = document.createElement("p");
                    divNotificacaoLeilaoCardBodyRowCol1P.className = "mb-4 mb-md-0 mb-sm-0";
                    divNotificacaoLeilaoCardBodyRowCol1P.style = "overflow: hidden; overflow-wrap: break-word;";
                    divNotificacaoLeilaoCardBodyRowCol1P.innerHTML = notif['mensagem'];

                    divNotificacaoLeilaoCardBodyRowCol1.appendChild(divNotificacaoLeilaoCardBodyRowCol1P);

                    let divNotificacaoLeilaoCardBodyRowCol1Div = document.createElement("div");
                    divNotificacaoLeilaoCardBodyRowCol1Div.className = "d-flex pt-3";

                    let divNotificacaoLeilaoCardBodyRowCol1DivA = document.createElement("a");
                    divNotificacaoLeilaoCardBodyRowCol1DivA.className = "btn btn-primary btn-sm me-2";
                    divNotificacaoLeilaoCardBodyRowCol1DivA.role = "button";
                    divNotificacaoLeilaoCardBodyRowCol1DivA.innerHTML = "Ver detalhes";
                    divNotificacaoLeilaoCardBodyRowCol1DivA.href = "/leilao/" + notif['leilao_id']['id'];

                    divNotificacaoLeilaoCardBodyRowCol1Div.appendChild(divNotificacaoLeilaoCardBodyRowCol1DivA);

                    divNotificacaoLeilaoCardBodyRowCol1.appendChild(divNotificacaoLeilaoCardBodyRowCol1Div);


                    let divNotificacaoLeilaoCardBodyRowCol2 = document.createElement("div");
                    divNotificacaoLeilaoCardBodyRowCol2.className = "col-sm-5 col-md-6 col-lg-5 col-xl-4 mb-lg-0 d-flex justify-content-end";

                    let divNotificacaoLeilaoCardBodyRowCol2Div = document.createElement("div");
                    divNotificacaoLeilaoCardBodyRowCol2Div.className = "bg-image";

                    let divNotificacaoLeilaoCardBodyRowCol2DivImg = document.createElement("img");
                    divNotificacaoLeilaoCardBodyRowCol2DivImg.className = "img-fluid";
                    divNotificacaoLeilaoCardBodyRowCol2DivImg.style = "max-width: 10em;";
                    divNotificacaoLeilaoCardBodyRowCol2DivImg.src = '/storage/imagens_objetos/' + notif['leilao_id']['objeto']['imagem'];
                    divNotificacaoLeilaoCardBodyRowCol2DivImg.onerror = function () {
                        divNotificacaoLeilaoCardBodyRowCol2DivImg.src = '/storage/imagens_objetos/default_objeto.jpg';
                    };
                    divNotificacaoLeilaoCardBodyRowCol2Div.appendChild(divNotificacaoLeilaoCardBodyRowCol2DivImg);


                    divNotificacaoLeilaoCardBodyRowCol2.appendChild(divNotificacaoLeilaoCardBodyRowCol2Div);
                    divNotificacaoLeilaoCardBodyRow.appendChild(divNotificacaoLeilaoCardBodyRowCol1);
                    divNotificacaoLeilaoCardBodyRow.appendChild(divNotificacaoLeilaoCardBodyRowCol2);
                    divNotificacaoLeilaoCardBody.appendChild(divNotificacaoLeilaoCardBodyRow);
                    divNotificacaoLeilaoCard.appendChild(divNotificacaoLeilaoCardBody);
                    divNotificacaoLeilao.appendChild(divNotificacaoLeilaoCard);
                    divGlobal.appendChild(divNotificacaoLeilao);
                } else {
                    let divNotificacaoObjeto = document.createElement("div");
                    divNotificacaoObjeto.className = "col-md-12 col-xl-12";

                    let divNotificacaoObjetoCard = document.createElement("div");
                    divNotificacaoObjetoCard.className = "card shadow-0 border rounded-3";

                    let divNotificacaoObjetoCardBody = document.createElement("div");
                    divNotificacaoObjetoCardBody.className = "card-body";

                    let divNotificacaoObjetoCardBodyRow = document.createElement("div");
                    divNotificacaoObjetoCardBodyRow.className = "row";

                    let divNotificacaoObjetoCardBodyRow1P = document.createElement("p");
                    divNotificacaoObjetoCardBodyRow1P.innerHTML = notif['mensagem'];

                    divNotificacaoObjetoCardBodyRow.appendChild(divNotificacaoObjetoCardBodyRow1P);

                    let divNotificacaoObjetoCardBodyRow2Div = document.createElement("div");
                    divNotificacaoObjetoCardBodyRow2Div.className = "col-md-12 col-lg-12 col-xl-12 mb-4 mb-lg-0 d-flex justify-content-center align-items-center";

                    let divNotificacaoObjetoCardBodyRow2DivCol1 = document.createElement("div");
                    divNotificacaoObjetoCardBodyRow2DivCol1.className = "bg-image col-lg-4 d-flex justify-content-center align-items-center";

                    let divNotificacaoObjetoCardBodyRow2DivCol1Figure = document.createElement("figure");
                    divNotificacaoObjetoCardBodyRow2DivCol1Figure.className = "figure";

                    let divNotificacaoObjetoCardBodyRow2DivCol1Img;
                    let divNotificacaoObjetoCardBodyRow2DivCol1Caption;

                    if (notif['mensagem'] == "Um policia acredita ter encontrado o seu objeto") {

                        divNotificacaoObjetoCardBodyRow2DivCol1Img = document.createElement("img");
                        divNotificacaoObjetoCardBodyRow2DivCol1Img.className = "figure-img img-fluid rounded";
                        divNotificacaoObjetoCardBodyRow2DivCol1Img.style = "max-width: 12em;";
                        divNotificacaoObjetoCardBodyRow2DivCol1Img.src = '/storage/imagens_objetos/' + notif['objeto_perdido']['imagem'];
                        divNotificacaoObjetoCardBodyRow2DivCol1Img.onerror = function () {
                            divNotificacaoObjetoCardBodyRow2DivCol1Img.src = '/storage/imagens_objetos/default_objeto.jpg';
                        }
                        divNotificacaoObjetoCardBodyRow2DivCol1Caption = document.createElement("figcaption");
                        divNotificacaoObjetoCardBodyRow2DivCol1Caption.className = "figure-caption";
                        divNotificacaoObjetoCardBodyRow2DivCol1Caption.innerHTML = "O seu objeto perdido";
                    } else {
                        divNotificacaoObjetoCardBodyRow2DivCol1Img = document.createElement("img");
                        divNotificacaoObjetoCardBodyRow2DivCol1Img.className = "figure-img img-fluid rounded";
                        divNotificacaoObjetoCardBodyRow2DivCol1Img.style = "max-width: 12em;";
                        divNotificacaoObjetoCardBodyRow2DivCol1Img.src = '/storage/imagens_objetos/' + notif['objeto_achado']['imagem'];
                        divNotificacaoObjetoCardBodyRow2DivCol1Img.onerror = function () {
                            divNotificacaoObjetoCardBodyRow2DivCol1Img.src = '/storage/imagens_objetos/default_objeto.jpg';
                        }
                        divNotificacaoObjetoCardBodyRow2DivCol1Caption = document.createElement("figcaption");
                        divNotificacaoObjetoCardBodyRow2DivCol1Caption.className = "figure-caption";
                        divNotificacaoObjetoCardBodyRow2DivCol1Caption.innerHTML = "O seu objeto achado";
                    }



                    divNotificacaoObjetoCardBodyRow2DivCol1Figure.appendChild(divNotificacaoObjetoCardBodyRow2DivCol1Img);
                    divNotificacaoObjetoCardBodyRow2DivCol1Figure.appendChild(divNotificacaoObjetoCardBodyRow2DivCol1Caption);
                    divNotificacaoObjetoCardBodyRow2DivCol1.appendChild(divNotificacaoObjetoCardBodyRow2DivCol1Figure);
                    divNotificacaoObjetoCardBodyRow2Div.appendChild(divNotificacaoObjetoCardBodyRow2DivCol1);

                    let divNotificacaoObjetoCardBodyRow2DivCol2 = document.createElement("div");
                    divNotificacaoObjetoCardBodyRow2DivCol2.className = "col-lg-2 pb-5 d-flex justify-content-center align-items-center";

                    let divNotificacaoObjetoCardBodyRow2DivCol2Img = document.createElement("img");
                    divNotificacaoObjetoCardBodyRow2DivCol2Img.className = "img-fluid";
                    divNotificacaoObjetoCardBodyRow2DivCol2Img.style = "max-width: 5em;";
                    divNotificacaoObjetoCardBodyRow2DivCol2Img.src = '/arrows.png';
                    divNotificacaoObjetoCardBodyRow2DivCol2.appendChild(divNotificacaoObjetoCardBodyRow2DivCol2Img);
                    divNotificacaoObjetoCardBodyRow2Div.appendChild(divNotificacaoObjetoCardBodyRow2DivCol2);


                    let divNotificacaoObjetoCardBodyRow2DivCol3 = document.createElement("div");
                    divNotificacaoObjetoCardBodyRow2DivCol3.className = "bg-image col-lg-4 d-flex justify-content-center align-items-center";

                    let divNotificacaoObjetoCardBodyRow2DivCol3Figure = document.createElement("figure");
                    divNotificacaoObjetoCardBodyRow2DivCol3Figure.className = "figure";

                    let divNotificacaoObjetoCardBodyRow2DivCol3Img;
                    let divNotificacaoObjetoCardBodyRow2DivCol3Caption;
                    if (notif['mensagem'] == "Um policia acredita ter encontrado o seu objeto") {

                        divNotificacaoObjetoCardBodyRow2DivCol3Img = document.createElement("img");
                        divNotificacaoObjetoCardBodyRow2DivCol3Img.className = "figure-img img-fluid rounded";
                        divNotificacaoObjetoCardBodyRow2DivCol3Img.style = "max-width: 12em;";
                        divNotificacaoObjetoCardBodyRow2DivCol3Img.src = '/storage/imagens_objetos/' + notif['objeto_achado']['imagem'];
                        divNotificacaoObjetoCardBodyRow2DivCol3Img.onerror = function () {
                            divNotificacaoObjetoCardBodyRow2DivCol3Img.src = '/storage/imagens_objetos/default_objeto.jpg';
                        }
                        divNotificacaoObjetoCardBodyRow2DivCol3Caption = document.createElement("figcaption");
                        divNotificacaoObjetoCardBodyRow2DivCol3Caption.className = "figure-caption";
                        divNotificacaoObjetoCardBodyRow2DivCol3Caption.innerHTML = "O objeto achado";
                    } else {
                        divNotificacaoObjetoCardBodyRow2DivCol3Img = document.createElement("img");
                        divNotificacaoObjetoCardBodyRow2DivCol3Img.className = "figure-img img-fluid rounded";
                        divNotificacaoObjetoCardBodyRow2DivCol3Img.style = "max-width: 12em;";
                        divNotificacaoObjetoCardBodyRow2DivCol3Img.src = '/storage/imagens_objetos/' + notif['objeto_perdido']['imagem'];
                        divNotificacaoObjetoCardBodyRow2DivCol3Img.onerror = function () {
                            divNotificacaoObjetoCardBodyRow2DivCol3Img.src = '/storage/imagens_objetos/default_objeto.jpg';
                        }
                        divNotificacaoObjetoCardBodyRow2DivCol3Caption = document.createElement("figcaption");
                        divNotificacaoObjetoCardBodyRow2DivCol3Caption.className = "figure-caption";
                        divNotificacaoObjetoCardBodyRow2DivCol3Caption.innerHTML = "O objeto perdido";
                    }
                    divNotificacaoObjetoCardBodyRow2DivCol3Figure.appendChild(divNotificacaoObjetoCardBodyRow2DivCol3Img);
                    divNotificacaoObjetoCardBodyRow2DivCol3Figure.appendChild(divNotificacaoObjetoCardBodyRow2DivCol3Caption);
                    divNotificacaoObjetoCardBodyRow2DivCol3.appendChild(divNotificacaoObjetoCardBodyRow2DivCol3Figure);

                    divNotificacaoObjetoCardBodyRow2Div.appendChild(divNotificacaoObjetoCardBodyRow2DivCol3);


                    divNotificacaoObjetoCardBodyRow.appendChild(divNotificacaoObjetoCardBodyRow2Div);

                    let divNotificacaoObjetoCardBodyRow3Div = document.createElement("div");
                    divNotificacaoObjetoCardBodyRow3Div.className = "col-md-12 col-lg-12 col-xl-12 d-flex justify-content-center align-items-center";

                    let divNotificacaoObjetoCardBodyRow3DivFlex = document.createElement("div");
                    divNotificacaoObjetoCardBodyRow3DivFlex.className = "d-flex";

                    let divNotificacaoObjetoCardBodyRow3DivFlexB1 = document.createElement("button");
                    divNotificacaoObjetoCardBodyRow3DivFlexB1.className = "btn btn-primary btn-sm me-2";
                    divNotificacaoObjetoCardBodyRow3DivFlexB1.type = "button";
                    divNotificacaoObjetoCardBodyRow3DivFlexB1.innerHTML = "Os objetos correspondem";
                    divNotificacaoObjetoCardBodyRow3DivFlexB1.href = "#";

                    let divNotificacaoObjetoCardBodyRow3DivFlexB2 = document.createElement("button");
                    divNotificacaoObjetoCardBodyRow3DivFlexB2.className = "btn btn-outline-primary btn-sm me-2";
                    divNotificacaoObjetoCardBodyRow3DivFlexB2.type = "button";
                    divNotificacaoObjetoCardBodyRow3DivFlexB2.innerHTML = "Os objetos não correspondem";
                    divNotificacaoObjetoCardBodyRow3DivFlexB2.href = "#";

                    divNotificacaoObjetoCardBodyRow3DivFlex.appendChild(divNotificacaoObjetoCardBodyRow3DivFlexB1);
                    divNotificacaoObjetoCardBodyRow3DivFlex.appendChild(divNotificacaoObjetoCardBodyRow3DivFlexB2);

                    divNotificacaoObjetoCardBodyRow3Div.appendChild(divNotificacaoObjetoCardBodyRow3DivFlex);
                    divNotificacaoObjetoCardBodyRow.appendChild(divNotificacaoObjetoCardBodyRow3Div);
                    divNotificacaoObjetoCardBody.appendChild(divNotificacaoObjetoCardBodyRow);
                    divNotificacaoObjetoCard.appendChild(divNotificacaoObjetoCardBody);
                    divNotificacaoObjeto.appendChild(divNotificacaoObjetoCard);
                    divGlobal.appendChild(divNotificacaoObjeto);
                }


            });

        }

    }
    pedidoNotificacao.open("GET", "/api/utilizador/dados/" + idUtilizador + "/receberNotificacao", true);
    pedidoNotificacao.send();
}


function obterIdECarregarLeilao() {
    let pedidoidUtilizador = new XMLHttpRequest();
    pedidoidUtilizador.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            idUtilizador = JSON.parse(pedidoidUtilizador.responseText);
            console.log(idUtilizador);
            carregarNotifs();
        }

    }
    pedidoidUtilizador.open("GET", "/api/convertUserEmailUtilizadorId", true);
    pedidoidUtilizador.send();
}


window.addEventListener('DOMContentLoaded', function () {
    obterIdECarregarLeilao();
});
