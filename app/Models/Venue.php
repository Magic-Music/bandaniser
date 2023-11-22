<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contact',
        'phone',
        'email',
        'address',
        'town',
        'postcode',
        'note',
    ];

    public function gigs()
    {
        return $this->hasMany(Gig::class);
    }
}
