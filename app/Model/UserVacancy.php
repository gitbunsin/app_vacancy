<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\vacancy;
class UserVacancy extends Model
{
    protected $table = 'user_vacancy';
    protected $guarded = ['id'];
    public $timestamps = false;
    public function vacancy()
    {
        return $this->belongsTo(vacancy::class,'user_id','id');
    }

}
