<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\vacancy;
class JobCategory extends Model
{
    protected $table = 'job_categories';
    protected $guarded = ['id'];
    public $timestamps = false;
    
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    // public function job_count()
    // {
    //         return $this->belongsToMany(vacancy::class)->whereStatus(1)->count();
    // }
}
