<?php

use App\Http\Controllers\BangladeshController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\DutyLocationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GroupCompanyController;
use App\Http\Controllers\NoticeController;
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

Route::group(['prefix' => 'admin','middleware' => ['auth','prevent-back-history'],'as' =>'admin.'],function() {
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
        Route::get('/status/{id}', [GroupCompanyController::class, 'status'])->name('notice.status');
    });

    Route::group(['prefix' => 'companies' ],function (){
        Route::get('', [CompanyController::class, 'index'])->name('company');
        Route::get('/create', [CompanyController::class, 'create'])->name('company.create');
        Route::post('/store', [CompanyController::class, 'store'])->name('company.store');
        Route::get('/edit/{id}', [CompanyController::class, 'edit'])->name('company.edit');
        Route::post('/update', [CompanyController::class, 'update'])->name('company.update');
        Route::get('/delete/{id}', [CompanyController::class, 'delete'])->name('company.delete');
        Route::get('/status/{id}', [CompanyController::class, 'status'])->name('notice.status');
    });

    Route::group(['prefix' => 'religions' ],function (){
        Route::get('', [ReligionsController::class, 'index'])->name('religions');
        Route::get('/create', [ReligionsController::class, 'create'])->name('religions.create');
        Route::post('/store', [ReligionsController::class, 'store'])->name('religions.store');
        Route::get('/edit/{id}', [ReligionsController::class, 'edit'])->name('religions.edit');
        Route::post('/update', [ReligionsController::class, 'update'])->name('religions.update');
        Route::get('/delete/{id}', [ReligionsController::class, 'delete'])->name('religions.delete');
        Route::get('/status/{id}', [ReligionsController::class, 'status'])->name('notice.status');
    });
    Route::group(['prefix' => 'title' ],function (){
        Route::get('', [TitleController::class, 'index'])->name('title');
        Route::get('/create', [TitleController::class, 'create'])->name('title.create');
        Route::post('/store', [TitleController::class, 'store'])->name('title.store');
        Route::get('/edit/{id}', [TitleController::class, 'edit'])->name('title.edit');
        Route::post('/update', [TitleController::class, 'update'])->name('title.update');
        Route::get('/delete/{id}', [TitleController::class, 'delete'])->name('title.delete');
        Route::get('/status/{id}', [TitleController::class, 'status'])->name('notice.status');
    });
    Route::group(['prefix' => 'bank' ],function (){
        Route::get('', [BankController::class, 'index'])->name('bank');
        Route::get('/create', [BankController::class, 'create'])->name('bank.create');
        Route::post('/store', [BankController::class, 'store'])->name('bank.store');
        Route::get('/edit/{id}', [BankController::class, 'edit'])->name('bank.edit');
        Route::post('/update', [BankController::class, 'update'])->name('bank.update');
        Route::get('/delete/{id}', [BankController::class, 'delete'])->name('bank.delete');
        Route::get('/status/{id}', [BankController::class, 'status'])->name('notice.status');
    });
    Route::group(['prefix' => 'working_status' ],function (){
        Route::get('', [WorkingStatusController::class, 'index'])->name('working_status');
        Route::get('/create', [WorkingStatusController::class, 'create'])->name('working_status.create');
        Route::post('/store', [WorkingStatusController::class, 'store'])->name('working_status.store');
        Route::get('/edit/{id}', [WorkingStatusController::class, 'edit'])->name('working_status.edit');
        Route::post('/update', [WorkingStatusController::class, 'update'])->name('working_status.update');
        Route::get('/delete/{id}', [WorkingStatusController::class, 'delete'])->name('working_status.delete');
        Route::get('/status/{id}', [WorkingStatusController::class, 'status'])->name('notice.status');
    });

    Route::group(['prefix' => 'bangladesh' ],function (){
        Route::get('', [BangladeshController::class, 'index'])->name('bangladesh');
        Route::get('/create', [BangladeshController::class, 'create'])->name('bangladesh.create');
        Route::post('/store', [BangladeshController::class, 'store'])->name('bangladesh.store');
        Route::get('/edit/{id}', [BangladeshController::class, 'edit'])->name('bangladesh.edit');
        Route::post('/update', [BangladeshController::class, 'update'])->name('bangladesh.update');
        Route::get('/delete/{id}', [BangladeshController::class, 'delete'])->name('bangladesh.delete');
        Route::get('/status/{id}', [BangladeshController::class, 'status'])->name('notice.status');
    });

    Route::group(['prefix' => 'duty_locations' ],function (){
        Route::get('', [DutyLocationController::class, 'index'])->name('duty_locations');
        Route::get('/create', [DutyLocationController::class, 'create'])->name('duty_locations.create');
        Route::post('/store', [DutyLocationController::class, 'store'])->name('duty_locations.store');
        Route::get('/edit/{id}', [DutyLocationController::class, 'edit'])->name('duty_locations.edit');
        Route::post('/update', [DutyLocationController::class, 'update'])->name('duty_locations.update');
        Route::get('/delete/{id}', [DutyLocationController::class, 'delete'])->name('duty_locations.delete');
        Route::get('/status/{id}', [DutyLocationController::class, 'status'])->name('notice.status');
    });

    Route::group(['prefix' => 'public_holiday' ],function (){
        Route::get('', [PublicHolidayController::class, 'index'])->name('public_holiday');
        Route::get('/create', [PublicHolidayController::class, 'create'])->name('public_holiday.create');
        Route::post('/store', [PublicHolidayController::class, 'store'])->name('public_holiday.store');
        Route::get('/edit/{id}', [PublicHolidayController::class, 'edit'])->name('public_holiday.edit');
        Route::post('/update', [PublicHolidayController::class, 'update'])->name('public_holiday.update');
        Route::get('/delete/{id}', [PublicHolidayController::class, 'delete'])->name('public_holiday.delete');
        Route::get('/status/{id}', [DepartmentController::class, 'status'])->name('notice.status');
    });

    Route::group(['prefix' => 'designation' ],function (){
        Route::get('', [DesignationController::class, 'index'])->name('designation');
        Route::get('/create', [DesignationController::class, 'create'])->name('designation.create');
        Route::post('/store', [DesignationController::class, 'store'])->name('designation.store');
        Route::get('/edit/{id}', [DesignationController::class, 'edit'])->name('designation.edit');
        Route::post('/update', [DesignationController::class, 'update'])->name('designation.update');
        Route::get('/delete/{id}', [DesignationController::class, 'delete'])->name('designation.delete');
        Route::get('/status/{id}', [DepartmentController::class, 'status'])->name('notice.status');
    });

    Route::group(['prefix' => 'department' ],function (){
        Route::get('', [DepartmentController::class, 'index'])->name('department');
        Route::get('/create', [DepartmentController::class, 'create'])->name('department.create');
        Route::post('/store', [DepartmentController::class, 'store'])->name('department.store');
        Route::get('/edit/{id}', [DepartmentController::class, 'edit'])->name('department.edit');
        Route::post('/update', [DepartmentController::class, 'update'])->name('department.update');
        Route::get('/delete/{id}', [DepartmentController::class, 'delete'])->name('department.delete');
        Route::get('/status/{id}', [DepartmentController::class, 'status'])->name('notice.status');
    });

    Route::group(['prefix' => 'section' ],function (){
        Route::get('', [SectionController::class, 'index'])->name('section');
        Route::get('/create', [SectionController::class, 'create'])->name('section.create');
        Route::post('/store', [SectionController::class, 'store'])->name('section.store');
        Route::get('/edit/{id}', [SectionController::class, 'edit'])->name('section.edit');
        Route::post('/update', [SectionController::class, 'update'])->name('section.update');
        Route::get('/delete/{id}', [SectionController::class, 'delete'])->name('section.delete');
        Route::get('/status/{id}', [SectionController::class, 'status'])->name('notice.status');
    });

    Route::group(['prefix' => 'notice' ],function (){
        Route::get('', [NoticeController::class, 'index'])->name('notice');
        Route::get('/create', [NoticeController::class, 'create'])->name('notice.create');
        Route::post('/store', [NoticeController::class, 'store'])->name('notice.store');
        Route::get('/edit/{id}', [NoticeController::class, 'edit'])->name('notice.edit');
        Route::post('/update', [NoticeController::class, 'update'])->name('notice.update');
        Route::get('/delete/{id}', [NoticeController::class, 'delete'])->name('notice.delete');


        Route::get('/status/{id}', [NoticeController::class, 'status'])->name('notice.status');


//        Route::get('/inactive/{id}', [NoticeController::class, 'inactive'])->name('notice.status.inactive');
    });

});