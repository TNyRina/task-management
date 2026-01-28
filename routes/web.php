<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Route;


Route::get('/', [AuthController::class, 'loginPage'])->name('loginPage');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'registerPage'])->name('registerPage');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::middleware(['web'])->group(function (){
    Route::get('/auth/google', [GoogleController::class, 'redirect'])->name('google.redirect');
    Route::get('/auth/google/callback', [GoogleController::class, 'callback'])->name('google.callback');
});


Route::middleware('auth')->group(function(){
    Route::name('project.')->prefix('project')->group(function(){
        Route::get('/', [ProjectController::class, 'index'])->name('index');
    
        Route::get('/create', [ProjectController::class, 'form'])->name('form');
        Route::post('/', [ProjectController::class, 'store'])->name('store');
        
        Route::get('/{project}', [ProjectController::class, 'update'])->name('updatePage');
        Route::post('/{project}', [ProjectController::class, 'save'])->name('update');
        
        Route::delete('/{project}', [ProjectController::class, 'delete'])->name('delete');
    
        Route::post('/status/{project}/{code_status?}', [ProjectController::class, 'updateStatus'])->name('status');
    
        Route::get('/filter/{code_status}', [ProjectController::class, 'filterByStatus'])->name('filter');
    });
    
    Route::resource('task', TaskController::class)->only('update', 'destroy');
    Route::post('/task/{project}', [TaskController::class, 'create'])->name('task.create');
});






