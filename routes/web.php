<?php

use App\Http\Controllers\BangladeshController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\democontroller;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\DutyLocationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GroupCompanyController;
use App\Http\Controllers\PublicHolidayController;
use App\Http\Controllers\PunchDetailsController;
use App\Http\Controllers\ReligionsController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\WorkingStatusController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return 'Home Page'; // This will get component Test.jsx from the resources/js/Pages/Test.jsx
});

Route::get('/login',[LoginController::class,'login'])->name('login');
Route::post('/login',[LoginController::class,'loginPost'])->name('login.post');

Route::group(['prefix' => 'admin','middleware' => ['auth'],'as' =>'admin.'],function() {
    Route::get('dashboard', [DashboardController::class, 'adminDashboard'])->name('dashboard');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('get-punch-details', [PunchDetailsController::class, 'getPunchedData'])->name('get.punch.machine.date');



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
    Route::group(['prefix' => 'bank' ],function (){
        Route::get('', [BankController::class, 'index'])->name('bank');
        Route::get('/create', [BankController::class, 'create'])->name('bank.create');
        Route::post('/store', [BankController::class, 'store'])->name('bank.store');
        Route::get('/edit/{id}', [BankController::class, 'edit'])->name('bank.edit');
        Route::post('/update', [BankController::class, 'update'])->name('bank.update');
        Route::get('/delete/{id}', [BankController::class, 'delete'])->name('bank.delete');
        Route::get('/active/{id}', [BankController::class, 'active'])->name('bank.status.active');
        Route::get('/inactive/{id}', [BankController::class, 'inactive'])->name('bank.status.inactive');
    });
    Route::group(['prefix' => 'working_status' ],function (){
        Route::get('', [WorkingStatusController::class, 'index'])->name('working_status');
        Route::get('/create', [WorkingStatusController::class, 'create'])->name('working_status.create');
        Route::post('/store', [WorkingStatusController::class, 'store'])->name('working_status.store');
        Route::get('/edit/{id}', [WorkingStatusController::class, 'edit'])->name('working_status.edit');
        Route::post('/update', [WorkingStatusController::class, 'update'])->name('working_status.update');
        Route::get('/delete/{id}', [WorkingStatusController::class, 'delete'])->name('working_status.delete');
        Route::get('/active/{id}', [WorkingStatusController::class, 'active'])->name('working_status.status.active');
        Route::get('/inactive/{id}', [WorkingStatusController::class, 'inactive'])->name('working_status.status.inactive');
    });

    Route::group(['prefix' => 'bangladesh' ],function (){
        Route::get('', [BangladeshController::class, 'index'])->name('bangladesh');
        Route::get('/create', [BangladeshController::class, 'create'])->name('bangladesh.create');
        Route::post('/store', [BangladeshController::class, 'store'])->name('bangladesh.store');
        Route::get('/edit/{id}', [BangladeshController::class, 'edit'])->name('bangladesh.edit');
        Route::post('/update', [BangladeshController::class, 'update'])->name('bangladesh.update');
        Route::get('/delete/{id}', [BangladeshController::class, 'delete'])->name('bangladesh.delete');
        Route::get('/active/{id}', [BangladeshController::class, 'active'])->name('bangladesh.status.active');
        Route::get('/inactive/{id}', [BangladeshController::class, 'inactive'])->name('bangladesh.status.inactive');
    });

    Route::group(['prefix' => 'duty_locations' ],function (){
        Route::get('', [DutyLocationController::class, 'index'])->name('duty_locations');
        Route::get('/create', [DutyLocationController::class, 'create'])->name('duty_locations.create');
        Route::post('/store', [DutyLocationController::class, 'store'])->name('duty_locations.store');
        Route::get('/edit/{id}', [DutyLocationController::class, 'edit'])->name('duty_locations.edit');
        Route::post('/update', [DutyLocationController::class, 'update'])->name('duty_locations.update');
        Route::get('/delete/{id}', [DutyLocationController::class, 'delete'])->name('duty_locations.delete');
        Route::get('/active/{id}', [DutyLocationController::class, 'active'])->name('duty_locations.status.active');
        Route::get('/inactive/{id}', [DutyLocationController::class, 'inactive'])->name('duty_locations.status.inactive');
    });

    Route::group(['prefix' => 'public_holiday' ],function (){
        Route::get('', [PublicHolidayController::class, 'index'])->name('public_holiday');
        Route::get('/create', [PublicHolidayController::class, 'create'])->name('public_holiday.create');
        Route::post('/store', [PublicHolidayController::class, 'store'])->name('public_holiday.store');
        Route::get('/edit/{id}', [PublicHolidayController::class, 'edit'])->name('public_holiday.edit');
        Route::post('/update', [PublicHolidayController::class, 'update'])->name('public_holiday.update');
        Route::get('/delete/{id}', [PublicHolidayController::class, 'delete'])->name('public_holiday.delete');
        Route::get('/active/{id}', [PublicHolidayController::class, 'active'])->name('public_holiday.status.active');
        Route::get('/inactive/{id}', [PublicHolidayController::class, 'inactive'])->name('public_holiday.status.inactive');
    });

    Route::group(['prefix' => 'designation' ],function (){
        Route::get('', [DesignationController::class, 'index'])->name('designation');
        Route::get('/create', [DesignationController::class, 'create'])->name('designation.create');
        Route::post('/store', [DesignationController::class, 'store'])->name('designation.store');
        Route::get('/edit/{id}', [DesignationController::class, 'edit'])->name('designation.edit');
        Route::post('/update', [DesignationController::class, 'update'])->name('designation.update');
        Route::get('/delete/{id}', [DesignationController::class, 'delete'])->name('designation.delete');
        Route::get('/active/{id}', [DesignationController::class, 'active'])->name('designation.status.active');
        Route::get('/inactive/{id}', [DesignationController::class, 'inactive'])->name('designation.status.inactive');
    });

    Route::group(['prefix' => 'department' ],function (){
        Route::get('', [DepartmentController::class, 'index'])->name('department');
        Route::get('/create', [DepartmentController::class, 'create'])->name('department.create');
        Route::post('/store', [DepartmentController::class, 'store'])->name('department.store');
        Route::get('/edit/{id}', [DepartmentController::class, 'edit'])->name('department.edit');
        Route::post('/update', [DepartmentController::class, 'update'])->name('department.update');
        Route::get('/delete/{id}', [DepartmentController::class, 'delete'])->name('department.delete');
        Route::get('/active/{id}', [DepartmentController::class, 'active'])->name('department.status.active');
        Route::get('/inactive/{id}', [DepartmentController::class, 'inactive'])->name('department.status.inactive');
    });

    Route::group(['prefix' => 'section' ],function (){
        Route::get('', [SectionController::class, 'index'])->name('section');
        Route::get('/create', [SectionController::class, 'create'])->name('section.create');
        Route::post('/store', [SectionController::class, 'store'])->name('section.store');
        Route::get('/edit/{id}', [SectionController::class, 'edit'])->name('section.edit');
        Route::post('/update', [SectionController::class, 'update'])->name('section.update');
        Route::get('/delete/{id}', [SectionController::class, 'delete'])->name('section.delete');
        Route::get('/active/{id}', [SectionController::class, 'active'])->name('section.status.active');
        Route::get('/inactive/{id}', [SectionController::class, 'inactive'])->name('section.status.inactive');
    });

});