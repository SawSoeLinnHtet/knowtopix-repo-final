<?php

namespace App\Models\Enums;

abstract class StatusTypes
{
    const BANNED = 'banned';
    const ACTIVE = 'active';

    public static $values = [
        self::ACTIVE => 'Active',
        self::BANNED => 'Banned'
    ];
}
