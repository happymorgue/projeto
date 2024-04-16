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
    
</head>
<body>
    @include('partials.headerP')

    @yield('content')

    @include('partials.footer')

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script type="text/javascript" src="{{ asset('bootstrap-5.0.2-dist/js/bootstrap.js') }}"></script>

</body>
</html>