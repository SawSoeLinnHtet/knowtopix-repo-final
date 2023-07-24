<?php

// app/Enums/PostPrivacyEnum.php
namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self PRIVATE()
 * @method static self FRIEND()
 * @method static self PUBLIC()
 */
final class PostPrivacyEnum extends Enum
{
    // Constants are defined as methods, not 'case' statements
    protected static function values(): array
    {
        return [
            'PRIVATE' => 'private',
            'FRIEND' => 'friend',
            'PUBLIC' => 'public',
        ];
    }
}
