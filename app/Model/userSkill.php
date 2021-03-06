<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class userSkill extends Model
{
    protected $table = 'user_skills';
    protected  $guarded = ['id'];
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
