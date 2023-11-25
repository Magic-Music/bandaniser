<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;

/**
 * @mixin EloquentBuilder
 * @mixin QueryBuilder
 */
class Gig extends Model
{
    use HasFactory;

    protected $fillable = [
        'venue_id',
        'agency_id',
        'date',
        'price',
        'confirmed',
        'arrival',
        'note',
    ];

    protected $casts = [
        'arrival' => 'datetime:H:i',
    ];

    public function venue() {
        return $this->belongsTo(Venue::class);
    }
}
