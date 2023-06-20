<?php

use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/chatbot', [MessageController::class, 'index']);

Route::group([
    'middleware' => 'auth.optional:api'
], function () {
    Route::get('/chatbot', [MessageController::class, 'index']);
    Route::apiResource('products', MessageController::class);
});

// Route::middleware('auth.optional:api')->get('/api/chatbot', function(Request $request) {
//     return $request->user();
// });