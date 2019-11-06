<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class jobTitle extends Model
{
    //
    protected $table = 'job_titles';
    protected $guarded = ['id'];
    public $timestamps = false;
    
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
