<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    public $table = 'cities';
    public $guarded = ['id'];
    public $timestamps = false;

    public function location()
    {
        return $this->belongsToMany(location::class);
    }
}
