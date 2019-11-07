<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class currency_pay_grade extends Model
{
    protected $table = "currency_pay_grade";
    public  $guarded = ['id'];
    public $timestamps  = false;
}
