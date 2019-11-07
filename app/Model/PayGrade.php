<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PayGrade extends Model
{
    protected $table = "pay_grades";
    public  $guarded = ['id'];
    public $timestamps  = false;

    public function currency()
    {
        return $this->belongsToMany(Currency::class)->withPivot('max_salary','min_salary');
    }
    //
}
