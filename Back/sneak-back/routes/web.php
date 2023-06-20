<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\KeywordController;
use App\Http\Controllers\OrdersController;
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

Route::get('/guest', function () {
    return view('guest');
})->name('guest');

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'admin'])->name('dashboard');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'admin'])->name('dashboard');

Route::get('/orders',[OrdersController::class,'index'])->middleware(['auth', 'verified'])->name('orders.index');

Route::get('/categories',[CategoryController::class,'index'])->middleware(['auth', 'verified', 'admin'])->name('categories');
Route::get('/categories/{category}/edit',[CategoryController::class,'edit'])->middleware(['auth', 'verified', 'admin'])->name('categories.edit');
Route::get('/categories/create',[CategoryController::class,'create'])->name('categories.create');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::post('/categories',[CategoryController::class,'store'])->name('categories.store');
Route::delete('/categories/{category}', [CategoryController::class,'destroy'])->name('categories.destroy');

Route::get('/produits',[ProductController::class,'index'])->middleware(['auth', 'verified', 'admin'])->name('products');
Route::get('/produits/{product}/edit',[ProductController::class,'edit'])->middleware(['auth', 'verified', 'admin'])->name('products.edit');
Route::get('/produits/create',[ProductController::class,'create'])->name('products.create');
Route::post('/produits',[ProductController::class,'store'])->name('products.store');
Route::put('/produits/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/produits/{product}', [ProductController::class,'destroy'])->name('products.destroy');

Route::get('/keywords',[KeywordController::class,'index'])->middleware(['auth', 'verified'])->name('keywords');
Route::get('/keywords/{keyword}/edit',[KeywordController::class,'edit'])->middleware(['auth', 'verified'])->name('keywords.edit');
Route::get('/keywords/create',[KeywordController::class,'create'])->name('keywords.create');
Route::put('/keywords/{keyword}', [KeywordController::class, 'update'])->name('keywords.update');
Route::post('/keywords',[KeywordController::class,'store'])->name('keywords.store');
Route::delete('/keywords/{keyword}', [KeywordController::class,'destroy'])->name('keywords.destroy');

Route::get('/response',[ResponseController::class,'index'])->middleware(['auth', 'verified'])->name('response');
Route::get('/response/{response}/edit',[ResponseController::class,'edit'])->middleware(['auth', 'verified'])->name('response.edit');
Route::get('/response/create',[ResponseController::class,'create'])->name('response.create');
Route::put('/response/{response}', [ResponseController::class, 'update'])->name('response.update');
Route::post('/response',[ResponseController::class,'store'])->name('response.store');
Route::delete('/response/{response}', [ResponseController::class,'destroy'])->name('response.destroy');

Route::get('/user',[UserController::class,'index'])->middleware(['auth', 'verified'])->name('user');
Route::get('/user/{user}/edit',[UserController::class,'edit'])->middleware(['auth', 'verified'])->name('user.edit');
Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/{user}', [UserController::class,'destroy'])->name('user.destroy');

Route::get('/setting', function () {
    return view('setting');
})->middleware(['auth', 'verified'])->name('setting');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';