<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $table ='posts';
    protected $guarded = [];
    // public $timestamps = false;
    public function getFeatureImageUriAttribute(){
        if ($this->feature_image){
            return asset('storage/uploads/images/blog/full/'.$this->feature_image);
        }
        return asset('assets/images/placeholder.png');
    }
    public function getFeatureImageThumbUriAttribute(){
        if ($this->feature_image){
            return asset('assets/uploads/images/blog/thumb/'.$this->feature_image);
        }
        return asset('assets/images/placeholder.png');
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
