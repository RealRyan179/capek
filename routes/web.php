<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MusicController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [MusicController::class, 'index'])->name('musics.index');
Route::get('/musics/create', [MusicController::class, 'create'])->name('musics.create');
Route::post('/musics', [MusicController::class, 'store'])->name('musics.store');
Route::get('/musics/play/{id}', [MusicController::class, 'play'])->name('musics.play');

require __DIR__.'/auth.php';
