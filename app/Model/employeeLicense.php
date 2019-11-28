<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class employeeLicense extends Model
{
    public $table = 'employee_licenses';
    public $guarded = ['id'];
    public $timestamps = false;
}
