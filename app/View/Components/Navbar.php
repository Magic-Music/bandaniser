<?php

namespace App\View\Components;

use App\Models\Band;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    public function __construct(
        public ?string $bandName = null,
        public ?string $active = '',
    )
    {
        $this->bandName = Band::first()?->name ?: 'Bandaniser';
    }

    public function render(): View|Closure|string
    {
        return view('components.navbar');
    }
}
