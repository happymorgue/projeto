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
