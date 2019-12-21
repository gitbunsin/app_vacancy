<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    protected $table ='locations';
    protected $guarded ='[id]';

    public $timestamps = false;
    public function province()
    {
        return $this->belongsTo(province::class,'province_code','id');
    }
    public function city()
    {
        return $this->belongsTo(city::class,'city_code','id');
    }
    public function country()
    {
        return $this->belongsTo(country::class,'country_code','id');
    }
}
