<?php

use App\Http\Controllers\Clientes;
use App\Http\Controllers\Produtos;
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
    return view('welcome');
});

Route::get('clientes/cadastro',function () {
    return view('cliente.cadastro');
});
Route::get('clientes',[Clientes::class, 'index'])->name('clientes');
Route::get('clientes/{id}',[Clientes::class, 'show']);
Route::post('clientes/save',[Clientes::class, 'store']);
Route::post('clientes/edit/{id}',[Clientes::class, 'update']);
Route::get('clientes/remove/{id}',[Clientes::class, 'destroy']);



Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Route::prefix('produtos')->group(function () {
    Route::get('produtos',[Produtos::class, 'index'])->name('produtos');
    Route::get('produtos/{id}',[Produtos::class, 'show']);
    Route::get('produtos/cadastro',function(){return view('produto-cadastro');});
    Route::post('produtos/save',[Produtos::class, 'store']);
    Route::post('produtos/edit/{id}',[Produtos::class, 'update']);
    // });
});


require __DIR__.'/auth.php';
