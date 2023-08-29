<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Session;
class DashboardController extends Controller
{
    public function adminDashboard(){
        if(Session::get('adminLogin')){
            return Inertia::render('Module/Dashboard/Index');
        }else{
            return to_route('login');
        }
    }
}