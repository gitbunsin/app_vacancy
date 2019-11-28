<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class employeeSkill extends Model
{
    public $table = 'employee_skills';
    public $guarded = ['id'];
    public $timestamps = false;
    
}
