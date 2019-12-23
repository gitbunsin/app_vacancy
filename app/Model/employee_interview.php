<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class employee_interview extends Model
{
    public $table = 'employee_interview';
    public $guarded = ['id'];
    public $timestamps = false;
}
