<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class SidebarComposerProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('frontend.partials.sidebar', 'App\Http\Composers\SidebarComposer');
        View::composer('frontend.partials.header', 'App\Http\Composers\HeaderComposer');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // $this->composerSidebar();
    }

    // public function composerSidebar()
    // {
    //     // view()->composer('frontend.partials.sidebar', 'App\Http\Composers\SidebarComposer');
    // }
}
