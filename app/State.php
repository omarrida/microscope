<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\State
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\State newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\State newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\State query()
 * @mixin \Eloquent
 */
class State extends Model
{
    protected $fillable = ['abbreviation'];

    public function schools()
    {
        return $this->hasMany(\App\School::class);
    }
}