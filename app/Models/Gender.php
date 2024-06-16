<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $table = 'genders';

    protected $fillable = ['name', 'description'];

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'movies_genders');
    }
}
