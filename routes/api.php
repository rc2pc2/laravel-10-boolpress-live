<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\LeadController;
use App\Http\Controllers\Api\PostController;
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

Route::name('api.')->group(function () {
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/search', [PostController::class, 'search'])->name('posts.search');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
    Route::post('/contact-us',[ LeadController::class, 'store' ])->name('leads.store');
});