<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class candidate extends Model
{
    protected $table = 'candidates';
    protected  $guarded = '[id]';

    public $timestamps = false;

    public function vacancy()
    {
        return $this->belongsToMany(vacancy::class)->withPivot('applied_date','status');
    }
    public function interview()
    {
        return $this->hasMany(interview::class);
    }
    public function candidateAttachment()
    {
        return $this->hasMany(candidateAttachment::class);
    }
    public function company()
    {
        return $this->belongsTo(company::class);
    }

    public function admin(){

        return $this->belongsTo(Admin::class);
    }
}
