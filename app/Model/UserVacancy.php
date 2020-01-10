<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserVacancy extends Model
{
    protected $table = 'user_vacancy';
    protected $guarded = ['id'];
    public $timestamps = false;

}
