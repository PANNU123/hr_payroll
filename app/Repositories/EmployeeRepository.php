<?php
namespace App\Repositories;


use App\Models\EmployeePersonal;
use App\Models\EmployeeProfessional;
use App\Models\Title;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeRepository {
    protected $model;

    public function __construct(User $model)
    {
        $this->model=$model;
    }

    public function getAll(){
        return User::with('personaldata','professionaldata','professionaldata.designation','professionaldata.department','professionaldata.working')->get();
    }
    public function store($request){

//        if ($request->hasFile('avatar')) {
//            $avatar =  fileUpload($request->avatar , "profile");
//        }else{
//            $avatar = 'avatar';
//        }
//        if ($request->hasFile('signature')) {
//            $signature =  fileUpload($request->signature , "signature");
//        }else{
//            $signature = 'signature';
//        }
        $avatar = 'avatar';
        $signature = 'signature';
        $companyId = \App\Models\User::where('id', auth()->user()->id)->value('company_id');

        $user = User::create([
            'company_id'=>$companyId,
            'username' => $request->first_name.' '.$request->first_name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile'=>$request->mobile,
            'machine_user_id'=>$request->machine_user_id,
            'gender'=>$request->gender,
            'date_of_birth'=>$request->date_of_birth,
            'password' => Hash::make('12345678'),
            'avatar'=>$avatar,
        ]);
        if($user){
            $personal_data = EmployeePersonal::create([
                'company_id'=>$companyId,
                'user_id'=>$user->id,
                'title_id'=>$request->title_id,
                'religion_id'=>$request->religion_id,
                'signature'=>$signature,
                'pr_address'=>$request->pr_address,
                'pr_district'=>$request->pr_district,
                'pr_police_station'=>$request->pr_police_station,
                'pr_post_code'=>$request->pr_post_code,
                'pm_address'=>$request->pm_address,
                'pm_district'=>$request->pm_district,
                'pm_police_station'=>$request->pm_police_station,
                'pm_post_code'=>$request->pm_post_code,
                'm_address'=>$request->m_address,
                'm_district'=>$request->m_district,
                'm_police_station'=>$request->m_police_station,
                'm_post_code'=>$request->m_post_code,
                'biography'=>$request->biography,
                'father_name'=>$request->father_name,
                'mother_name'=>$request->mother_name,
                'spouse_name'=>$request->spouse_name,
                'blood_group'=>$request->blood_group,
                'last_education'=>$request->last_education,
                'prof_speciality'=>$request->prof_speciality,
                'national_id'=>$request->national_id,
                'is_printed'=>isset($request->is_printed) ? $request->is_printed : 0,
                'status'=>$request->status,
                'created_by'=>auth()->user()->id,
            ]);
            if($personal_data){
                $professional_data = EmployeeProfessional::create([
                    'user_id'=>$user->id,
                    'department_id'=>$request->department_id,
                    'section_id'=>$request->section_id,
                    'designation_id'=>$request->designation_id,
                    'working_status_id'=>$request->working_status_id,
                    'bank_id'=>$request->bank_id,
                    'pf_no'=>isset($request->pf_no) ?? 0,
                    'report_to'=>$request->report_to,
                    'joining_date'=>$request->joining_date,
                    'overtime'=>isset($request->overtime) ?? 0,
                    'overtime_note'=>isset($request->overtime_note) ?? 0,
                    'transport'=>isset($request->transport) ?? 0,
                    'transport_note'=>$request->transport_note,
                    'pay_grade'=>$request->pay_grade,
                    'pay_schale'=>isset($request->pay_schale) ?? 0,
                    'confirm_probation'=>isset($request->confirm_probation) ?? "P",
                    'confirm_period'=>$request->confirm_period,
                    'bank_acc_no'=>$request->bank_acc_no,
                    'status_change_date'=>$request->status_change_date,
                    'created_by'=>auth()->user()->id,
                ]);
            }
        }


        if ($professional_data) {
            $message = "Employee Save Successfully";
            return ['status' => true, 'message' => $message];
        }else{
            $message = "Does not insert";
            return ['status' => false, 'message' => $message];
        }
    }
    public function edit(int $id){
        return $this->model::with('personaldata','professionaldata','professionaldata.designation','professionaldata.department','professionaldata.working')->find($id);
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
               $data = $this->model::updateOrCreate(
                   ['id' =>isset( $request->id)?  $request->id : ''],
                   [
                        'name' => $request->name,
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