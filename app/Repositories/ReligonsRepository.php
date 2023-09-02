<?php
namespace App\Repositories;


use App\Models\Religions;
use Illuminate\Support\Facades\Auth;

class ReligonsRepository {
    protected $model;

    public function __construct(Religions $model)
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
                 return ['status'=>true , 'message'=>'Religions Delete successfully'];
            }
         } catch (\Throwable $th) {
            //throw $th;
            return ['status' => false, 'errors' =>  $th->getMessage()];
         }

    }
    protected function storeOrUpdate($request, $action)
    {
        try {
               $data = $this->model::updateOrCreate(
                   ['id' =>isset( $request->id)?  $request->id : ''],
                   [
                        'name' => $request->name,
                        'user_id'=>Auth::user()->id
                   ]
                );
            if ($data) {
                $message = $action == "save" ?"Religions Save Successfully" :"Religions Update Successfully";
                return ['status' => true, 'message' => $message,];
            }


        } catch (\Exception $e) {
            return ['status' => false, 'errors' =>  $e->getMessage()];
        }
    }


}