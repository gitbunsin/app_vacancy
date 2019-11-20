<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class vacancy extends Model
{
    protected $table = 'vacancies';
    protected $guarded = ['id'];

//    public $timestamps = false;
    public function user(){

        return $this->belongsToMany(User::class);
    }
    public function jobAttachment(){

        return $this->belongsToMany(jobAttachment::class);
    }
    public function admin(){

        return $this->belongsTo(Admin::class,'admin_id','id');
    }
    public function jobType(){

        return $this->belongsTo(JobType::class,'job_type_id','id');
    }
    public function location()
    {

        return $this->belongsTo(location::class,'location_id','id');
    }
    public function category(){

        return $this->belongsTo(jobCategory::class ,'category_id','id');
    }
    public function skill()
    {
        return $this->belongsToMany(skill::class);
    }
    public function company()
    {
        return $this->belongsTo(company::class,'company_id','id');
    }
}
