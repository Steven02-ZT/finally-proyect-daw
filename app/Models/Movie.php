<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table = 'movies';

    protected $fillable = ['title', 'year', 'description', 'classification_id', 'image_url', 'vide_url'];

    public function classification()
    {
        return $this->belongsTo(Classification::class);
    }

    public function genders()
    {
        return $this->belongsToMany(Gender::class, 'movies_genders');
    }
}
