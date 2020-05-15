<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Model\vacancy;
class userBookmark extends Model
{
    protected $table = 'user_bookmarks';
    protected  $guarded = ['id'];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function vacancy()
    {
        return $this->belongsTo(vacancy::class,'vacancy_id','id');
    }
}
