<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Blade::component('layouts.base-header', 'base-header');
        Blade::component('layouts.base-scripts', 'base-scripts');
    }


    public function register(): void
    {
        
    }


}
