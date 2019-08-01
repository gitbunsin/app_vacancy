<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class userCv extends Model
{
    protected $table = 'user_cvs';
    protected  $guarded = ['id'];
    public $timestamps = false;
    //
    public function user(){

        return $this->belongsTo(User::class,'user_id','id');
    }
}
