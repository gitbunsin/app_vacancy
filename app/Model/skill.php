<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class skill extends Model
{
    public $table = 'skills';
    public $guarded = ['id'];
    public $timestamps = false;

    public function job()
    {
        return $this->belongsToMany(job::class);
    }
}
