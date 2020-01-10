<?php

namespace App\Model;
use App\Admin;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    protected $guarded = ["id"];

    public function pricing()
    {
        return $this->belongsTo(pricing::class,'package_id','id');
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
