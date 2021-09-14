<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SportField extends Model
{
    protected $fillable = ['address', 'city_id', 'country_id','longitude', 'latitude', 'type_id', 'number_of_courts'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function type()
    {
        return $this->belongsTo(SportFieldType::class);
    }

    public function schedule()
    {
        return $this->belongsToMany(UserSchedule::class);
    }
    
}
