<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class userLanguage extends Model
{
    protected $table = 'user_languages';
    protected  $guarded = ['id'];
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
