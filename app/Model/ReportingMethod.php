<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ReportingMethod extends Model
{
    protected $table = 'reporting_methods';
    protected $guarded = '[id]';
    public $timestamps = false;
}
