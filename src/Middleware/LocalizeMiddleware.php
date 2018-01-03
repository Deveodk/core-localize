<?php

namespace DeveoDK\Core\Localize\Middleware;

use Carbon\Carbon;
use Closure;
use DeveoDK\Core\Localize\Models\Localize;
use Illuminate\Http\Request;

class LocalizeMiddleware
{
    /**
     * Handle the setting of locale and localize helpers default timezone
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $config = config('core.localize');
        $preferredLanguage = $request->getPreferredLanguage();

        if (!key_exists($preferredLanguage, $config['languages'])) {
            return $next($request);
        }

        $language = $config['languages'][$preferredLanguage];
        app()->setLocale($language);
        Carbon::setLocale($language);

        if (key_exists($language, $config['timezones'])) {
            Localize::setDefaultTimezone($config['timezones'][$language]);
        }

        $response = $next($request);

        $response->header('content-language', $preferredLanguage);

        return $response;
    }
}
