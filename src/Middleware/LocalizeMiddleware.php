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
        $preferedLanguage = $request->getPreferredLanguage();

        if (!key_exists($preferedLanguage, $config['languages'])) {
            return $next($request);
        }

        $language = $config['languages'][$preferedLanguage];
        app()->setLocale($language);
        Carbon::setLocale($language);

        if (key_exists($language, $config['timezones'])) {
            Localize::setDefaultTimezone($config['timezones'][$language]);
        }

        return $next($request);
    }
}