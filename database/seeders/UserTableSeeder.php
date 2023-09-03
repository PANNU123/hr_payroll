<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'company_id'=>1,
            'username'=>'sajjad294',
            'first_name'=>'Md Sajjad',
            'last_name'=>'Hossain',
            'email'=>'super@admin.com',
            'password'=>Hash::make('secret'),
            'status'=>1,
        ]);
    }
}