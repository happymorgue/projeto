<?php

use App\Http\Controllers\Auth0Controller;
use App\Http\Controllers\NaoUtilizadoresController;
use App\Http\Controllers\UtilizadoresController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilizadoresRegularController;
use App\Http\Controllers\UtilizadoresDonoController;
use App\Http\Controllers\UtilizadoresLicitanteController;
use App\Http\Controllers\UtilizadoresPoliciaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/homeGeral', function () {
    return view('home');
});

#CRIACAO CONTAS
#Rota->Buscar_Caminho->Onde->Metodo_que_executa_no_caminho
Route::get('/login', [Auth0Controller::class, 'login']);
Route::get('/callback', [Auth0Controller::class, 'callback']);
Route::get('/register_dono', [Auth0Controller::class, 'register_dono']);
Route::get('/register_policia', [Auth0Controller::class, 'register_policia']);
Route::get('/logout', [Auth0Controller::class, 'logout']);
Route::get('/dono', function () {
    return view('dono');
});

Route::get('/policia', function () {
    return view('policia');
});

#UTILIZADORES GERAIS
Route::get('/utilizador/conta/{utilizadorId}/desativar', [UtilizadoresController::class, 'desativarUtilizador']);
Route::get('/utilizador/dados/{utilizadorId}/receberNotificacao', [UtilizadoresController::class, 'receberNotificacao']);
Route::get('/utilizador/objetos/buscarObjetosPorCategoria/{categoriaId}', [UtilizadoresController::class, 'buscarObjetosPorCategoria']);
Route::post('/utilizador/objetos/buscarObjetosPorDescricao', [UtilizadoresController::class, 'buscarObjetosPorDescricao']);


#UTILIZADORES REGULARES
Route::put('/regular', [UtilizadoresRegularController::class,'atualizarUtilizadorRegular']);
Route::post('/regular', [UtilizadoresRegularController::class,'adicionaNovoUtilizadorRegular']);
Route::get('/regular/{regularId}', [UtilizadoresRegularController::class,'obterUtilizadorRegularComId']);
Route::post('/regular/{regularId}', [UtilizadoresRegularController::class,'atualizarUtilizadorRegularComId']);
Route::delete('/regular/{regularId}', [UtilizadoresRegularController::class,'apagarUtilizadorRegularComId']);


#UTILIZADORES DONO
Route::get('/regular/dono/{regularId}/verHistoricoObjetosPerdidosEncontrados', [UtilizadoresDonoController::class,'verHistoricoObjetosPerdidosEncontrados']);
Route::get('/regular/dono/{regularId}/verHistoricoObjetosPerdidos', [UtilizadoresDonoController::class,'verHistoricoObjetosPerdidos']);
Route::get('/regular/dono/{regularId}/verObjetosAchados', [UtilizadoresDonoController::class,'verObjetosAchados']);
Route::post('/regular/dono/{regularId}/registarObjetoPerdido', [UtilizadoresDonoController::class,'registarObjetoPerdido']);
Route::post('/regular/dono/{regularId}/atualizarObjetoPerdido/{objetoPerdidoId}', [UtilizadoresDonoController::class,'atualizarObjetoPerdido']);
Route::delete('/regular/dono/{regularId}/removerObjetoPerdido/{objetoPerdidoId}', [UtilizadoresDonoController::class,'removerObjetoPerdido']);
Route::get('/regular/dono/{regularId}/encontrarObjetoPorCategoria/{objetoPerdidoId}', [UtilizadoresDonoController::class,'encontrarObjetoPorCategoria']);
Route::get('/regular/dono/{regularId}/encontrarObjetoPorDescricao/{objetoPerdidoId}', [UtilizadoresDonoController::class,'encontrarObjetoPorDescricao']);


#UTILIZADORES POLICIA
Route::get('/policia/{policiaId}/verHistoricoObjetosEncontrados', [UtilizadoresPoliciaController::class,'verHistoricoObjetosEncontrados']);
Route::get('/policia/{policiaId}/verHistoricoObjetosEntregues', [UtilizadoresPoliciaController::class,'verHistoricoObjetosEntregues']);
Route::get('/policia/{policiaId}/verObjetosPerdidos', [UtilizadoresPoliciaController::class,'verObjetosPerdidos']);

Route::get('/policia/{policiaId}/registarPossivelDono/{foundObjectId}/{regularId}', [UtilizadoresPoliciaController::class,'registarPossivelDono']);
Route::get('/policia/{policiaId}/registarObjetoCorrespondente/{foundObjectId}/{lostObjectId}', [UtilizadoresPoliciaController::class,'registarObjetoCorrespondente']);
Route::get('/policia/{policiaId}/registarEntrega/{foundObjectId}', [UtilizadoresPoliciaController::class,'registarEntrega']);

#UTILIZADORES LICITANTE
Route::get('/regular/licitante/{regularId}/subscreverLeilao/{leilaoId}', [UtilizadoresLicitanteController::class,'subscreverLeilao']);
Route::get('/regular/licitante/{regularId}/anularSubscreverLeilao/{leilaoId}', [UtilizadoresLicitanteController::class,'subscreverLeilao']);



#NAO UTILIZADORES
Route::put('/nUtilizador', [NaoUtilizadoresController::class,'atualizarNaoUtilizador']);
Route::post('/nUtilizador', [NaoUtilizadoresController::class,'adicionaNovoNaoUtilizador']);
Route::get('/nUtilizador/{nUtilizadorId}', [NaoUtilizadoresController::class,'obterNaoUtilizadorComId']);
Route::post('/nUtilizador/{nUtilizadorId}', [NaoUtilizadoresController::class,'atualizarNaoUtilizadorComId']);
Route::delete('/nUtilizador/{nUtilizadorId}', [NaoUtilizadoresController::class,'apagarNaoUtilizadorComId']);