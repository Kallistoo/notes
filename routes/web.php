<?php

use App\Http\Controllers\CategoryNoteController;
use App\Http\Controllers\NoteController;
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

Route::get('/', [NoteController::class, 'index'])->name('notes.index');

Route::name('notes.')->prefix('notes')->group(function () {
    Route::get('/', [NoteController::class, 'index'])->name('index');
    Route::get('/create', [NoteController::class, 'create'])->name('create');
    Route::post('/create', [NoteController::class, 'store'])->name('store');
    Route::get('/edit/{note}', [NoteController::class, 'edit'])->name('edit');
    Route::patch('/edit/{note}', [NoteController::class, 'update'])->name('update');
    Route::delete('/delete/{note}', [NoteController::class, 'delete'])->name('delete');

    Route::name('categories.')->prefix('categories')->group(function () {
        Route::get('/', [CategoryNoteController::class, 'index'])->name('index');
        Route::get('/{category}', [CategoryNoteController::class, 'notes'])->name('notes');
        Route::get('/create', [CategoryNoteController::class, 'create'])->name('create');
        Route::post('/create', [CategoryNoteController::class, 'store'])->name('store');
        Route::get('/edit/{category}', [CategoryNoteController::class, 'edit'])->name('edit');
        Route::patch('/edit/{category}', [CategoryNoteController::class, 'update'])->name('update');
        Route::delete('/delete/{category}', [CategoryNoteController::class, 'delete'])->name('delete');
    });
});
