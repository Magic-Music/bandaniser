<?php

namespace App\Entities;

use App\Exceptions\EntityException;

class Entity
{
    public function set(array $data): self
    {
        foreach ($data as $key => $value) {
            throw_if(!property_exists($this, $key), new EntityException("Entity property $key doesn't exist"));

            $this->$key = $value;
        }

        return $this;
    }

    public function get()
    {
        return get_object_vars($this);
    }

    public function __set($key, $value)
    {
        $this->set([$key => $value]);
    }
}
