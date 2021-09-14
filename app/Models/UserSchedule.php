<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSchedule extends Model
{
    protected $fillable = ['user_id', 'sport_field_id', 'time'];

    public function user()
    {
        return $this->belongsTo(City::class);
    }

    public function sportField()
    {
        return $this->hasMany(SportField::class);
    }
}
