<?php

namespace DeveoDK\Core\Localize\Models;

class Localize
{
    /** @var string */
    protected static $defaultTimezone = 'UTC';

    /**
     * @return string
     */
    public static function getDefaultTimezone(): string
    {
        return self::$defaultTimezone;
    }

    /**
     * @param string $defaultTimezone
     */
    public static function setDefaultTimezone(string $defaultTimezone)
    {
        self::$defaultTimezone = $defaultTimezone;
    }
}