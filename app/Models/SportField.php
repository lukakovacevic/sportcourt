<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SportField extends Model
{
    protected $fillable = [
        'address',
        'field_number',
        'city_id', 
        'country_id',
        'longitude', 
        'latitude', 
        'number_of_courts'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function schedule()
    {
        return $this->belongsToMany(UserSchedule::class);
    }
    
    public function type()
    {
        return $this->hasManyThrough(SportFieldType::class, FieldTypes::class, 'field_id', 'id', 'id', 'type_id', );
    }

}
