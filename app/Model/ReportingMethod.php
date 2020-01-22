<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\employee;
class ReportingMethod extends Model
{
    protected $table = 'reporting_methods';
    protected $guarded = '[id]';
    public $timestamps = false;

    public function employee()
    {
        return $this->belongsToMany(employee::class);
    }
}
