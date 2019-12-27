<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class province extends Model
{
    public $table = 'provinces';
    public $guarded = ['id'];
    public $timestamps = false;
    public function location()
    {
        return $this->belongsToMany(location::class);
    }
    public function vacancy()
    {
        return $this->belongsToMany(vacancy::class);
    }
}
