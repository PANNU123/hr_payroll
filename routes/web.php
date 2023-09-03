<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GroupCompanyController;
use App\Http\Controllers\ReligionsController;
use App\Http\Controllers\TitleController;
use Illuminate\Support\Facades\Auth;
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
        Route::get('', [GroupCompanyController::class, 'index'])->name('group.company');
        Route::get('/create', [GroupCompanyController::class, 'create'])->name('group.company.create');
        Route::post('/store', [GroupCompanyController::class, 'store'])->name('group.company.store');
        Route::get('/edit/{id}', [GroupCompanyController::class, 'edit'])->name('group.company.edit');
        Route::post('/update', [GroupCompanyController::class, 'update'])->name('group.company.update');
        Route::get('/delete/{id}', [GroupCompanyController::class, 'delete'])->name('group.company.delete');
        Route::get('/active/{id}', [GroupCompanyController::class, 'active'])->name('group.company.status.active');
        Route::get('/inactive/{id}', [GroupCompanyController::class, 'inactive'])->name('group.company.status.inactive');
    });

    Route::group(['prefix' => 'companies' ],function (){
        Route::get('', [CompanyController::class, 'index'])->name('company');
        Route::get('/create', [CompanyController::class, 'create'])->name('company.create');
        Route::post('/store', [CompanyController::class, 'store'])->name('company.store');
        Route::get('/edit/{id}', [CompanyController::class, 'edit'])->name('company.edit');
        Route::post('/update', [CompanyController::class, 'update'])->name('company.update');
        Route::get('/delete/{id}', [CompanyController::class, 'delete'])->name('company.delete');
        Route::get('/active/{id}', [CompanyController::class, 'active'])->name('company.status.active');
        Route::get('/inactive/{id}', [CompanyController::class, 'inactive'])->name('company.status.inactive');
    });

    Route::group(['prefix' => 'religions' ],function (){
        Route::get('', [ReligionsController::class, 'index'])->name('religions');
        Route::get('/create', [ReligionsController::class, 'create'])->name('religions.create');
        Route::post('/store', [ReligionsController::class, 'store'])->name('religions.store');
        Route::get('/edit/{id}', [ReligionsController::class, 'edit'])->name('religions.edit');
        Route::post('/update', [ReligionsController::class, 'update'])->name('religions.update');
        Route::get('/delete/{id}', [ReligionsController::class, 'delete'])->name('religions.delete');
        Route::get('/active/{id}', [ReligionsController::class, 'active'])->name('religions.status.active');
        Route::get('/inactive/{id}', [ReligionsController::class, 'inactive'])->name('religions.status.inactive');
    });
    Route::group(['prefix' => 'title' ],function (){
        Route::get('', [TitleController::class, 'index'])->name('title');
        Route::get('/create', [TitleController::class, 'create'])->name('title.create');
        Route::post('/store', [TitleController::class, 'store'])->name('title.store');
        Route::get('/edit/{id}', [TitleController::class, 'edit'])->name('title.edit');
        Route::post('/update', [TitleController::class, 'update'])->name('title.update');
        Route::get('/delete/{id}', [TitleController::class, 'delete'])->name('title.delete');
        Route::get('/active/{id}', [TitleController::class, 'active'])->name('title.status.active');
        Route::get('/inactive/{id}', [TitleController::class, 'inactive'])->name('title.status.inactive');
    });

});