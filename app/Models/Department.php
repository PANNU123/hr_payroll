<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'company_id',
        'name',
        'short_name',
        'department_code',
        'started_from',
        'top_rank',
        'report_to',
        'headed_by',
        'second_man',
        'status'
    ];
}
