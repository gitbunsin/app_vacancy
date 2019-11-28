<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    protected $table = 'employees';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function admin()
    {
        return $this->belongsTo(Admin::class,'admin_id','id');
    }
    public function salary()
    {
        return $this->hasMany(employeeBasicSalary::class);
    }
    public function emergencyContact()
    {
        return $this->hasMany(EmployeeEmergencyContacts::class);
    }
    public function attachment()
    {
        return $this->hasMany(EmployeeAttachment::class);
    }
    public function interview(){

        return $this->hasMany(Interview::class);
    }
    public function workexperience()
    {
        return $this->hasMany(employeeWorkExperience::class);
    }
    public function employeeEducation()
    {
        return $this->hasMany(employeeEducation::class);
    }
}
