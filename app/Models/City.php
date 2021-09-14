<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $timestamps = false;

    protected $fillable = ['name', 'postal_code', 'country_id'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function fields()
    {
        return $this->hasMany(SportField::class);
    }
}
