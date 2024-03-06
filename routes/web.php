<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ProdutosController;
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
    return view('index');
});

//localhost:8989/produtos
Route::prefix('produtos')->group(function(){
    Route::get('/', [ProdutosController::class, 'index'])->name('produto.index');

    Route::get('/adicionarProduto', [ProdutosController::class, 'adicionarProduto'])->name('adicionar.produto');
    Route::post('/adicionarProduto', [ProdutosController::class, 'adicionarProduto'])->name('adicionar.produto');

    Route::get('/atualizarProduto/{id}', [ProdutosController::class, 'atualizarProduto'])->name('atualizar.produto');
    Route::put('/atualizarProduto/{id}', [ProdutosController::class, 'atualizarProduto'])->name('atualizar.produto');

    Route::delete('/delete', [ProdutosController::class, 'delete'])->name('produto.delete');
});

Route::prefix('clientes')->group(function(){
    Route::get('/', [ClientesController::class, 'index'])->name('cliente.index');

    Route::get('/adicionarCliente', [ClientesController::class, 'adicionarCliente'])->name('adicionar.cliente');
    Route::post('/adicionarCliente', [ClientesController::class, 'adicionarCliente'])->name('adicionar.cliente');

    Route::get('/atualizarCliente/{id}', [ClientesController::class, 'atualizarCliente'])->name('atualizar.cliente');
    Route::put('/atualizarCliente/{id}', [ClientesController::class, 'atualizarCliente'])->name('atualizar.cliente');

    Route::delete('/delete', [ClientesController::class, 'delete'])->name('cliente.delete');
});