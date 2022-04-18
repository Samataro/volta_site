<?php

namespace App\Activity;

use App\Activity\Repository\ActivityRepositoryContract;
use App\Activity\Repository\ActivityRepositoryJsonRPC;
use Illuminate\Support\ServiceProvider;

class ActivityServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(
            ActivityRepositoryContract::class,
            fn() => new ActivityRepositoryJsonRPC(config("activity.base_uri"))
        );
    }
}