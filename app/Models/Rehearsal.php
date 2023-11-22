<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
