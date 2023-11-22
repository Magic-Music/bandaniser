<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
