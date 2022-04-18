<?php

namespace App\Activity;

use Closure;
use Illuminate\Http\Request;

class ActivityMiddleware
{
    private Activity $activity;

    public function __construct(Activity $activity)
    {
        $this->activity = $activity;
    }

    public function handle(Request $request, Closure $next)
    {
        $this->activity->touch($request->url());

        return $next($request);
    }
}