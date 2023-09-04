<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;
    protected $fillable =[
        'company_id','user_id', 'notice_date',
        'expiry_date','title','description',
        'sender','type',
        'confidentiality','receiver',
        'file_path','status',
    ];
}
