<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class workShift extends Model
{
    protected $table = 'work_shifts';
    protected  $guarded = ['id'];
    public $timestamps = false;

    public function employee()
    {
        return $this->belongsToMany(employee::class);
    }
}
