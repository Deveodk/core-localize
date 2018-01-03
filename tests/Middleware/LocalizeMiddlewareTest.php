<?php

namespace DeveoDK\Test\Helpers;

use DeveoDK\Core\Localize\Middleware\LocalizeMiddleware;
use Illuminate\Http\Request;
use Orchestra\Testbench\TestCase;

class LocalizeMiddlewareTest extends TestCase
{
    /** @var LocalizeMiddleware */
    protected $localizeMiddleware;

    /**
     * Setup
     */
    public function setUp()
    {
        parent::setUp();
        $this->localizeMiddleware = new LocalizeMiddleware();
    }

    /**
     * Setup core.localize test config
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('core.localize', [
            'timezones' => [
                'da' => 'Europe/Copenhagen',
                'en' => 'UTC'
            ],
            'languages' => [
                'da_DK' => 'da',
                'en_EN' => 'en',
            ],
        ]);
    }

    /**
     * Test the localize middleware
     *
     */
    public function testLocalizeMiddleware()
    {
        $localizeMiddleware = $this->localizeMiddleware;

        $response = response();

        // Build the request
        $request = new Request();
        $request->headers->set('content-language', 'da_DK');

        $localizeMiddleware->handle($request, function () use ($response) {
            return $response;
        });
    }
}
