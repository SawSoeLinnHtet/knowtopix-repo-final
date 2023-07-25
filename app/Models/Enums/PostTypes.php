<?php

namespace App\Models\Enums;

abstract class PostTypes
{
    const PUBLIC = 1;
    const FRIEND_ONLY = 2;
    const PRIVATE = 3;

    public static $values = [
        self::PUBLIC => 'Public',
        self::FRIEND_ONLY => 'Friend Only',
        self::PRIVATE => 'Private'
    ];
}