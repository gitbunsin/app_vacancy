<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Model\UserCv;
use App\Model\userEducation;
use App\Model\userTraningSkill;
use App\Model\userExperience;
use App\Model\userLanguage;
use App\Model\userSkill;
use App\Model\userReference;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
    public $timestamps = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    

    public function job()
    {
        return $this->belongsToMany(job::class);
    }
    public function attachment()
    {
        return $this->hasMany(userCv::class);
    }
    public function vacancy()
    {
        return $this->belongsToMany(vacancy::class)->withPivot('applied_date','status');
    }
    public function education()
    {
        return $this->hasMany(userEducation::class);
    }
    public function traning()
    {
        return $this->hasMany(userTraningSkill::class);
    }
    public function experience()
    {
        return $this->hasMany(userExperience::class);
    }
    public function language()
    {
        return $this->hasMany(userLanguage::class);
    }
    public function skill()
    {
        return $this->hasMany(userSkill::class);
    }
    public function reference()
    {
        return $this->hasMany(userReference::class);
    }
}
