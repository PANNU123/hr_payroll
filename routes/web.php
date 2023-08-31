<?php

use App\Http\Controllers\CompanyController;
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
        Route::get('', [GroupCompanyController::class, 'groupCompany'])->name('group.company');
        Route::get('/create', [GroupCompanyController::class, 'groupCompanyCreate'])->name('group.company.create');
        Route::post('/store', [GroupCompanyController::class, 'groupCompanyStore'])->name('group.company.store');
        Route::get('/edit/{id}', [GroupCompanyController::class, 'groupCompanyEdit'])->name('group.company.edit');
        Route::post('/update', [GroupCompanyController::class, 'groupCompanyUpdate'])->name('group.company.update');
        Route::get('/delete/{id}', [GroupCompanyController::class, 'groupCompanyDelete'])->name('group.company.delete');
        Route::get('/active/{id}', [GroupCompanyController::class, 'groupCompanyActive'])->name('group.company.status.active');
        Route::get('/inactive/{id}', [GroupCompanyController::class, 'groupCompanyInactive'])->name('group.company.status.inactive');
    });

    Route::group(['prefix' => 'companies' ],function (){
        Route::get('', [CompanyController::class, 'Company'])->name('company');
        Route::get('/create', [CompanyController::class, 'CompanyCreate'])->name('company.create');
        Route::post('/store', [CompanyController::class, 'CompanyStore'])->name('company.store');
        Route::get('/edit/{id}', [CompanyController::class, 'CompanyEdit'])->name('company.edit');
        Route::post('/update', [CompanyController::class, 'CompanyUpdate'])->name('company.update');
        Route::get('/delete/{id}', [CompanyController::class, 'CompanyDelete'])->name('company.delete');
        Route::get('/active/{id}', [CompanyController::class, 'CompanyActive'])->name('company.status.active');
        Route::get('/inactive/{id}', [CompanyController::class, 'CompanyInactive'])->name('company.status.inactive');
    });

});