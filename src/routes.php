<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

Route::group([
    'prefix' => 'laravel-recaptcha',
], function () {
//    Route::get('domready.js', function () {
//        return view('laravel-recaptcha::domready');
//    });
    Route::get('domready.js', function () {
        if(app()->bound('debugbar')){
            app('debugbar')->disable();
        };
        return File::get(__DIR__ .'/../resources/assets/domready.js');
    });
    Route::post('/validate', function(\Illuminate\Http\Request $request){
        return response()->json(app('laravel-recaptcha')->verify($request->post('token')));
    });
});
