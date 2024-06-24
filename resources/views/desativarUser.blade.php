<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Bootstrap -->
    <link href="{{ asset('bootstrap-5.0.2-dist/css/bootstrap.css') }}" rel="stylesheet">
    <!-- Your additional CSS -->
    <link href="{{ asset('css/geral.css') }}" rel="stylesheet">

    <link rel="icon" href="{{ asset('lupa.png') }}" type="image/x-icon" >
        <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- MapBox -->
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.css' rel='stylesheet' />

    

    
</head>
<body>

<script>
    console.log("ola");
    Swal.fire({
        title: "Conta desativada!",
        text: "Esta conta apresenta-se desativada",
        icon: "error",
        confirmButtonColor: "#007bff", // Bootstrap's btn-primary color
        confirmButtonText: "OK",
    }).then(() => {
        window.location.href="/homeGeral";
    });
</script>

</body>


</html>
