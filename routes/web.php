<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
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

// Public Routes
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware('guest')->group(function () {
Route::get('/register', [AuthController::class, 'signup'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'signin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
});

// Protected Routes
Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/home', [TaskController::class, 'home'])->name('home');
    Route::get('/create', [TaskController::class, 'create'])->name('create');
    Route::post('/create', [TaskController::class, 'store'])->name('store');
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('destroy');
    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('edit');
    Route::patch('/tasks/{task}', [TaskController::class, 'update'])->name('update');
});
