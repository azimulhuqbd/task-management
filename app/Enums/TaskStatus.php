<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Pending()
 * @method static static Ongoing()
 * @method static static Done()
 */
final class TaskStatus extends Enum
{
    const Pending =   0;
    const Ongoing =   1;
    const Done = 2;

    public static function getDescription($value): string
    {
        return parent::getDescription($value);
    }
}
