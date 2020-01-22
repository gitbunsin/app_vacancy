<?php

namespace App\Model;
use App\Model\employee;
use Illuminate\Database\Eloquent\Model;

class employeeContract extends Model
{
    protected $table = 'employee_contracts';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function employee()
    {
        return $this->belongsTo(employee::class);
    }
}
