<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolProduct extends Model
{
    protected $fillable = [
        'school_id', 'product_id', 'price', 'value'
    ];

    public function school()
    {
        return $this->belongsTo(\App\School::class);
    }

    public function product()
    {
        return $this->belongsTo(\App\Product::class);
    }

    public function getValueAttribute()
    {
        return $this->price / $this->school->circulation;
    }
}
