<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'email',
        'username',
        'password',
        'country_id',
        'role_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function friend()
    {
        return $this->hasMany(UserFriends::class);
    }

    public function field()
    {
        return $this->hasMany(SportField::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
