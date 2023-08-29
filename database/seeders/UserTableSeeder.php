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
            'username'=>'sajjad294',
            'first_name'=>'Md Sajjad',
            'last_name'=>'Hossain',
            'email'=>'sajjad@gmail.com',
            'password'=>Hash::make('password'),
            'status'=>1,
        ]);
    }
}