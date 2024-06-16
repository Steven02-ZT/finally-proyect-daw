<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

    protected $fillable = ['given_name', 'last_name', 'email', 'password', 'membership_id'];

    public function membership()
    {
        return $this->belongsTo(Membership::class);
    }
}
