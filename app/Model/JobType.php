<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    //
    protected $table = 'job_types';
    protected $guarded = '[id]';
    public $timestamps = false;
}
