<?php

use DeveoDK\Core\Localize\Models\Localize;

if (! function_exists('localize')) {

    /**
     * Convert the given timezone into the current timezone.
     * @param DateTime $dateTime
     * @param null $timezone
     * @return DateTime|null
     */
    function localize(DateTime $dateTime, $timezone = null)
    {
        if (is_null($dateTime)) {
            return null;
        }

        if (is_null($timezone)) {
            $dateTime->setTimezone(Localize::getDefaultTimezone());
            return $dateTime;
        }

        $dateTime->setTimezone($timezone);
        return $dateTime;
    }
}
