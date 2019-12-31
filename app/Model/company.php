<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    //
    protected $table = 'companies';
    protected $guarded =['id'];
    public $timestamps = false;
    public function city()
    {
        return $this->belongsTo(city::class,'city_id','id');
    }
    public function country()
    {
        return $this->belongsTo(country::class,'country_id','id');
    }
}
