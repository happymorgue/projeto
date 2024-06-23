<!-- <!DOCTYPE html> -->
@extends('layouts.layoutDL')

@section('title', 'Cogitavi - Editar Objetos Perdidos')

@section('content')

<section class="p-3 p-md-4 p-xl-5 bgColor">
    <div class="container">
      <div class="card border-light-subtle shadow-sm">
        <div class="row g-0">
          <div class="col-12 col-md-6">
            <img class="img-fluid rounded-start w-100 h-100 object-fit-cover"  alt="Imagem de ondas no mar: uma série de ondas suaves e uniformes no meio do oceano" src="{{ asset('img3.jpg') }}">
          </div>
          <div class="col-12 col-md-6">
            <div class="card-body p-3 p-md-4 p-xl-5">
              <div class="row">
                <div class="col-12">
                  <div class="mb-5">
                    <h2 class="h3">Editar o Objeto Perdido</h2>
                  </div>
                </div>
              </div>
              <form id='form' action="#!">
                <div class="row gy-3 gy-md-4 overflow-hidden">
                  <div class="col-12">
                    <label for="descricao" class="form-label">Nome</label>
                    <input type="text" class="form-control" name="descricao" id="descricao">
                  </div>
                  <div class="col-12">
                    <label for="categoria" class="form-label">Categoria</label>
                    <select class="form-control" name="categoria" id="categoria">
                      <option value="">Selecione</option>
                    </select>
                  </div>
                  <div id="atributos">

                  </div>
                  <div class="col-12">
                    <label for="intervaloTempo" class="form-label">Intervalo de Tempo</label>
                    <div class="input-group">
                      <input type="date" class="form-control" name="dataInicio" id="dataInicio">
                      <div class="input-group-prepend input-group-append">
                        <span class="input-group-text">-</span>
                      </div>
                      <input type="date" class="form-control" name="dataFim" id="dataFim">
                    </div>
                    <small class="form-text text-muted">Por favor introduza o intervalo de tempo aproximado em que o objeto foi achado.</small>
                  </div>
                  <div class="col-12">
                    <label for="pais" class="form-label">País</label>
                    <input type="pais" class="form-control" name="pais" id="pais">
                  </div>
                  <div class="col-12">
                    <label for="distrito" class="form-label">Distrito</label>
                    <input type="distrito" class="form-control" name="distrito" id="distrito" value="">
                  </div>
                  <div class="col-12">
                    <label for="cidade" class="form-label">Cidade</label>
                    <input type="cidade" class="form-control" name="cidade" id="cidade" value="">
                  </div>
                  <div class="col-12">
                    <label for="freguesia" class="form-label">Freguesia</label>
                    <input type="freguesia" class="form-control" name="freguesia" id="freguesia" value="" >
                  </div>
                  <div class="col-12">
                    <label for="rua" class="form-label">Rua</label>
                    <input type="rua" class="form-control" name="rua" id="rua" value="">
                  </div>
                  <div class="col-12">
                    <label for="imagem" class="form-label">Imagem do Objeto</label>
                    <div class="input-group">
                        <input type="file" class="form-control" name="imagem" id="imagem" accept="image/*">
                    </div>
                </div>
                  <div class="col-12">
                    <div class="d-grid">
                      <button class="btn bsb-btn-xl btn-primary mb-1" onclick="registoObjeto()" type="submit">Salvar</button>
                    </div>
                    <div class="d-grid">
                      <button class="btn bsb-btn-xl btn-secondary" type="button" onclick="retornar()">Cancelar</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  

  

@endsection
<link href="{{ asset('css/registoObjs.css') }}" rel="stylesheet">
<script src="{{ asset('js/editObjPerdido.js') }}" type="text/javascript"></script>