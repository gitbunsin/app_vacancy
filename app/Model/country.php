<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class country extends Model
{

    public $table = 'countries';
    public  $guarded = ['id'];
    public $timestamps  = false;
    //
}
