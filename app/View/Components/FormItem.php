<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormItem extends Component
{
    public function __construct(
        public string $id,
        public string $type = 'text',
        public ?string $label = null,
        public ?string $value = null,
        public ?string $placeholder = null,
        public ?string $containerId = null,
    ) {}

    public function render(): View|Closure|string
    {
        return view('components.form-item');
    }
}
