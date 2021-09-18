<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SportFieldType extends Model
{
    public $timestamps = false;

    protected $fillable = ['type', 'max_players'];

    public function fields()
    {
        return $this->hasMany(FieldTypes::class);
    }
}
