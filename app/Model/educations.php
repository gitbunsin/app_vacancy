<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class educations extends Model
{
    protected $table = 'educations';
    protected $guarded = ['id'];
    public $timestamps = false;
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
