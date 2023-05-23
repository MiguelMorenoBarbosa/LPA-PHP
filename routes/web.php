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

/*Route::get('/tarefasPendentes', [App/Http/Controllers/controladorTarefa::class, 'listarTarefasPendentes'])->name('tarefasPendentes');
Route::get('/tarefasConcluidas', [App/Http/Controllers/controladorTarefa::class, 'listarTarefasConcluidas'])->name('tarefasConcluidas');
Route::get('/tarefas/novo', [App/Http/Controllers/controladorTarefa::class, 'create'])->name('novaTarefa');
Route::get('/tarefas', [App/Http/Controllers/controladorTarefa::class, 'store'])->name('gravarNovaTarefa');
Route::get('tarefas/apagar/{id}', [App/Http/Controllers/controladorTarefa::class, 'destroy'])->name('deletarTarefa');
Route::get('tarefas/editar/{id}', [App/Http/Controllers/controladorTarefa::class, 'edit'])->name('editaTarefa');
Route::get('tarefas/{id}', [App/Http/Controllers/controladorTarefa::class, 'update'])->name('atualizaTarefa');
Route::get('tarefas/pesquisa', [App/Http/Controllers/controladorTarefa::class, 'pesquisarTarefa'])->name('pesquisarTarefa');
Route::get('tarefas/procurarTarefa', [App/Http/Controllers/controladorTarefa::class, 'procurarTarefa'])->name('procurarTarefa');
*/