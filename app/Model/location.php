<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    protected $table ='locations';
    protected $guarded ='[id]';

    public $timestamps = false;
    //
}
