<?php

namespace App\Entities;

use App\Entities\Entity;

class GigEntity extends Entity
{
    public int $venue_id;
    public ?int $agency_id = null;
    public string $date;
    public ?string $price = null;
    public bool $confirmed = false;
    public ?string $arrival = null;
    public ?string $note = null;
}
