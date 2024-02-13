<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use Illuminate\Support\Facades\Auth;
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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware('auth')->name('admin.')->prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::get('/posts/deleted', [AdminPostController::class, 'deletedIndex'])->name('posts.deleted.index');
        Route::get('/posts/deleted/{post}', [AdminPostController::class, 'deletedShow'])->name('posts.deleted.show');
        Route::patch('/posts/deleted/{post}', [AdminPostController::class, 'deletedRestore'])->name('posts.deleted.restore');
        Route::delete('/posts/deleted/{post}', [AdminPostController::class, 'deletedDestroy'])->name('posts.deleted.destroy');
        Route::resource('/posts', AdminPostController::class);
});