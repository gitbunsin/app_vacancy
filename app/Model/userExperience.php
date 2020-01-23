<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class userExperience extends Model
{
    protected $table = 'user_experiences';
    protected  $guarded = ['id'];
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function jobTitle()
    {
        return $this->belongsTo(jobTitle::class,'job_title_id','id');
    }
}
