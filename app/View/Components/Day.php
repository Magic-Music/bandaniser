<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Day extends Component
{
    public function __construct(
        public array $day
    ) {}

    public function render(): View|Closure|string
    {
        return view('components.day');
    }

    public function dateNumber(): ?int
    {
        return $this->day['date'] ?? null;
    }

    public function dayName(): ?string
    {
        return $this->day['day'] ?? ' ';
    }
}
