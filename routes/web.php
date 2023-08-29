<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia; // We are going to use this class to render React components

Route::get('/', function () {
    return 'Home Page'; // This will get component Test.jsx from the resources/js/Pages/Test.jsx
});

Route::get('/login',[LoginController::class,'login'])->name('login');
Route::post('/login',[LoginController::class,'loginPost'])->name('login.post');

Route::group(['prefix' => 'admin','middleware' => ['auth','prevent-back-history'],'as' =>'admin.'],function() {
    Route::get('dashboard', [DashboardController::class, 'adminDashboard'])->name('dashboard');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('category', [CategoryController::class, 'category'])->name('category');
});