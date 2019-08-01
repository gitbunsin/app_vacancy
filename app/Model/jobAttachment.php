<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class jobAttachment extends Model
{
    protected $table = 'job_attachments';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function job(){

        return $this->belongsTo(job::class,'job_id','id');
    }



}
