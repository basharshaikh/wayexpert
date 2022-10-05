<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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


// Private routes
Route::get('/', function () {
    return view('dashboard.dashboard');
})->middleware('auth');

Route::get('/blog', [BlogController::class, 'getAllBlogForUser'])->middleware('auth');

// Public routes
Route::get('/register', [UserController::class, 'registerForm'])->middleware('guest');
Route::post('/create-user', [UserController::class, 'registerUser'])->middleware('guest');
Route::get('/login', [UserController::class, 'loginFrom'])->middleware('guest');
Route::post('/logged-in', [UserController::class, 'loggedInUser'])->middleware('guest');

// Private route
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');


//Blog routes
Route::get('/blog/add-new', [BlogController::class, 'addBlogForm'])->middleware('auth');
Route::post('/blog/add-new-blog', [BlogController::class, 'addNewBlog'])->middleware('auth');
Route::get('/blog/{blog}/edit', [BlogController::class, 'editBlogForm'])->middleware('auth');
Route::post('/blog/{blog}/update', [BlogController::class, 'updateBlog'])->middleware('auth');
Route::delete('/blog/{blog}/', [BlogController::class, 'destroyABlog'])->middleware('auth');
