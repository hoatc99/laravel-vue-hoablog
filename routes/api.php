<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// 'a' => admin pages
// 'c' => client pages

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::resource('/post', PostController::class);
});

Route::prefix('/c')->group(function () {
    Route::get('/post', [PostController::class, 'clientIndex']);
    Route::get('/post/{slug}', [PostController::class, 'clientShow']);
});
