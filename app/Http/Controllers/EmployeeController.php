<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Bangladesh;
use App\Models\Bank;
use App\Models\Company;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Religions;
use App\Models\Section;
use App\Models\Title;
use App\Models\User;
use App\Models\WorkingStatus;
use App\Repositories\EmployeeRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EmployeeController extends Controller
{
    protected $notice;

    public function __construct(EmployeeRepository $notice)
    {
        $this->notice = $notice;
    }

    public function index(){
        $result = $this->notice->getAll();
        return Inertia::render('Module/Employee/Index',['result' => $result]);
    }
    public function create(){
        $companies = Company::select('id','name')->get();
        $users = User::select('id','first_name')->get();
        $titles = Title::select('id','name')->get();
        $religions = Religions::select('id','name')->get();
        $bangladesh = Bangladesh::select('district')->groupBy('district')->get();

        $department = Department::select('id','name')->get();
        $section = Section::select('id','name')->get();
        $designation = Designation::select('id','name')->get();
        $working_status = WorkingStatus::select('id','name')->get();
        $banks = Bank::select('id','name')->get();
        return Inertia::render('Module/Employee/Add',[
            'companies'=>$companies,'users'=>$users,'titles'=>$titles,
            'religions'=>$religions,'bangladesh'=>$bangladesh,'department'=>$department,
            'section'=>$section,'designation'=>$designation,'working_status'=>$working_status,
            'banks'=>$banks,
        ]);
    }
    public function store(Request $request){
        $result = $this->notice->store($request);
        if($result['status']== true){
            return back()->with('success', $result['message']);
        }else{
            return back()->with('error', 'Data Does not Insert');
        }
    }
    public function edit($id){
        $result = $this->notice->edit($id);
        return Inertia::render('Module/Employee/Edit',['result'=>$result]);
    }
    public function update(Request $request){
        $result=$this->notice->update($request);
        if($result['status']== true){
            return back()->with('success', $result['message']);
        }else{
            return back()->with('error', 'Data Does not Insert');
        }
    }
    public function delete($id){
        $result= $this->notice->delete($id);
        return back()->with('success', $result['message']);
    }
    public function status($id){
        $result = $this->notice->status($id);
        return back()->with('success', $result['message']);
    }
}
