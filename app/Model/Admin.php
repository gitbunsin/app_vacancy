<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable

{

    use Notifiable;
    use SoftDeletes;
    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    protected $fillable = [
        'name', 'email', 'password',
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

    public function is_admin()
    {
        return $this->role_id == 1;
    }

}