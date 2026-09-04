<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. Landing Page (Halaman Utama saat aplikasi pertama kali dibuka)
Route::get('/', function () {
    return view('welcome');
})->name('landing');

// 2. Guest Routes (Hanya bisa diakses jika user BELUM login)
Route::middleware(['guest'])->group(function () {
    // Form & Proses Register
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');

    // Form & Proses Login
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

// 3. Logout Route (Hanya bisa diakses jika user SUDAH login)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// 4. Protected Routes (Hanya bisa diakses jika user SUDAH login)
Route::middleware(['auth'])->group(function () {
    // Dashboard Todo List
    Route::get('/dashboard', [TodoController::class, 'index'])->name('todos.index');
    
    // CRUD Todo
    Route::post('/todos', [TodoController::class, 'store'])->name('todos.store');
    Route::patch('/todos/{todo}', [TodoController::class, 'update'])->name('todos.update');
    Route::delete('/todos/{todo}', [TodoController::class, 'destroy'])->name('todos.destroy');
});
