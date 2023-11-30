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
class Availability extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'date',
        'note',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
