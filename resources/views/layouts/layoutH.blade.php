@if(!isset($_SESSION))
    @php session_start(); @endphp
@endif
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
    <link rel="icon" href="{{ asset('logo_cogitavi_vbegebranco.png') }}" type="image/x-icon" >

    <meta name="csrf-token" content="{{ csrf_token() }}">
    
</head>
<body>
    @include('partials.headerDL')

    @yield('content')

    @include('partials.faq')

    @include('partials.footer')

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>