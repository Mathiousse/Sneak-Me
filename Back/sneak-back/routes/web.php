<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\KeywordController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\UserController;
use App\Models\Keyword;
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

Route::get('/categories',[CategoryController::class,'index'])->middleware(['auth', 'verified'])->name('categories');
Route::get('/categories/{category}/edit',[CategoryController::class,'edit'])->middleware(['auth', 'verified'])->name('categories.edit');
Route::get('/categories/create',[CategoryController::class,'create'])->name('categories.create');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::post('/categories',[CategoryController::class,'store'])->name('categories.store');
Route::delete('/categories/{category}', [CategoryController::class,'destroy'])->name('categories.destroy');

Route::get('/produits',[ProductController::class,'index'])->middleware(['auth', 'verified'])->name('products');
Route::get('/produits/{product}/edit',[ProductController::class,'edit'])->middleware(['auth', 'verified'])->name('products.edit');
Route::get('/produits/create',[ProductController::class,'create'])->name('products.create');
Route::put('/produits/{product}', [ProductController::class, 'update'])->name('products.update');
Route::post('/produits',[ProductController::class,'store'])->name('products.store');
Route::delete('/produits/{product}', [ProductController::class,'destroy'])->name('products.destroy');

Route::get('/keyword',[KeywordController::class,'index'])->middleware(['auth', 'verified'])->name('keyword');
Route::get('/keywords/{keyword}/edit',[KeywordController::class,'edit'])->middleware(['auth', 'verified'])->name('keyword.edit');
Route::get('/keywords/create',[KeywordController::class,'create'])->name('keyword.create');
Route::put('/keywords/{keyword}', [KeywordController::class, 'update'])->name('keyword.update');
Route::post('/keywords',[KeywordController::class,'store'])->name('keyword.store');
Route::delete('/keywords/{keyword}', [KeywordController::class,'destroy'])->name('keyword.destroy');

Route::get('/response',[ResponseController::class,'index'])->middleware(['auth', 'verified'])->name('response');



Route::get('/user',[UserController::class,'index'])->middleware(['auth', 'verified'])->name('user');

Route::get('/setting', function () {
    return view('setting');
})->middleware(['auth', 'verified'])->name('setting');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';