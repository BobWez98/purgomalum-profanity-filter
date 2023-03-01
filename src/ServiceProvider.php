<?php

namespace Bobwez98\ProfanityFilter;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use Bobwez98\ProfanityFilter\Action\ProfanityFilter;

class ServiceProvider extends LaravelServiceProvider
{
    public function boot()
    {
        $this->app->singleton('profanity-filter', ProfanityFilter::class);
    }
}
