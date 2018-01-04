<?php

namespace DeveoDK\Core\Localize\Models;

use DateTimeZone;

class Localize
{
    /** @var string */
    protected static $defaultTimezone = 'UTC';

    /**
     * @return DateTimeZone
     */
    public static function getDefaultTimezone(): DateTimeZone
    {
        return new DateTimeZone(self::$defaultTimezone);
    }

    /**
     * @param string $defaultTimezone
     */
    public static function setDefaultTimezone(string $defaultTimezone)
    {
        self::$defaultTimezone = $defaultTimezone;
    }
}
