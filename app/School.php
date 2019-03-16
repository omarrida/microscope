<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'name', 'city', 'zip', 'circulation', 'state_id'
    ];

    public function state()
    {
        return $this->belongsTo(\App\State::class);
    }

    public function schoolProducts()
    {
        return $this->hasMany(\App\SchoolProduct::class);
    }
}
