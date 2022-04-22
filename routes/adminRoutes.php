<?php

use App\Http\Controllers\CalculoSalarioController;
use App\Http\Controllers\EmpleadoController;
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
    return redirect()->route('empleados.index');
});

// Route::name('imprimir')->get('/imprimir-pdf', 'EmpleadoController@imprimir');


Route::resource('empleados', EmpleadoController::class);
Route::get('/imprimir-pdf', [EmpleadoController::class, 'pdf'])->name('imprimir');
Route::post('calcularSalario', [CalculoSalarioController::class, 'salario'])->name('salario');

?>