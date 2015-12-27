<?php

namespace Usama\CommentPack;

use Illuminate\Support\ServiceProvider;

class CommentPackServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        // including the routes of the package
        include __DIR__ . '/Http/routes.php';

        /*
         * Publishing files
         *
         * */
        // config
        $this->publishes([
            __DIR__.'/Config/CommentPack.php' => config_path(),
        ], 'config');

        // views
        $this->publishes([
            __DIR__.'/Views/Frontend' => base_path('resources/views/frontend/modules/comment'),
        ]);
        /*$this->publishes([
            __DIR__.'/Views/Backend' => base_path('resources/views/backend/modules/comment'),
        ]);*/

        // database
        $this->publishes([
            __DIR__.'/Database/migrations' => database_path('migrations'),
        ], 'migrations');

        // seeds
        $this->publishes([
            __DIR__.'/Database/seeds/' => base_path('database/seeds')
        ], 'seeds');

        // translations
        /*$this->publishes([
            __DIR__.'/Lang/ar' => base_path('resources/lang/ar'),
        ]);
        $this->publishes([
            __DIR__.'/Lang/en' => base_path('resources/lang/en'),
        ]);*/

        $this->loadTranslationsFrom(__DIR__.'/Lang','CommentPack');
        $this->loadViewsFrom(__DIR__.'/Views/','CommentPack');
        $this->mergeConfigFrom( __DIR__.'/Config/CommentPack.php', 'CommentPack');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('CommentPack', function ($app) {
            return new CommentPack();
        });
        /*
         * Declaring Config
         * */



    }
}
