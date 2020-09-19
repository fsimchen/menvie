<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PessoasController;

Route::get('/', [PessoasController::class, 'index'])->name('pessoas.index');
Route::get('create', [PessoasController::class, 'create'])->name('pessoas.create');
Route::post('/', [PessoasController::class, 'store'])->name('pessoas.store');
Route::get('{pessoa}/edit', [PessoasController::class, 'edit'])->name('pessoas.edit');
Route::put('{pessoa}', [PessoasController::class, 'update'])->name('pessoas.update');
Route::delete('{pessoa}/excluir', [PessoasController::class, 'destroy'])->name('pessoas.destroy');
