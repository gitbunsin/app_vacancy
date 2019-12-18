<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class pricing extends Model
{
    protected $table ='pricings';
    protected $guarded = [];
    public $timestamps = false;
}
