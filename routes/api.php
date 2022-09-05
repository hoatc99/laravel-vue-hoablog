<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
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
});

Route::prefix('/a')->group(function () {
    Route::resource('/category', CategoryController::class)->except(['create', 'edit']);
    Route::resource('/post', PostController::class)->except(['create', 'edit']);
});

Route::prefix('/c')->group(function () {
    Route::get('/category', [CategoryController::class, 'clientIndex']);
    Route::get('/category/{category:slug}', [CategoryController::class, 'showClient']);
    Route::get('/post', [PostController::class, 'clientIndex']);
    Route::get('/post/{post:slug}', [PostController::class, 'clientShow']);
});
