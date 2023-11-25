<?php

namespace App\View\Components;

use App\Models\Agency;
use App\Models\Venue;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CreateModal extends Component
{
    public array $venues;
    public array $agencies;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->venues = Venue::select('id', 'name')->pluck('name', 'id')->toArray();
        $this->agencies = Agency::select('id', 'name')->pluck('name', 'id')->toArray();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.create-modal');
    }
}
