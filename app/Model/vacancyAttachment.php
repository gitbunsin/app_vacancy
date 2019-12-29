<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class vacancyAttachment extends Model
{
    protected $table = 'vacancy_attachments';
    protected  $guarded = '[id]';

    public $timestamps = false;
    public function vacancy(){

        return $this->belongsTo(vacancy::class);
    }
}
