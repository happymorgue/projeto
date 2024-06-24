function desativarUser(){
    Swal.fire({
        title: "Conta desativada!",
        text: "Esta conta apresenta-se desativada",
        icon: "error",
        confirmButtonColor: "#007bff", // Bootstrap's btn-primary color
        confirmButtonText: "OK",
    }).then(() => {
        window.location.href="/homeGeral";
    });
}

window.addEventListener('DOMContentLoaded', function () {
    desativarUser();
});