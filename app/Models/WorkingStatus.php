<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkingStatus extends Model
{
    use HasFactory;
    protected $fillable=[
        'company_id',
        'user_id',
        'name',
        'short_name',
        'status',
    ];
}
