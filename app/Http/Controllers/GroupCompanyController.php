<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupCompanyRequest;
use App\Repositories\GroupCompanyRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;


class GroupCompanyController extends Controller
{

    protected $groupCompanyRepository;

    public function __construct(GroupCompanyRepository $groupCompanyRepository)
    {
        $this->groupCompanyRepository = $groupCompanyRepository;
    }


    public function groupCompany(){
        $result = $this->groupCompanyRepository->getAll();
        return Inertia::render('Module/GroupCompany/Index',['result' => $result]);
    }
    public function groupCompanyCreate(){
        return Inertia::render('Module/GroupCompany/Add');
    }
    public function groupCompanyStore(GroupCompanyRequest $request){
        $result = $this->groupCompanyRepository->store($request);
        if($result['status']== true){
            return to_route('admin.group.company')->with('success', $result['message']);
        }else{
            return to_route('admin.group.company')->with('error', 'Data Does not Insert');
        }
    }
    public function groupCompanyEdit($id){
        $result = $this->groupCompanyRepository->edit($id);
        return Inertia::render('Module/GroupCompany/Edit',['result' => $result]);
    }
    public function groupCompanyUpdate(Request $request){
        $result=$this->groupCompanyRepository->update($request);
        if($result['status']== true){
            return to_route('admin.group.company')->with('success', $result['message']);
        }else{
            return to_route('admin.group.company')->with('error', 'Data Does not Insert');
        }
    }
    public function groupCompanyDelete($id){
        $result= $this->groupCompanyRepository->delete($id);
        return to_route('admin.group.company')->with('success', $result['message']);

    }
    public function groupCompanyActive(){

    }
    public function groupCompanyInactive(){

    }
}