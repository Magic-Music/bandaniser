<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Form extends Component
{
    public function __construct(
        public string $id,
        public string $submit,
        public string $submitText = "Submit",
    ) {}

    public function render(): View|Closure|string
    {
        return view('components.form');
    }
}
