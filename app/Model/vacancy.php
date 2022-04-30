<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
// use App\Model\Admin;;
class vacancy extends Model
{
    protected $table = 'vacancies';
    protected $guarded = ['id'];

    //public $timestamps = false;
    public function candidate(){

        return $this->belongsToMany(candidate::class)->withPivot('applied_date','status');
    }

    public function scopePending($query){
        return $query->where('status', '=', 0);
    }
    public function scopeApproved($query){
        return $query->where('status', '=', 1);
    }
   
    public function jobAttachment(){

        return $this->hasMany(vacancyAttachment::class);
    }
    public function admin(){

        return $this->belongsTo(Admin::class,'admin_id','id');
    }
    public function employee(){

        return $this->belongsTo(employee::class,'employee_id','id');
    }
    public function jobType(){

        return $this->belongsTo(JobType::class,'job_type_id','id');
    }
    public function location()
    {

        return $this->belongsTo(location::class,'location_id','id');
    }
    public function province()
    {

        return $this->belongsTo(province::class,'province_id','id');
    }
    public function category(){

        return $this->belongsTo(jobCategory::class ,'category_id','id');
    }
    public function jobTitle(){

        return $this->belongsTo(jobtitle::class ,'job_title_id','id');
    }
    public function skill()
    {
        return $this->belongsToMany(skill::class);
    }
    public function company()
    {
        return $this->belongsTo(company::class,'company_id','id');
    }
    public function interview()
    {
        return $this->hasMany(interview::class);
    }

}
