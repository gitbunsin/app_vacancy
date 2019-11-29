<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class employeeMembership extends Model
{
    public $table = 'employee_memberships';
    public $guarded = ['id'];
    public $timestamps = false;
    
}
