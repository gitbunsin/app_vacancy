<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class userHobby extends Model
{
    protected $table = 'user_hobbies';
    protected  $guarded = ['id'];
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
