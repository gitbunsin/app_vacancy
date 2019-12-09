<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
class subUnit extends Model
{
    use NodeTrait;
    protected $table = 'sub_units';
    protected $guarded = ['id'];
    public $timestamps = false;
    
    // public function admin()
    // {
    //     return $this->belongsTo(subUnit::class);
    // }
}
