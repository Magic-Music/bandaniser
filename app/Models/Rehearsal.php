<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder as QueryBuilder;

/**
 * @mixin EloquentBuilder
 * @mixin QueryBuilder
 */
class Rehearsal extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'time',
        'location',
        'note',
    ];

    protected $casts = [
        'time' => 'datetime:H:i',
    ];
}
