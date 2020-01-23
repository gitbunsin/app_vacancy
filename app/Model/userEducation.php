<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
class userEducation extends Model
{
    protected $table = 'user_education';
    protected  $guarded = ['id'];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
