<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class license extends Model
{
    protected $table = 'licenses';
    protected $guarded = ['id'];
    public $timestamps = false;
    
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
