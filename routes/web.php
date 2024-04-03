<?php

use App\Http\Controllers\Auth0Controller;
use App\Http\Controllers\UtilizadoresController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilizadoresRegularController;

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
Route::get('/utilizador/conta/{utilizadorId}/receberNotificacao', [UtilizadoresController::class, 'receberNotificacao']);


#UTILIZADORES REGULARES
Route::put('/regular', [UtilizadoresRegularController::class,'atualizarUtilizadorRegular']);
Route::post('/regular', [UtilizadoresRegularController::class,'adicionaNovoUtilizadorRegular']);
Route::get('/regular/{regularId}', [UtilizadoresRegularController::class,'obterUtilizadorRegularComId']);
Route::post('/regular/{regularId}', [UtilizadoresRegularController::class,'atualizarUtilizadorRegularComId']);
Route::delete('/regular/{regularId}', [UtilizadoresRegularController::class,'apagarUtilizadorRegularComId']);

