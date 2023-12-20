<?php

namespace App\View\Components;

use App\Models\Agency;
use App\Models\Member;
use App\Models\Venue;
use App\Services\MemberService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CreateModal extends Component
{
    public array $venues;
    public array $agencies;
    public array $members;

    public function __construct(private MemberService $memberService)
    {
        $this->venues = Venue::select('id', 'name')->pluck('name', 'id')->toArray();
        $this->agencies = Agency::select('id', 'name')->pluck('name', 'id')->toArray();
        $this->members = $this->memberService->getMemberNames();
    }

    public function render(): View|Closure|string
    {
        return view('components.create-modal');
    }
}
