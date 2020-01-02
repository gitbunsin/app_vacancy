<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class employeeTerminate extends Model
{
    public $table = 'employee_termination';
    public $guarded = ['id'];
    public $timestamps = false;

    public function terminationResons()
    {
        return $this->belongsTo(terminationResons::class,'id','termination_id');
    }
}
