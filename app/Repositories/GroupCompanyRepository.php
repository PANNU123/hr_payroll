<?php
namespace App\Repositories;

use App\Models\GroupCompany;
use Illuminate\Support\Str;

class GroupCompanyRepository {
    protected $model;

    public function __construct(GroupCompany $model)
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
                 return ['status'=>true , 'message'=>'Group Company Delete successfully'];
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
                        'address' => $request->address,
                        'city' => $request->city,
                        'state' => $request->state,
                        'post_code' => $request->post_code,
                        'email' => $request->email,
                        'country' => $request->country,
                        'phone_no' => $request->phone_no,
                        'website' => $request->website,
                        'currency' => $request->currency,
                   ]
                );
            if ($data) {
                $message = $action == "save" ?"Group Company Save Successfully" :"Group Company Update Successfully";
                return ['status' => true, 'message' => $message,];
            }


        } catch (\Exception $e) {
            return ['status' => false, 'errors' =>  $e->getMessage()];
        }
    }


}