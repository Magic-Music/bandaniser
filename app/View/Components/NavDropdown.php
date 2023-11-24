<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavDropdown extends Component
{
    public function __construct(
        public string $id,
        public string $title,
        public string $action,
        public array $items,
    ) {}

    public function render(): View|Closure|string
    {
        return view('components.nav-dropdown');
    }
}
