<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PettyCashCategoriesController;
use App\Http\Controllers\PettyCashController;
use App\Http\Controllers\PettyCashEntriesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function (){
    return view('welcome');
});

// Route::[resource]('/[uri]', function (){})
// Route::[resource]('/[uri]', [[Controller Name Here]::class, '[Controller Method]'])

// Route::get('/register', [AuthController::class, 'showRegister']);
// Route::post('/register', [AuthController::class, 'register']);

// Log In
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);


Route::middleware(['auth'])->group(function(){
    Route::post('/logout', [AuthController::class, 'logout']);

    // Users
    Route::get('/users', [PettyCashController::class, 'index']);
    Route::get('/users/add', [PettyCashController::class, 'add']);
    Route::post('/users/create', [PettyCashController::class, 'create']);
    Route::get('/users/{user_id}/edit', [PettyCashController::class, 'edit']);
    Route::post('/users/{user_id}/update', [PettyCashController::class, 'update']);
    Route::get('/users/{user_id}/delete', [PettyCashController::class, 'delete']);
    Route::get('/users/{user_id}/destroy', [PettyCashController::class, 'destroy']);

    // Category
    Route::get('/category', [PettyCashCategoriesController::class, 'index']);

    // Entry
    Route::get('/entries', [PettyCashEntriesController::class, 'index']);
    Route::get('/entries/add', [PettyCashEntriesController::class, 'add']);
    Route::post('/entries/create', [PettyCashEntriesController::class, 'create']);
    Route::get('/entries/{entry_id}/edit', [PettyCashEntriesController::class, 'edit']);
    Route::post('/entries/{entry_id}/update', [PettyCashEntriesController::class, 'update']);
    Route::get('/entries/{entry_id}/delete', [PettyCashEntriesController::class, 'delete']);
    Route::get('/entries/{entry_id}/destroy', [PettyCashEntriesController::class, 'destroy']);
});

Route::get('/dashboard', [DashboardController::class, 'landingpage']);
 // Route::get('/category/add', [PettyCashCategoriesController::class, 'add']);
    // Route::post('/category/create', [PettyCashCategoriesController::class, 'create']);
    // Route::get('/category/{category_id}/edit', [PettyCashCategoriesController::class, 'edit']);
    // Route::post('/category/{category_id}/update', [PettyCashCategoriesController::class, 'update']);
    // Route::get('/category/{category_id}/delete', [PettyCashCategoriesController::class, 'delete']);
    // Route::get('/category/{category_id}/destroy', [PettyCashCategoriesController::class, 'destroy']);