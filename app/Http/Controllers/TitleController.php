<?php

namespace App\Http\Controllers;

use App\Http\Requests\TitleRequest;
use App\Repositories\TitleRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TitleController extends Controller
{
    protected $religions;
    public function __construct(TitleRepository $religions)
    {
        $this->religions = $religions;
    }


    public function index(){
        $result = $this->religions->getAll();
        return Inertia::render('Module/Title/Index',['result' => $result]);
    }
    public function create(){
        return Inertia::render('Module/Title/Add');
    }
    public function store(TitleRequest $request){
        $result = $this->religions->store($request);
        if($result['status']== true){
            return back()->with('success', $result['message']);
        }else{
            return back()->with('error', 'Data Does not Insert');
        }
    }
    public function edit($id){
        $result = $this->religions->edit($id);
        return Inertia::render('Module/Title/Edit',['result'=>$result]);
    }
    public function update(Request $request){
        $result=$this->religions->update($request);
        if($result['status']== true){
            return back()->with('success', $result['message']);
        }else{
            return back()->with('error', 'Data Does not Insert');
        }
    }
    public function delete($id){
        $result= $this->religions->delete($id);
        return to_route('admin.religions')->with('success', $result['message']);
    }
    public function active(){

    }
    public function inactive(){

    }
}
