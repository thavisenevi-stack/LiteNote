<?php
use App\Http\Controllers\NotebookController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrashedController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('note', NoteController::class)
    ->middleware('auth');

Route::get('/note', [NoteController::class, 'index'])
    ->name('note.index');

Route::get('/notebook/index', [NotebookController::class, 'index'])
    ->name('notebook.index');

Route::post('notes/store', [NoteController::class, 'store'])
    ->name('notes.store');

Route::resource('/notebooks', NotebookController::class)
    ->middleware('auth');

Route::post('/notebooks/store', [NotebookController::class, 'store'])
    ->name('notebooks.store');

Route::get('/trashed', [TrashedController::class, 'index'])
    ->name('trashed.index');

Route::get('/trashed/{note}', [TrashedController::class, 'show'])
    ->withTrashed()->middleware('auth')->name('trashed.show');

Route::put('/trashed/{note}', [TrashedController::class, 'update'])
    ->withTrashed()->middleware('auth')->name('trashed.update');

Route::delete('/trashed/{note}', [TrashedController::class, 'destroy'])
    ->withTrashed()->middleware('auth')->name('trashed.destroy');