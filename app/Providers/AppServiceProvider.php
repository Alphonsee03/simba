<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use App\Models\Beasiswa;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Blade::component('layouts.base-header', 'base-header');
        Blade::component('layouts.base-scripts', 'base-scripts');

        View::composer('layouts.admin-layout', function ($view) {
        $view->with('beasiswas', Beasiswa::all());
    });

    }


    public function register(): void
    {
        
    }


}
