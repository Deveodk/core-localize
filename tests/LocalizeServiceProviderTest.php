<?php

namespace DeveoDK\Test;

use DateTime;
use DeveoDK\Core\Localize\LocalizeServiceProvider;
use Orchestra\Testbench\TestCase;

class ComponentServiceTest extends TestCase
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
    }

    /**
     * Test that the helpers get required
     * @test
     */
    public function canRegisterHelper()
    {
        // Register helper
        $this->localizeServiceProvider->register();

        $localize = localize(new DateTime());

        $isLoaded = $localize instanceof DateTime;

        $this->assertEquals(true, $isLoaded);
    }
}
