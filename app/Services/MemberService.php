<?php

namespace App\Services;

use App\Models\Member;

class MemberService
{
    private static ?array $memberList = null;
    public static function getMembers()
    {
        if (!self::$memberList) {
            self::$memberList = Member::select('id', 'name')->pluck('name', 'id')->toArray();
        }

        return self::$memberList;
    }
}
