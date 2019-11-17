<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class language extends Model
{
    protected $table = 'languages';
    protected $guarded = ['id'];
    public $timestamps = false;
    
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
