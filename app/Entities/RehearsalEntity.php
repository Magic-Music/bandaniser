<?php

namespace App\Entities;

class RehearsalEntity extends Entity
{
    public string $date;
    public ?string $time = null;
    public ?string $location = null;
    public ?string $note = null;
}
