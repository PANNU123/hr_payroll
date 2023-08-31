<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GroupCompanyController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return 'Home Page'; // This will get component Test.jsx from the resources/js/Pages/Test.jsx
});

Route::get('/login',[LoginController::class,'login'])->name('login');
Route::post('/login',[LoginController::class,'loginPost'])->name('login.post');

Route::group(['prefix' => 'admin','middleware' => ['auth','prevent-back-history'],'as' =>'admin.'],function() {
    Route::get('dashboard', [DashboardController::class, 'adminDashboard'])->name('dashboard');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');


    Route::group(['prefix' => 'group-companies' ],function (){
        Route::get('', [GroupCompanyController::class, 'category'])->name('category');
        Route::get('/create', [GroupCompanyController::class, 'categoryCreate'])->name('category.create');
        Route::post('/create', [GroupCompanyController::class, 'categoryStore'])->name('category.store');
        Route::get('/edit/{id}', [GroupCompanyController::class, 'categoryEdit'])->name('category.edit');
        Route::post('/update', [GroupCompanyController::class, 'categoryUpdate'])->name('category.update');
        Route::get('/delete/{id}', [GroupCompanyController::class, 'categoryDelete'])->name('category.delete');
        Route::get('/active/{id}', [GroupCompanyController::class, 'categoryActive'])->name('category.status.active');
        Route::get('/inactive/{id}', [GroupCompanyController::class, 'categoryInactive'])->name('category.status.inactive');
    });

});