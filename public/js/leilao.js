var idRegular;
let countdownDate

console.log(window.location.href.split('/')[4]);




function carregarLeilao() {
    pedidoLeilao = new XMLHttpRequest();
    pedidoLeilao.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            leilao = JSON.parse(pedidoLeilao.responseText)['leilao'];
            console.log(leilao);
            console.log(leilao.data_fim);
            startCountdown(leilao['data_fim']);












        }

    }
    pedidoLeilao.open("GET", "/api/regular/licitante/" + idRegular + "/verHistoricoLeilao/" + window.location.href.split('/')[4], true);
    pedidoLeilao.send();
}




function startCountdown(time) {
    // Get the date and time
    console.log(time);
    let dateString = new Date(time + "T00:00:00Z");
    countdownDate = dateString.getTime();

    // Update the countdown every 1 second
    let x = setInterval(function () {
        // Get the current date and time
        let now = new Date().getTime();

        // Calculate the distance between now and the countdown date
        let distance = countdownDate - now;

        // Calculate days, hours, minutes and seconds
        let days = Math.floor(distance / (1000 * 60 * 60 * 24));
        let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        let seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result
        document.getElementById("days").innerHTML = days.
            toString().padStart(2, '0');
        document.getElementById("hours").innerHTML = hours.
            toString().padStart(2, '0');
        document.getElementById("minutes").innerHTML = minutes.
            toString().padStart(2, '0');
        document.getElementById("seconds").innerHTML = seconds.
            toString().padStart(2, '0');

    }, 1000);
}



function obterIdECarregarLeilao() {
    pedidoIdRegular = new XMLHttpRequest();
    pedidoIdRegular.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            idRegular = JSON.parse(pedidoIdRegular.responseText);
            console.log(idRegular);
            carregarLeilao();
        }

    }
    pedidoIdRegular.open("GET", "/api/convertUserEmailRegularId", true);
    pedidoIdRegular.send();
}


window.addEventListener('DOMContentLoaded', function () {
    obterIdECarregarLeilao();
});
