<?php

namespace App\Model;
use App\Model\employee;
use Illuminate\Database\Eloquent\Model;

class employee_reporting_to extends Model
{
    public $table = 'employee_reporting_method';
    public $guarded = ['id'];
    public $timestamps = false;

   
}
