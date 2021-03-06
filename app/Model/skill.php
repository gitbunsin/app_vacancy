<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class skill extends Model
{
    protected $table = 'skills';
    protected $guarded = ['id'];
    public $timestamps = false;
    
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
