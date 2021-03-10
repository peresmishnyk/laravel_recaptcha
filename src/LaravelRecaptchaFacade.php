<?php

namespace Peresmishnyk\LaravelRecaptcha;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Peresmishnyk\LaravelRecaptcha\Skeleton\SkeletonClass
 */
class LaravelRecaptchaFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-recaptcha';
    }
}
