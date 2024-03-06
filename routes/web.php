<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\CreatePost;
use App\Livewire\EditPost;
use App\Livewire\Posts;
use App\Livewire\ShowPost;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('posts', Posts::class);
    Route::get('posts/create', CreatePost::class);
    Route::get('posts/{post}/edit', EditPost::class);
    Route::get('posts/{post}', ShowPost::class)->name('posts.show');
});

require __DIR__.'/auth.php';
