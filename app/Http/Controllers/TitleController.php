<?php

namespace App\Http\Controllers;

use App\Http\Requests\BankRequest;
use App\Http\Requests\TitleRequest;
use App\Repositories\TitleRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TitleController extends Controller
{
    protected $title;
    public function __construct(TitleRepository $religions)
    {
        $this->title = $religions;
    }


    public function index(){
        $result = $this->title->getAll();
        return Inertia::render('Module/Bank/Index',['result' => $result]);
    }
    public function create(){
        return Inertia::render('Module/Bank/Add');
    }
    public function store(BankRequest $request){
        $result = $this->title->store($request);
        if($result['status']== true){
            return back()->with('success', $result['message']);
        }else{
            return back()->with('error', 'Data Does not Insert');
        }
    }
    public function edit($id){
        $result = $this->title->edit($id);
        return Inertia::render('Module/Bank/Edit',['result'=>$result]);
    }
    public function update(Request $request){
        $result=$this->title->update($request);
        if($result['status']== true){
            return back()->with('success', $result['message']);
        }else{
            return back()->with('error', 'Data Does not Insert');
        }
    }
    public function delete($id){
        $result= $this->title->delete($id);
        return back()->with('success', $result['message']);
    }
    public function active(){

    }
    public function inactive(){

    }
}
