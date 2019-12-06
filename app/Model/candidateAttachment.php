<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class candidateAttachment extends Model
{
    protected $table = 'candidate_attachments';
    protected  $guarded = '[id]';

    public $timestamps = false;
}
