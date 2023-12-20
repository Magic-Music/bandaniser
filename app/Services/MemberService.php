<?php

namespace App\Services;

use App\Entities\MemberEntity;
use App\Models\Member;
use Illuminate\Database\Eloquent\Collection;

class MemberService
{
    public function getMembers(): Collection
    {
        return Member::all();
    }

    public function getMemberNames(): array
    {
        return Member::select('id', 'name')->pluck('name', 'id')->toArray();
    }

    public function addMember(MemberEntity $member): void
    {
        Member::create($member->get());
    }

    public function deleteMember(int $memberId): void
    {
        Member::where('id', $memberId)->delete();
    }

    public function updateMember(int $memberId, MemberEntity $member): void
    {
        Member::where('id', $memberId)->update($member->get());
    }
}
