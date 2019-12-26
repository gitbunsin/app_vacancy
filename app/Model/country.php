<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class country extends Model
{
    protected $table = 'countries';
    protected $guarded =['id'];
    public $timestamps = false;
    
}
