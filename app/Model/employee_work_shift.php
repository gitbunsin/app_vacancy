<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class employee_work_shift extends Model
{
    protected $table = 'employee_work_shift';
    protected $guarded = ['id'];
    public $timestamps = false;
}
