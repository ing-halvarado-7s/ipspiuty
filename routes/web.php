<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
/* use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController; */
use App\Http\Controllers\AfiliadoController;
use App\Http\Controllers\BeneficiarioController;

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
    return view('welcome');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dash', function () {
    return view('dash.index');
})->name('dash');

Route::group(['middleware' =>['auth']],function () {
    /* Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class); */
    Route::resource('afiliado', AfiliadoController::class);
    Route::get('individual', [AfiliadoController::class, 'createIndividual'])->name('afiliado.createIndividual');

    Route::resource('beneficiario', BeneficiarioController::class);
});
