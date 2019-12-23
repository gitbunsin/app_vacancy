<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class interview extends Model
{
    //
    public $table = 'interviews';
    public $guarded = ['id'];
    public $timestamps = false;
    public function employee(){
        return $this->belongsToMany(employee::class);
    }
}
