<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class payPeriod extends Model
{
    protected $table = "pay_periods";
    public  $guarded = ['id'];
    public $timestamps  = false;
}
