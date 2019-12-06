<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class candidate_vacancy extends Model
{
    protected $table = 'candidate_vacancy';
    protected  $guarded = '[id]';

    public $timestamps = false;
}
