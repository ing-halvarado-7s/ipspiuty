<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Afiliado;
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
    return view('auth.login');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dash', function () {

    if(Auth::user()->hasRole('Administrador')){
        return view('dash.index');
    }else{
        $afil = Afiliado::where('user_id', Auth::id())->get();

        if ($afil->isEmpty()) {
            return view('afiliados.crearIndividual');
        }else{
            $afiliado = $afil[0];
            return view('afiliados.editar', compact('afiliado'));
        }
    }
})->name('dash');

Route::group(['middleware' =>['auth']],function () {
    /* Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class); */
    Route::resource('afiliado', AfiliadoController::class);
    Route::get('individual', [AfiliadoController::class, 'createIndividual'])->name('afiliado.createIndividual');

    Route::resource('beneficiario', BeneficiarioController::class);
    Route::get('beneficiario/indexBeneficiario/{afiliado_id}', [BeneficiarioController::class, 'indexBeneficiario'])->name('beneficiario.indexBeneficiario');
    Route::get('beneficiario/createBeneficiario/{afiliado_id}', [BeneficiarioController::class, 'createBeneficiario'])->name('beneficiario.createBeneficiario');

});
