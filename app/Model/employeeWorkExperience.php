<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class employeeWorkExperience extends Model
{
    public $table = 'employee_work_experiences';
    public $guarded = ['id'];
    public $timestamps = false;
}
