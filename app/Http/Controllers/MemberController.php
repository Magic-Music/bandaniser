<?php

namespace App\Http\Controllers;

use App\Services\MemberService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MemberController extends Controller
{
    public function __construct(
        private MemberService $memberService
    )
    {}

    public function index(): View
    {
        $members = $this->memberService->getMembers();

        return view('members', ['active' => 'members', 'members' => $members]);
    }
}
