<?php

use DeveoDK\Core\Localize\Models\Localize;

if (!function_exists('localize')) {

    /**
     * Convert the given timezone into the current timezone.
     * @param DateTime|string|int $dateTime
     * @param null $timezone
     * @return DateTime|null
     */
    function localize($dateTime, $timezone = null)
    {
        if (is_null($dateTime)) {
            return null;
        }

        if (is_int($dateTime)) {
            try {
                $dateTime = (new DateTime())->setTimestamp($dateTime);
            } catch (Exception $exception) {
                return null;
            }
        }

        if (is_string($dateTime)) {
            try {
                $dateTime = new DateTime($dateTime);
            } catch (Exception $exception) {
                return null;
            }
        }

        if (!$dateTime instanceof DateTime) {
            return null;
        }

        if (is_null($timezone)) {
            $dateTime->setTimezone(Localize::getDefaultTimezone());
            return $dateTime;
        }

        $dateTimeZone = new DateTimeZone($timezone);
        $dateTime->setTimezone($dateTimeZone);

        return $dateTime;
    }
}
