<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name'];

    public function schoolProducts()
    {
        return $this->hasMany(\App\SchoolProduct::class);
    }
}
