<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'user_id',
        'designation_code',
        'name',
        'short_name',
        'description',
        'status',
    ];
}
