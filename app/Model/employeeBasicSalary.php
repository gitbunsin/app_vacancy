<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class employeeBasicSalary extends Model
{
    protected $table = 'employee_basic_salaries';
    protected $guarded = ['id'];
    public $timestamps = false;
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    public function employee()
    {
        return $this->belongsTo(employee::class);
    }
}
