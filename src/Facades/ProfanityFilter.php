<?php

namespace Bobwez98\ProfanityFilter\Facades;

use Illuminate\Support\Facades\Facade;
class ProfanityFilter extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'profanity-filter';
    }
}
