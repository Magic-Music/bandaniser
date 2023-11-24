<?php

namespace App\View\Components;

use App\Models\Band;
use App\Models\Member;
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
        $bandName = Band::first()?->name ?: null;
        $this->bandName = 'Bandaniser' . ($bandName ? " - $bandName" : '');
    }

    public function render(): View|Closure|string
    {
        return view('components.navbar');
    }
}
