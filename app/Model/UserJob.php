<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserJob extends Model
{
    //
    protected $table = 'user_job';
    protected  $guarded = ['user_id','job_id'];
    public $timestamps = false;

}
