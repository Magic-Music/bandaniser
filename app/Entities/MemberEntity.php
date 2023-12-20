<?php

namespace App\Entities;

use App\Entities\Entity;

class MemberEntity extends Entity
{
    public string $name;
    public ?string $email = null;
}
