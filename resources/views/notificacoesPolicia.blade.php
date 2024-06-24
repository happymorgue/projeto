<!-- <!DOCTYPE html> -->
@extends('layouts.layoutP')

@section('title', 'Cogitavi - Notificações')

@section('content') 

<section class="bgColorP">
  <div class="container py-5 col-sm-12 col-md-12 col-lg-8 col-xl-6">
      <div id="aviso" class="col-md-12 col-xl-10">
        <h3 class="mb-3">Notificações</h3>
      </div>
  </div>

      <div id="notificacoes" class="row justify-content-center">
      </div>

</section>
@endsection

<link href="{{ asset('css/notificacoes.css') }}" rel="stylesheet">
<script src="{{ asset('js/showNotificacoes.js') }}" type="text/javascript"></script>








