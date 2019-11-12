<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EmploymentStatus extends Model
{
    public $table = 'employment_statuses';
    public $guarded = ['id'];
    public $timestamps = false;
}
