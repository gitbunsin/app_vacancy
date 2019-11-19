<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EmployeeEmergencyContacts extends Model
{
    public $table = 'employee_emergency_contacts';

    public  $guarded = ['id'];
    public $timestamps  = false;

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
