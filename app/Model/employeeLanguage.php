<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class employeeLanguage extends Model
{
    public $table = 'employee_languages';
    public $guarded = ['id'];
    public $timestamps = false;
}
