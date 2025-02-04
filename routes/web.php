<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('inicio');
})->name('inicio')->middleware('auth');

Route::get('juegos',[GameController::class, 'index'])->name('listado_juegos')->middleware('auth');

Route::get('juegos/{id}', [GameController::class, 'show'])->name('detalles_juego')->middleware('auth');

Route::post('juego/comprar', [GameController::class, 'store'])->name('comprar_juego');

Route::get('carro', function () {
    return view('carro.index');
})->name('listado_carro')->middleware('auth');

Route::get('usuarios',[User::class, 'index'])->name('listado_usuarios')->middleware('auth','roles');


Route::get('login', [LoginController::class, 'loginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('usuarios/eliminar/{id}', [User::class, 'destroy'])->name('eliminar_usuario')->middleware('auth','roles');
