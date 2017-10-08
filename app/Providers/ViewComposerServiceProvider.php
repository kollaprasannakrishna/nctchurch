<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('partials._nav','App\Http\Composers\ViewComposer@toNav');
        view()->composer('partialPages.category','App\Http\Composers\ViewComposer@toCategories');
        view()->composer('partialPages.events','App\Http\Composers\ViewComposer@toEvents');
        view()->composer('partialPages.posts','App\Http\Composers\ViewComposer@toPosts');
        view()->composer('partialPages.sermonSeries','App\Http\Composers\ViewComposer@toSeries');
        view()->composer('partialPages.tags','App\Http\Composers\ViewComposer@toTags');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
