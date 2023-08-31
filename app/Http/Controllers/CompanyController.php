<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\GroupCompany;
use App\Repositories\CompanyRepository;
use Inertia\Inertia;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    protected $companyRepository;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }


    public function Company(){
        $result = $this->companyRepository->getAll();
        return Inertia::render('Module/Company/Index',['result' => $result]);
    }
    public function CompanyCreate(){
        $group_company_list = GroupCompany::select('id','name')->get();
        return Inertia::render('Module/Company/Add',['group_company_list'=>$group_company_list]);
    }
    public function CompanyStore(CompanyRequest $request){
        $result = $this->companyRepository->store($request);
        if($result['status']== true){
            return to_route('admin.company')->with('success', $result['message']);
        }else{
            return to_route('admin.company')->with('error', 'Data Does not Insert');
        }
    }
    public function CompanyEdit($id){
        $group_company_list = GroupCompany::select('id','name')->get();
        $result = $this->companyRepository->edit($id);
        return Inertia::render('Module/Company/Edit',['result' => $result,'group_company_list'=>$group_company_list]);
    }
    public function CompanyUpdate(Request $request){
        $result=$this->companyRepository->update($request);
        if($result['status']== true){
            return to_route('admin.company')->with('success', $result['message']);
        }else{
            return to_route('admin.company')->with('error', 'Data Does not Insert');
        }
    }
    public function CompanyDelete($id){
        $result= $this->companyRepository->delete($id);
        return to_route('admin.company')->with('success', $result['message']);
    }
    public function CompanyActive(){

    }
    public function CompanyInactive(){

    }
}