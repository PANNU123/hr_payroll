<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Religions;
use App\Models\Title;
use App\Models\WorkingStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HrmTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::create([
            'company_id'=>1,
            'user_id'=>1,
            'name'=>'Department A',
            'short_name'=>'A',
        ]);
        //end department
        //manage designation
        Designation::create([
            'company_id'=>1,
            'user_id'=>1,
            'name'=>'Software Engineer',
            'short_name'=>'SE',
            'designation_code'=>001
        ]);
        //end designation

        //manage title
        Designation::create([
            'company_id'=>1,
            'user_id'=>1,
            'name'=>'Frontend Design',
            'short_name'=>'FD',
            'designation_code'=>001
        ]);
        //end title

        //manage title
        Title::create([
            'company_id'=>1,
            'user_id'=>1,
            'name'=>'Mr',
        ]);
        //end title


        //manage title
        Religions::create([
            'user_id'=>1,
            'name'=>'Islam',
        ]);
        Religions::create([
            'user_id'=>1,
            'name'=>'Hindu',
        ]);
        Religions::create([
            'user_id'=>1,
            'name'=>'buddha',
        ]);
        Religions::create([
            'user_id'=>1,
            'name'=>'kristen',
        ]);

//        LeaveCategory::create([
//            'user_id'=>1,
//            'company_id'=>1,
//            'name'=>'Casual',
//            'short_code'=>'Cas',
//        ]);
//        LeaveCategory::create([
//            'user_id'=>1,
//            'company_id'=>1,
//            'name'=>'Sick',
//            'short_code'=>'Si',
//        ]);
//        LeaveCategory::create([
//            'user_id'=>1,
//            'company_id'=>1,
//            'name'=>'Earn',
//            'short_code'=>'Ea',
//        ]);
//        LeaveCategory::create([
//            'user_id'=>1,
//            'company_id'=>1,
//            'name'=>'Alternative',
//            'short_code'=>'Alt',
//        ]);
//        LeaveCategory::create([
//            'user_id'=>1,
//            'company_id'=>1,
//            'name'=>'Maternity',
//            'short_code'=>'Mat',
//        ]);
//        LeaveCategory::create([
//            'user_id'=>1,
//            'company_id'=>1,
//            'name'=>'Training',
//            'short_code'=>'Trn',
//        ]);
//        LeaveCategory::create([
//            'user_id'=>1,
//            'company_id'=>1,
//            'name'=>'Special',
//            'short_code'=>'Spe',
//        ]);
//        LeaveCategory::create([
//            'user_id'=>1,
//            'company_id'=>1,
//            'name'=>'Without Pay Leave',
//            'short_code'=>'WPL',
//        ]);

        WorkingStatus::create([
            'user_id'=>1,
            'company_id'=>1,
            'name'=>'Regular',
        ]);
        WorkingStatus::create([
            'user_id'=>1,
            'company_id'=>1,
            'name'=>'Provisional',
        ]);
        WorkingStatus::create([
            'user_id'=>1,
            'company_id'=>1,
            'name'=>'Contractual',
        ]);
        WorkingStatus::create([
            'user_id'=>1,
            'company_id'=>1,
            'name'=>'Resigned',
        ]);
        WorkingStatus::create([
            'user_id'=>1,
            'company_id'=>1,
            'name'=>'Dismissed',
        ]);
        WorkingStatus::create([
            'user_id'=>1,
            'company_id'=>1,
            'name'=>'Discontinued',
        ]);

//        LeaveRegister::create([
//            'company_id'=>1,
//            'leave_year'=>Carbon::now(),
//            'user_id'=>1,
//            'leave_id'=>1,
//            'leave_eligible'=>15,
//            'leave_enjoyed'=>5,
//            'leave_balance'=>10,
//        ]);
//        LeaveRegister::create([
//            'company_id'=>1,
//            'leave_year'=>Carbon::now(),
//            'user_id'=>1,
//            'leave_id'=>2,
//            'leave_eligible'=>10,
//            'leave_enjoyed'=>5,
//            'leave_balance'=>5,
//        ]);
//        LeaveRegister::create([
//            'company_id'=>1,
//            'leave_year'=>Carbon::now(),
//            'user_id'=>1,
//            'leave_id'=>3,
//            'leave_eligible'=>10,
//            'leave_enjoyed'=>5,
//            'leave_balance'=>5,
//        ]);
//        LeaveRegister::create([
//            'company_id'=>1,
//            'leave_year'=>Carbon::now(),
//            'user_id'=>1,
//            'leave_id'=>4,
//            'leave_eligible'=>15,
//            'leave_enjoyed'=>5,
//            'leave_balance'=>10,
//        ]);
//        LeaveRegister::create([
//            'company_id'=>1,
//            'leave_year'=>Carbon::now(),
//            'user_id'=>1,
//            'leave_id'=>5,
//            'leave_eligible'=>10,
//            'leave_enjoyed'=>5,
//            'leave_balance'=>5,
//        ]);
//        LeaveRegister::create([
//            'company_id'=>1,
//            'leave_year'=>Carbon::now(),
//            'user_id'=>1,
//            'leave_id'=>6,
//            'leave_eligible'=>12,
//            'leave_enjoyed'=>5,
//            'leave_balance'=>7,
//        ]);
//        LeaveRegister::create([
//            'company_id'=>1,
//            'leave_year'=>Carbon::now(),
//            'user_id'=>1,
//            'leave_id'=>7,
//            'leave_eligible'=>10,
//            'leave_enjoyed'=>5,
//            'leave_balance'=>5,
//        ]);
//        LeaveRegister::create([
//            'company_id'=>1,
//            'leave_year'=>Carbon::now(),
//            'user_id'=>1,
//            'leave_id'=>8,
//            'leave_eligible'=>8,
//            'leave_enjoyed'=>5,
//            'leave_balance'=>3,
//        ]);
    }
}
