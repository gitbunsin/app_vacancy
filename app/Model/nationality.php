<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class nationality extends Model
{
    protected $table = 'nationalities';
    protected $guarded = ['id'];
    public $timestamps = false;
    
}
