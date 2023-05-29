<?php

use App\Http\Controllers\ProfileController;
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
    return view('site.home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/adocoesPendentes', [App/Http/Controllers/controladorAdocao::class, 'listarAdocoesPendentes'])->name('adocoes');
Route::get('/adocoes/novo', [App/Http/Controllers/controladorAdocao::class, 'create'])->name('novaAdocao');
Route::get('/adocoes', [App/Http/Controllers/controladorAdocao::class, 'store'])->name('gravarNovaAdocao');
Route::get('adocoes/apagar/{id}', [App/Http/Controllers/controladorAdocao::class, 'destroy'])->name('deletarAdocao');
Route::get('adocoes/editar/{id}', [App/Http/Controllers/controladorAdocao::class, 'edit'])->name('editarAdocoes');
Route::get('adocoes/{id}', [App/Http/Controllers/controladorAdocao::class, 'update'])->name('atualizaAdocao');
Route::get('adocoes/pesquisa', [App/Http/Controllers/controladorAdocao::class, 'pesquisarAdocao'])->name('pesquisaAdocao');

