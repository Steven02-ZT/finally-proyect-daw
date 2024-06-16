<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $table = 'memberships';

    protected $fillable = ['level', 'price', 'description'];

    public function benefits()
    {
        return $this->belongsToMany(Benefit::class, 'memberships_benefits');
    }
}
