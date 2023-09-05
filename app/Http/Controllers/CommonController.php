<?php

namespace App\Http\Controllers;

use App\Models\Bangladesh;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CommonController extends Controller
{
    public function getThana($district){
        $allThana = Bangladesh::where('district',$district)->select('thana','post_office')->get();
        return response()->json($allThana);
    }

    public function getPostCode($post_code){
        $parts = explode("-", $post_code);
        $thana = $parts[0]; // "Dhemra"
        $post_office = $parts[1]; // "Dhemra"
        $postCode = Bangladesh::where('thana',$thana)->where('post_office',$post_office)->select('post_code')->first();
        return response()->json($postCode);
    }
}
