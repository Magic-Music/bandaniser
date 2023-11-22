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

    public function borderRight()
    {
        return $this->day['lastInRow'] ?? null ? '' : 'border-right-0';
    }

    public function gigs(): array
    {
        return $this->day['gigs'] ?? [];
    }

    public function availability(): array
    {
        return $this->day['availability'] ?? [];
    }

    public function rehearsals(): array
    {
        return $this->day['rehearsals'] ?? [];
    }
}
