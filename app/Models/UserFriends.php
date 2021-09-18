<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserFriends extends Model
{
    public $timestamps = false;

    protected $fillable = ['user_id', 'friend_id', 'is_favorite', 'has_accepted'];

    public function friend()
    {
        return $this->belongsTo(User::class, 'friend_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
}
