<?php
namespace App\Repositories;


use App\Models\Department;
use Illuminate\Support\Facades\Auth;

class DepartmentRepository {
    protected $model;

    public function __construct(Department $model)
    {
        $this->model=$model;
    }

    public function getAll(){
        return $this->model::all();
    }
    public function store($request){
        return $this->storeOrUpdate($request , $action="save");
    }
    public function edit(int $id){
        return $this->model::find($id);
    }

    public function update($request){
        return $this->storeOrUpdate($request , $action="update");
    }
    public function delete($id){
        try {
            $result=$this->edit($id)->delete();
            if($result){
                 return ['status'=>true , 'message'=>'Title Delete successfully'];
            }
         } catch (\Throwable $th) {
            //throw $th;
            return ['status' => false, 'errors' =>  $th->getMessage()];
         }

    }
    protected function storeOrUpdate($request, $action)
    {
        try {
            $companyId = \App\Models\User::where('id', auth()->user()->id)->value('company_id');
               $data = $this->model::updateOrCreate(
                   ['id' =>isset( $request->id)?  $request->id : ''],
                   [
                       'name' => $request->name,
                       'short_name' =>$request->short_name,
                       'department_code' => $request->department_code,
                       'started_from' => $request->started_from,
                       'top_rank' => $request->top_rank,
                       'report_to' => $request->report_to,
                       'headed_by' => $request->headed_by,
                       'second_man' => $request->second_man,
                       'user_id'=>Auth::user()->id,
                       'company_id'=>$companyId
                   ]
                );
            if ($data) {
                $message = $action == "save" ?"Title Save Successfully" :"Title Update Successfully";
                return ['status' => true, 'message' => $message,];
            }


        } catch (\Exception $e) {
            return ['status' => false, 'errors' =>  $e->getMessage()];
        }
    }
}

