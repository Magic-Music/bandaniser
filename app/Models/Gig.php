<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gig extends Model
{
    use HasFactory;

    protected $fillable = [
        'venue_id',
        'agency_id',
        'member_id',
        'date',
        'arrival',
        'soundcheck_finish',
        'sets',
        'set_times',
        'note',
    ];
}
