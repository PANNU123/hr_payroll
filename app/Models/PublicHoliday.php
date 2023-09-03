<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicHoliday extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'user_id',
        'hYear',
        'from_date',
        'to_date',
        'count',
        'title',
        'description',
        'status',
    ];
}
