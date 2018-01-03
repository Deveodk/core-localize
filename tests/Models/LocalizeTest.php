<?php

namespace DeveoDK\Test\Helpers;

use DeveoDK\Core\Localize\Models\Localize;
use Orchestra\Testbench\TestCase;

class LocalizeTest extends TestCase
{
    /**
     * Setup
     */
    public function setUp()
    {
        parent::setUp();
    }

    /**
     * Test that the model can get default timezone
     * @test
     */
    public function canGetDefaultTimezone()
    {
        $defaultTimezone = Localize::getDefaultTimezone();

        $this->assertEquals('UTC', $defaultTimezone->getName());
    }

    /**
     * Test that the model can set the default timezone
     * @test
     */
    public function canSetDefaultTimezone()
    {
        $defaultTimezone = Localize::getDefaultTimezone();
        Localize::setDefaultTimezone('Europe/Copenhagen');

        $newTimezone = Localize::getDefaultTimezone();

        $this->assertNotEquals($defaultTimezone, $newTimezone);
    }
}
