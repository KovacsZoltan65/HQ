<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subdomain extends Model
{
    use HasFactory, 
            SoftDeletes;
    
    protected $fillable = [
        'subdomain','url','name',
        'db_host','db_port','db_name','db_user','db_password',
        'notification','state_id','is_mirror','sso','access_controll_system','last_export',
    ];
}
