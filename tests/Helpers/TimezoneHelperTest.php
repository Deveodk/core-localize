<?php

namespace DeveoDK\Test\Helpers;

use DateTime;
use DeveoDK\Core\Localize\LocalizeServiceProvider;
use Orchestra\Testbench\TestCase;

class TimezoneHelperTest extends TestCase
{
    /** @var LocalizeServiceProvider */
    protected $localizeServiceProvider;

    /**
     * Setup
     */
    public function setUp()
    {
        parent::setUp();
        $this->localizeServiceProvider = new LocalizeServiceProvider($this->app);

        // Register helper
        $this->localizeServiceProvider->register();
    }

    /**
     * Test that the helper can handle null values
     * @test
     */
    public function canHandleNull()
    {
        // Register helper
        $localize = localize(null);

        $this->assertEquals(null, $localize);
    }

    /**
     * Test that the helper can handle nonDateTimeValues
     * @test
     */
    public function canHandleNonDateTimeValues()
    {
        $dateTimeString = '2017-01-10 12:20:12';

        $localize = localize($dateTimeString);

        $isDateTime = $localize instanceof DateTime;

        $this->assertEquals(true, $isDateTime);
    }

    /**
     * Can handle unixTimestamps
     * @test
     */
    public function canHandleUnixTimeStamp()
    {
        $unix = 12311;

        $localize = localize($unix);

        $isDateTime = $localize instanceof DateTime;

        $this->assertEquals(true, $isDateTime);
    }

    /**
     * Can handle timezoneChange
     * @test
     */
    public function canHandleTimezoneChange()
    {
        $unix = 12311;
        $timeZone = 'Europe/Copenhagen';

        $localize = localize($unix, $timeZone);

        $isCorrectTimeZone = ($localize->getTimezone()->getName() === $timeZone);

        $this->assertEquals(true, $isCorrectTimeZone);
    }
}
