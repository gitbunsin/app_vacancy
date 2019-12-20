<?php

namespace App\Model;
use App\Admin;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    protected $guarded = [];

    public function pricing()
    {
        return $this->belongsToMany(pricing::class);
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
