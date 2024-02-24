<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Cadastros;
use App\Livewire\Categorias;
use App\Livewire\Dashboard;
use App\Livewire\EditarProduto;
use App\Livewire\ListaProdutos;
use App\Livewire\Produtos;
use App\Livewire\Vendedor;
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
    //Auth::loginUsingId(1, true);
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'usuario'])->group(function () {

    Route::get('/dashboard', Dashboard::class)->name('dashboard');

});

Route::middleware(['auth', 'vendedor'])->group(function () {

    Route::get('/vendedor', Vendedor::class)->name('vendedor');
    Route::get('/cadastros/categorias', Categorias::class)->name('cadastros.categorias');
    Route::get('/cadastros/produtos', Produtos::class)->name('cadastros.produtos');
    Route::get('/cadastros', Cadastros::class)->name('cadastros');
    Route::get('/lista-produtos', ListaProdutos::class)->name('listaprodutos');
    Route::get('/editar-produto/{produto}', EditarProduto::class)->name('editarproduto');

});

require __DIR__.'/auth.php';
