<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class candidateHistory extends Model
{
    public $table = 'candidate_histories';
    public $guarded = ['id'];
    public $timestamps = false;

    public function canidate()
    {
        return $this->belongsTo(canidate::class);
    }
}
