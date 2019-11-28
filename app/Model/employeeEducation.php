<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class employeeEducation extends Model
{
    protected $table = 'employee_education';
    protected $guarded = ['id'];
    public $timestamps = false;
    public function employee()
    {
        return $this->belongsTo(employees::class);
    }
}
