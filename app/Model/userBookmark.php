<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class userBookmark extends Model
{
    protected $table = 'user_bookmarks';
    protected  $guarded = ['id'];
    public $timestamps = false;

    // public function vacancy()
    // {
    //     return $this->belongsToMany(vacancy::class);
    // }
}
