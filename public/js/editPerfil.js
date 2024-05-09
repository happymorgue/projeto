function getProfile() {
    let pedido = new XMLHttpRequest();
    pedido.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var idRegular = JSON.parse(pedido.responseText);
            let pedido2 = new XMLHttpRequest();
            pedido2.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var responseJson = JSON.parse(pedido2.responseText);
                    console.log(responseJson['nome']);
                    console.log(document.getElementsByName('nome')[0]);
                    if (responseJson['nome'] != null) {
                        document.getElementsByName('nome')[0].value = responseJson['nome'].trim();
                        document.getElementsByName('nome2')[0].value = responseJson['nome'].trim();
                    } else {
                        document.getElementsByName('nome')[0].value = responseJson['nome'];
                    }

                    if (responseJson['nif'] != null) {
                        document.getElementsByName('nif')[0].value = responseJson['nif'].trim();
                    } else {
                        document.getElementsByName('nif')[0].value = responseJson['nif'];
                    }

                    if (responseJson['telemovel'] != null) {
                        document.getElementsByName('telemovel')[0].value = responseJson['telemovel'].trim();
                    } else {
                        document.getElementsByName('telemovel')[0].value = responseJson['telemovel'];
                    }

                    if (responseJson['genero'] != null) {
                        document.getElementsByName('genero')[0].value = responseJson['genero'];
                    }

                    if (responseJson['morada'] != null) {
                        document.getElementsByName('morada')[0].value = responseJson['morada'].trim();
                    } else {
                        document.getElementsByName('morada')[0].value = responseJson['morada'];
                    }

                    /* if (responseJson['data_nascimento'] != null) {
                        document.getElementsByName('data_nascimento')[0].value = responseJson['data_nascimento'].trim();
                    } else {
                        document.getElementsByName('data_nascimento')[0].value = responseJson['data_nascimento'];
                    } */

                    if (responseJson['identificador civil'] != null) {
                        document.getElementsByName('identificador civil')[0].value = responseJson['identificador civil'].trim();
                    } else {
                        document.getElementsByName('identificador civil')[0].value = responseJson['identificador civil'];
                    }
                }
            }
            pedido2.open("GET", "/api/regular/" + idRegular, true)
            pedido2.send();
        }
    }
    pedido.open("GET", "/api/convertUserEmailRegularId", true)
    pedido.send();
}

function guardarMudancas() {

    let dataNascimento = document.getElementById('data_nascimento').innerText;

    let pedido = new XMLHttpRequest();
    pedido.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var idRegular = JSON.parse(pedido.responseText);
            let json = '{"nome":"' + document.getElementsByName("nome")[0].value + '", "nif":"' + document.getElementsByName("nif")[0].value + '", "telemovel":"' + document.getElementsByName("telemovel")[0].value + '", "genero":"' + document.getElementsByName("genero")[0].value + '", "morada":"' + document.getElementsByName("morada")[0].value + '", "data_nascimento":"' + dataNascimento + '", "idcivil":"' + document.getElementsByName("identificador civil")[0].value + '"}';
            let JsonParse = JSON.parse(json);
            let enviarDados = new XMLHttpRequest();
            enviarDados.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    window.location.replace("/perfilRegular");
                }
            }
            console.log(json);
            enviarDados.open("POST", "/api/regular/" + idRegular, true);
            enviarDados.setRequestHeader("Content-Type", "application/json");
            enviarDados.send(JSON.stringify(JsonParse));
        }
    }
    pedido.open("GET", "/api/convertUserEmailRegularId", true)
    pedido.send();

}


document.addEventListener('DOMContentLoaded', function () {
    // Function to format the date as DD/MM/YYYY
    carregarAnos();
    function formatDate(day, month, year) {
        return day.padStart(2, '0') + '/' + month.padStart(2, '0') + '/' + year;
    }

    // Function to get the selected values and update the span with id 'data_nascimento'
    function updateDataNascimento() {
        const day = document.getElementById('day').value;
        const month = document.getElementById('month').value;
        const year = document.getElementById('year').value;

        // Ensure day, month, and year are not empty
        if (day && month && year) {
            // Format the date
            const formattedDate = formatDate(day, month, year);
            // Update the span with id 'data_nascimento'
            document.getElementById('data_nascimento').innerText = formattedDate;
            // Log the formatted date to the console
            console.log("Formatted Date:", formattedDate);
        } else {
            // Display an error message if any field is not selected
            document.getElementById('data_nascimento').innerText = 'Por favor, selecione o dia, mês e ano.';
            console.log("Por favor, selecione o dia, mês e ano.");
        }
    }

    function carregarAnos() {
        const yearSelect = document.getElementById('year');
        const currentYear = new Date().getFullYear();

        // Populate years from 1900 to the current year
        for (let i = currentYear; i >= 1900; i--) {
            const option = document.createElement('option');
            option.value = i;
            option.textContent = i;
            yearSelect.appendChild(option);
        }
    }

    // Function to populate days based on the selected month and year
    function populateDays() {
        const daySelect = document.getElementById('day');
        const month = parseInt(document.getElementById('month').value);
        const year = parseInt(document.getElementById('year').value);
        const daysInMonth = new Date(year, month, 0).getDate();

        // Clear previous options
        daySelect.innerHTML = '<option value="">Dia</option>';

        // Populate days based on the number of days in the month
        for (let i = 1; i <= daysInMonth; i++) {
            const option = document.createElement('option');
            option.value = i;
            option.textContent = i;
            daySelect.appendChild(option);
        }

        // Update the formatted date when the day changes
        updateDataNascimento();
    }

    // Call the function to populate days when the page is loaded
    populateDays();

    // Add event listeners to the month and year dropdowns
    document.getElementById('month').addEventListener('change', populateDays);
    document.getElementById('year').addEventListener('change', populateDays);

    // Add event listener to the day dropdown
    document.getElementById('day').addEventListener('change', updateDataNascimento);
});





window.onload = getProfile();