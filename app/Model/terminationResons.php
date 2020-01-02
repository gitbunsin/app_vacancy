<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\employee;
class terminationResons extends Model
{
    protected $table = 'termination_resons';
    protected $guarded = '[id]';
    public $timestamps = false;
}
