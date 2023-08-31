<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class GroupCompanyController extends Controller
{
    public function category(){
        return Inertia::render('Module/GroupCompany/Index');
    }
    public function categoryCreate(){
        return Inertia::render('Module/GroupCompany/Add');
    }
    public function categoryStore(){

    }
    public function categoryEdit(){

    }
    public function categoryUpdate(){

    }
    public function categoryDelete(){

    }
    public function categoryActive(){

    }
    public function categoryInactive(){

    }
}