<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guarded = [];
    protected $table = 'mst_user';
    protected $rememberTokenName = 'api_token';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'api_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    function roles()
    {
        return $this->belongsToMany(Role::class, 'mst_role_user');
    }

    function hasRole($role)
    {
        return $this->roles()->where('nama', $role)->count() == 1;
    }

    function scopeCekUsername($query, $username)
    {
        return $query->whereRaw('username = ?', $username)->first();
    }

    function getRememberToken()
    {
        return 'api_token';
    }

    function setRememberToken($value)
    {
        $this->api_token = $value;
    }

    function getRememberTokenName()
    {
        return 'api_token';
    }
}
