<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class FieldTypes extends Pivot
{
    protected $table = 'field_types';
    
    public $timestamps = false;

    protected $fillable = ['field_id', 'type_id'];

    public function field()
    {
        return $this->belongsTo(SportField::class);
    }

    public function type()
    {
        return $this->belongsTo(SportFieldType::class);
    }
}
