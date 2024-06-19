<?php

use App\Http\Controllers\Auth0Controller;
use App\Http\Controllers\NaoUtilizadoresController;
use App\Http\Controllers\UtilizadoresController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilizadoresRegularController;
use App\Http\Controllers\UtilizadoresDonoController;
use App\Http\Controllers\UtilizadoresLicitanteController;
use App\Http\Controllers\UtilizadoresPoliciaController;
use App\Http\Controllers\ObjetosAchadosController;
use App\Http\Controllers\PostoController;

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

#WEBSITE--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

Route::get('/', function () {
    return view('home');
});
Route::get('/admin', function () {
    return view('administrador');
});
Route::get('/adminLeiloes', function () {
    return view('adminLeiloes');
});
Route::get('/adminCategoriasAtributos', function () {
    return view('adminCatAtri');
});
Route::get('/adminStats', function () {
    return view('AdminEstatisticas');
});
Route::get('/ajuda', function () {
    return view('help');
});
Route::get('/editObjAchados', function () {
    return view('editAchados');
});
Route::get('/editObjPerdidos', function () {
    return view('editPerdidos');
});
Route::get('/editPerfilRegular', function () {
    return view('editPerfil');
});
Route::get('/editPerfilPolicia', function () {
    return view('editPerfilPolicia');
});
Route::get('/homeGeral', function () {
    return view('home');
});
Route::get('/homePolicia', function () {
    return view('homePolicia');
});
Route::get('/verObjPerdidos', function () {
    return view('meusObjsPerdidos');
});
Route::get('/verObj/{objId}', function () {
    return view('verObjs');
});

Route::get('/verObjPolicia', function () {
    return view('verObjsPolicia');
});
Route::get('/buscaObjAchados', function () {
    return view('objAchados');
});
Route::get('/verPoliciaObjAchados', function () {
    return view('objAchadosPolicia');
});
Route::get('/buscaObjPerdidos', function () {
    return view('objPerdidosPolicia');
});
Route::get('/perfilRegular', function () {
    return view('perfil');
});
Route::get('/perfilPolicia', function () {
    return view('perfilPolicia');
});
Route::get('/registarObjAchado', function () {
    return view('registoObjAchado');
});
Route::get('/registarObjPerdido', function () {
    return view('registoObjPerdido');
});

Route::get('/teste', function () {
    return view('teste');
});
Route::get('/postosPolicia', function () {
    return view('postosPolicia');
});

Route::get('/objAchadosPolicia', [ObjetosAchadosController::class, 'index']);

Route::get('/help', function () {
    return view('help');
});

Route::get('/buscaObjPerdido', function () {
    return view('objPerdidos');
});

Route::get('/leiloes', function () {
    return view('leiloes');
});

Route::get('/leilao/{leilaoId}', function () {
    return view('leilao');
});

Route::get('/notificacoes', function () {
    return view('notificacoes');
});

Route::get('/meusleiloes', function () {
    return view('meusleiloes');
});

Route::get('/leiloesLoggedOut', function () {
    return view('leiloesSLogin');
});



#APIS--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

#CRIACAO CONTAS
#Rota->Buscar_Caminho->Onde->Metodo_que_executa_no_caminho
Route::get('/login', [Auth0Controller::class, 'login']);
Route::get('/callback', [Auth0Controller::class, 'callback']);
Route::get('/register_dono', [Auth0Controller::class, 'register_dono']);
Route::get('/register_policia', [Auth0Controller::class, 'register_policia']);
Route::get('/logout', [Auth0Controller::class, 'logout']);