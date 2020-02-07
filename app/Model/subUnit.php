<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
class subUnit extends Model
{
    // use NodeTrait;
    protected $table = 'sub_units';
    protected $guarded = ['id'];
    public $timestamps = false;
    
    public $fillable = ['title','parent_id'];
    /**
     * Get the index name for the model.
     *
     * @return string
    */
    public function childs() {
        // return $this->hasMany(subUnit::class , 'parent_id','id');
        return $this->hasMany('App\Model\subUnit','parent_id','id') ;
    }
    // public function admin()
    // {
    //     return $this->belongsTo(subUnit::class);
    // }
}
