<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class employee_reporting_to extends Model
{
    public $table = 'employee_reporting_tos';
    public $guarded = ['id'];
    public $timestamps = false;
}
