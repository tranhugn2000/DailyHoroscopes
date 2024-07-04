<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\HomepageController;
use App\Http\Controllers\Web\PostController;
use App\Http\Controllers\Web\TarotController;
use Illuminate\Support\Facades\Route;

/*------------------------------ Web Routes -------------------------------------------*/

Route::get('/',             [HomepageController::class, 'index'])->name('homepage');
Route::get('/posts',        [PostController::class, 'index'])->name('posts.list');
Route::get('/posts/{slug}', [PostController::class, 'show'])->name('posts.show');
Route::get('/tarot',        [TarotController::class, 'index'])->name('tarot.index');
Route::get('/get-cards',    [TarotController::class, 'getShuffledCards']);
Route::post('/read-cards',  [TarotController::class, 'readSelectedCards'])->name('tarot.read_cards');

/*------------------------------ Admin Routes -------------------------------------------*/

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
