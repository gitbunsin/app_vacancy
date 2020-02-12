<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
class userEmployee extends Authenticatable
{

    protected $table = 'user_employee';
    protected  $guarded = ['id'];
    public $timestamps = false;
    use Notifiable;
    use SoftDeletes;
    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    protected $fillable = [
        'username', 'email', 'password',
    ];
    protected $dates = ['deleted_at'];



    /**

     * The attributes that should be hidden for arrays.

     *

     * @var array

     */

    protected $hidden = [

        'password', 'remember_token',

    ];

    public function is_employee()
    {
        return $this->role_id == 3;
    }

}