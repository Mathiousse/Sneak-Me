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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/orders', function () {
    return view('orders');
})->middleware(['auth', 'verified'])->name('orders');

Route::get('/categories', function () {
    return view('categories');
})->middleware(['auth', 'verified'])->name('categories');

Route::get('/produits', function () {
    return view('produits');
})->middleware(['auth', 'verified'])->name('produits');

Route::get('/keyword', function () {
    return view('keyword');
})->middleware(['auth', 'verified'])->name('keyword');

Route::get('/user', function () {
    return view('user');
})->middleware(['auth', 'verified'])->name('user');

Route::get('/setting', function () {
    return view('setting');
})->middleware(['auth', 'verified'])->name('setting');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';