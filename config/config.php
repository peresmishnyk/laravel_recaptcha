<?php

return [
    'site_key' => env('RECAPTCHA_SITE_KEY'),
    'secret_key' => env('RECAPTCHA_SECRET_KEY'),
    'cookie_name' => env('RECAPTCHA_COOKIE_NAME', 'laravel-recaptcha'),
];
