<?php

namespace Peresmishnyk\LaravelRecaptcha\Tests;

use Orchestra\Testbench\TestCase;
use Peresmishnyk\LaravelRecaptcha\LaravelRecaptchaServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [LaravelRecaptchaServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
