<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table = "currencies";
    public  $guarded = ['id'];
    public $timestamps  = false;

    public function payGrade()
    {
        return $this->belongsToMany(PayGades::class)->withPivot('max_salary','min_salary');
    }
}
