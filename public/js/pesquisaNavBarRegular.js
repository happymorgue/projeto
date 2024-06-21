function pesquisaNavBar(event) {
    event.preventDefault();
    // Retrieve the value from an input field
    var searchTerm = document.getElementById('searchInputS').value;
    console.log(searchTerm);
    if (searchTerm == "") {
        var searchTerm = document.getElementById('searchInput').value;
        console.log(searchTerm);
    }
    // Store the value in localStorage
    localStorage.setItem('searchTerm', searchTerm);

    window.location.href = '/buscaObjAchados';
}