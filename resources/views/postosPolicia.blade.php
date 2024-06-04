<!-- <!DOCTYPE html> -->
@extends('layouts.layoutP')

@section('title', 'Cogitavi - Postos de Polícia')

@section('content')

@include('partials.editPostoModal')

<section class="bgColor">
    <div class="container">
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-12 col-xl-10 mb-3">
                    <h1 class="mb-2">Postos de Polícia</h1>
                </div>
                <div id="postosPolicia" class="container py-5"></div>

                    <!-- Os postos de polícia serão carregados aqui -->
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

<link href="{{ asset('css/postosPolicia.css') }}" rel="stylesheet">
<script src="{{ asset('js/carregarPostos.js') }}" type="text/javascript"></script>
