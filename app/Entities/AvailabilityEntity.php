<?php

namespace App\Entities;

class AvailabilityEntity extends Entity
{
    public string $date;
    public int $memberId;
    public int $length;
    public ?string $note = null;
}
