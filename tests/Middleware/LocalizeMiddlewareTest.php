<?php

namespace DeveoDK\Test\Helpers;

use DeveoDK\Core\Localize\Middleware\LocalizeMiddleware;
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
     * @test
     */
    public function testLocalizeMiddleware()
    {
        $this->callMiddlewareJson(LocalizeMiddleware::class);

        $language = $this->app->getLocale();

        $this->assertEquals('da', $language);
    }

    /**
     * Make a dummy route with the given middleware applied.
     *
     * @param  string  $method
     * @param  string|string[]  $middleware
     * @return string
     */
    protected function makeMiddlewareRoute($method, $middleware)
    {
        $method = strtolower($method);

        return $this->app->make('router')->{$method}('/__middleware__', [
            'middleware' => $middleware,
            function () {
                return app()->getLocale();
            }
        ])->uri();
    }

    /**
     * Call the given middleware using a JSON request.
     *
     * @param  string|string[]  $middleware
     * @param  string  $method
     * @param  array  $data
     * @return \Illuminate\Foundation\Testing\TestResponse
     */
    protected function callMiddlewareJson($middleware, $method = 'GET', array $data = [])
    {
        return $this->json(
            $method,
            $this->makeMiddlewareRoute($method, $middleware),
            $data,
            ['accept-language' => 'da_DK']
        );
    }
}
