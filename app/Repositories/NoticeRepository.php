<?php
namespace App\Repositories;


use App\Models\Notice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NoticeRepository {
    protected $model;

    public function __construct(Notice $model)
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
    public function status($id){
        try {
            $result = $this->model::find($id);
            if ($result->status == 1) {
                $result->update(['status' => 0]);
                return ['status' => true, 'message' => 'Status updated successfully'];
            } elseif ($result->status == 0) {
                $result->update(['status' => 1]);
                return ['status' => true, 'message' => 'Status updated successfully'];
            } else {
                return ['status' => false, 'message' => 'Invalid status value'];
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

            if($request->hasFile('file_path')){

                $getContent = file_get_contents($request->file_path);
                $fileInfo = pathinfo($request->file_path);
                $extension = $request->file_path->extension();
                $folderName = "notice";
                $image = $getContent;
                $fileName = time() . '.' . $extension;
                if (!Storage::disk('public')->exists($folderName)) {
                    Storage::disk('public')->makeDirectory($folderName, 0775, true);
                }
                $realPath = 'public/' . $folderName;
                Storage::put($realPath . '/' . $fileName, $image);
                $path = $realPath . '/' . $fileName;

            }

               $data = $this->model::updateOrCreate(
                   ['id' =>isset( $request->id)?  $request->id : ''],
                   [
                        'title' => $request->title,
                        'notice_date' => $request->notice_date,
                        'expiry_date' => $request->expiry_date,
                        'sender' => $request->sender,
                        'type' => $request->type,
                        'confidentiality' => $request->confidentiality,
                        'receiver' => $request->receiver,
                        'file_path' => $path,
                        'description' => $request->description,
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