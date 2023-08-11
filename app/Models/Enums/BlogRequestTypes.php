<?php

namespace App\Models\Enums;

abstract class BlogRequestTypes
{
    const ACCEPT = 'accept';
    const PENDING = 'pending';
    const REJECT = 'reject';

    public static $values = [
        self::ACCEPT => 'Accept',
        self::PENDING => 'Pending',
        self::REJECT => 'Reject'
    ];
}
