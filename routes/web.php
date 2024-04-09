<?php

use App\Http\Controllers\Auth0Controller;
use Illuminate\Support\Facades\Route;

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

#Rota->Buscar_Caminho->Onde->Metodo_que_executa_no_caminho
Route::get('/login', [Auth0Controller::class, 'login']);
Route::get('/callback', [Auth0Controller::class, 'callback']);
Route::get('/register_dono', [Auth0Controller::class, 'register_dono']);
Route::get('/register_policia', [Auth0Controller::class, 'register_policia']);
Route::get('/register_licitante', [Auth0Controller::class, 'register_licitante']);
Route::get('/logout', [Auth0Controller::class, 'logout']);

Route::get('/dono', function () {
    return view('dono');
});

Route::get('/licitante', function () {
    return view('licitante');
});

Route::get('/policia', function () {
    return view('policia');
});