<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminPostsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('posts', [PostsController::class, 'index'])->name('posts.index');
Route::get('posts/{id}', [PostsController::class, 'show'])->name('posts.show');

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard.index');

    Route::get('posts', [AdminPostsController::class, 'index'])->name('admin.posts.index');
    Route::get('posts/create', [AdminPostsController::class, 'create'])->name('admin.posts.create');
    Route::get('posts/{id}/edit', [AdminPostsController::class, 'edit'])->name('admin.posts.edit');
    Route::post('posts',[AdminPostsController::class,'store'])->name('admin.posts.store');
});
