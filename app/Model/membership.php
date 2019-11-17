<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class membership extends Model
{
    protected $table = 'memberships';
    protected $guarded = ['id'];
    public $timestamps = false;
    
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
