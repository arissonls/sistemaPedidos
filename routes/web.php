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

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::prefix('clientes')->group(function () {
        Route::get('/',[Clientes::class, 'index'])->name('clientes');
        Route::get('/{id}',[Clientes::class, 'show']);
        Route::get('/cadastro',function(){
            return view('cliente/cadastro');
        });
        Route::post('/save',[Clientes::class, 'store']);
        Route::post('/edit',[Clientes::class, 'alteraCadastro']);
    });
    Route::prefix('produtos')->group(function () {
        Route::get('/',[Produtos::class, 'index'])->name('produtos');
        Route::get('/{id}',[Produtos::class, 'show']);
        Route::get('/cadastro',function(){return view('produto/cadastro');});
        Route::post('/save',[Produtos::class, 'store']);
        Route::post('/edit',[Produtos::class, 'alteraCadastro']);
    });
});


require __DIR__.'/auth.php';
