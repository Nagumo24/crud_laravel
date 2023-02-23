<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\CaptionController;
use App\Http\Controllers\NewsController;



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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');

// Route::get('/post', [App\Http\Controllers\PostController::class, 'index'])->name('post');
// Route::post('/post', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
// Route::get('/post/{post}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
Route::resource('post', PostController::class);


// Route::get('/task', [App\Http\Controllers\TaskController::class, 'index'])->name('task');
// Route::post('/task', [App\Http\Controllers\TaskController::class, 'store'])->name('task.store');
// Route::get('/task/{task}/edit', [App\Http\Controllers\TaskController::class, 'edit'])->name('task.edit');
// Route::put('/task{id}', [App\Http\Controllers\TaskController::class, 'index'])->name('update');

Route::resource('task', TaskController::class);

// Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog');
// Route::post('/blog', [App\Http\Controllers\BlogController::class, 'store'])->name('blog.store');
// Route::get('blog/{blog}/edit', [App\Http\Controllers\BlogController::class, 'edit'])->name('blog.edit');
// Route::put('blog/{id}', [App\Http\Controllers\BlogController::class, 'index'])->name('update');

Route::resource('blog', BlogController::class);


Route::resource('list', ListController::class);

Route::resource('presensi', PresensiController::class);

Route::resource('caption', CaptionController::class);

Route::resource('news', NewsController::class);