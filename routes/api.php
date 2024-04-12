<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth0Controller;
use App\Http\Controllers\AvaliadorController;
use App\Http\Controllers\NaoUtilizadoresController;
use App\Http\Controllers\UtilizadoresController;
use App\Http\Controllers\UtilizadoresRegularController;
use App\Http\Controllers\UtilizadoresDonoController;
use App\Http\Controllers\UtilizadoresLicitanteController;
use App\Http\Controllers\UtilizadoresPoliciaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
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
Route::put('/policia', [UtilizadoresPoliciaController::class,'UpdatePoliciaPUT']);
Route::get('/policia/{policiaId}', [UtilizadoresPoliciaController::class,'getPolicia']);
Route::post('/policia/{policiaId}', [UtilizadoresPoliciaController::class,'UpdatePoliciaPOST']);
Route::delete('/policia/{policiaId}', [UtilizadoresPoliciaController::class,'DeletePolicia']);
Route::put('/policia/{policiaId}/postoPolicia', [UtilizadoresPoliciaController::class,'UpdatePostoPoliciaPUT']);
Route::post('/policia/{policiaId}/postoPolicia', [UtilizadoresPoliciaController::class,'CreatePostoPoliciaPOST']);
Route::get('/policia/{policiaId}/postoPolicia/{postoId}', [UtilizadoresPoliciaController::class,'getPoliciaPosto']);
Route::post('/policia/{policiaId}/postoPolicia/{postoId}', [UtilizadoresPoliciaController::class,'UpdatePostoPoliciaPOST']);
Route::delete('/policia/{policiaId}/postoPolicia/{postoId}', [UtilizadoresPoliciaController::class,'DeletePostoPolicia']);
Route::get('/policia/{policiaId}/verHistoricoObjetosEncontrados', [UtilizadoresPoliciaController::class,'verHistoricoObjetosEncontrados']);
Route::get('/policia/{policiaId}/verHistoricoObjetosEntregues', [UtilizadoresPoliciaController::class,'verHistoricoObjetosEntregues']);
Route::get('/policia/{policiaId}/verObjetosPerdidos', [UtilizadoresPoliciaController::class,'verObjetosPerdidos']);

Route::get('/policia/{policiaId}/registarPossivelDono/{foundObjectId}/{regularId}', [UtilizadoresPoliciaController::class,'registarPossivelDono']);
Route::get('/policia/{policiaId}/registarObjetoCorrespondente/{foundObjectId}/{lostObjectId}', [UtilizadoresPoliciaController::class,'registarObjetoCorrespondente']);
Route::get('/policia/{policiaId}/registarEntrega/{foundObjectId}', [UtilizadoresPoliciaController::class,'registarEntrega']);

#UTILIZADORES LICITANTE
Route::get('/regular/licitante/{regularId}/verHistoricoLicitacao', [UtilizadoresLicitanteController::class,'verHistoricoLicitacao']);
Route::get('/regular/licitante/{regularId}/verLeiloes', [UtilizadoresLicitanteController::class,'verLeiloes']);
Route::get('/regular/licitante/{regularId}/verHistoricoLeilao/{leilaoId}', [UtilizadoresLicitanteController::class,'verHistoricoLeilao']);
Route::get('/regular/licitante/{regularId}/verHistoricoLeilaoGanho', [UtilizadoresLicitanteController::class,'verHistoricoLeilaoGanho']);
Route::post('/regular/licitante/{regularId}/licitar/{leilaoId}', [UtilizadoresLicitanteController::class,'licitar']);
Route::get('/regular/licitante/{regularId}/pagamento/{leilaoId}', [UtilizadoresLicitanteController::class,'pagamento']);
Route::get('/regular/licitante/{regularId}/subscreverLeilao/{leilaoId}', [UtilizadoresLicitanteController::class,'subscreverLeilao']);
Route::get('/regular/licitante/{regularId}/anularSubscreverLeilao/{leilaoId}', [UtilizadoresLicitanteController::class,'anularSubscreverLeilao']);

#AVALIADOR
Route::put('avaliador/{avaliadorId}/categoria', [AvaliadorController::class, 'updateCategoriaPUT']);
Route::post('avaliador/{avaliadorId}/categoria', [AvaliadorController::class, 'createCategoria']);
Route::get('avaliador/{avaliadorId}/categoria/{categoriaId}', [AvaliadorController::class, 'getCategoria']);
Route::post('avaliador/{avaliadorId}/categoria/{categoriaId}', [AvaliadorController::class, 'updateCategoriaPOST']);
Route::delete('avaliador/{avaliadorId}/categoria/{categoriaId}', [AvaliadorController::class, 'deleteCategoria']);

Route::put('avaliador/{avaliadorId}/categoria/{categoriaId}/atributo', [AvaliadorController::class, 'updateAtributoPUT']);
Route::post('avaliador/{avaliadorId}/categoria/{categoriaId}/atributo', [AvaliadorController::class, 'createAtributo']);
Route::get('avaliador/{avaliadorId}/categoria/{categoriaId}/atributo/{atributoId}', [AvaliadorController::class, 'getAtributo']);
Route::post('avaliador/{avaliadorId}/categoria/{categoriaId}/atributo/{atributoId}', [AvaliadorController::class, 'updateAtributoPOST']);
Route::delete('avaliador/{avaliadorId}/categoria/{categoriaId}/atributo/{atributoId}', [AvaliadorController::class, 'deleteAtributo']);

Route::post('avaliador/{avaliadorId}/avaliarObjeto/{objectId}', [AvaliadorController::class, 'avaliarObjeto']);
Route::post('avaliador/{avaliadorId}/criarLeilao/{objectId}', [AvaliadorController::class, 'criarLeilao']);
Route::get('avaliador/{avaliadorId}/iniciarLeilao/{leilaoId}', [AvaliadorController::class, 'iniciarLeilao']);
Route::get('avaliador/{avaliadorId}/terminarLeilao/{objectId}', [AvaliadorController::class, 'terminarLeilao']);

Route::get('avaliador/{avaliadorId}/utilizador/conta/{utilizadorId}/desativar', [AvaliadorController::class, 'desativarUtilizador']);
Route::get('avaliador/{avaliadorId}/utilizador/conta/{utilizadorId}/ativar', [AvaliadorController::class, 'ativarUtilizador']);



#NAO UTILIZADORES
Route::put('/nUtilizador', [NaoUtilizadoresController::class,'atualizarNaoUtilizador']);
Route::post('/nUtilizador', [NaoUtilizadoresController::class,'adicionaNovoNaoUtilizador']);
Route::get('/nUtilizador/{nUtilizadorId}', [NaoUtilizadoresController::class,'obterNaoUtilizadorComId']);
Route::post('/nUtilizador/{nUtilizadorId}', [NaoUtilizadoresController::class,'atualizarNaoUtilizadorComId']);
Route::delete('/nUtilizador/{nUtilizadorId}', [NaoUtilizadoresController::class,'apagarNaoUtilizadorComId']);




#TRATAMENTOS AUXILIARES
#OBTER ID REGULAR ATRAVES DO EMAIL DE UTILIZADOR
Route::get('/convertUserEmailRegularId', [UtilizadoresRegularController::class,'convertUserEmailRegularId']);
