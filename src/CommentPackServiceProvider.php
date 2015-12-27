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
        * */
        // config
        /*$this->publishes([
            __DIR__ .'/config/commentPack.php' => base_path('config/commentpack.php'),
        ], 'config');*/

        // views
        $this->publishes([
            __DIR__ . '/views/Frontend' => base_path('resources/views/frontend/modules/comment/'),
        ]);
        // database
        $this->publishes([
            __DIR__ . '/database/migrations' => database_path('migrations'),
        ], 'migrations');

        // seeds
        $this->publishes([
            __DIR__ . '/database/seeds/' => database_path('seeds')
        ], 'seeds');
        // translations
        /*$this->publishes([
            __DIR__.'/Lang/ar' => base_path('resources/lang/ar'),
        ]);
        $this->publishes([
            __DIR__.'/Lang/en' => base_path('resources/lang/en'),
        ]);*/

        $this->loadTranslationsFrom(__DIR__ . '/lang', 'CommentPack');
        $this->loadViewsFrom(__DIR__ . '/views/', 'CommentPack');
        $this->mergeConfigFrom(__DIR__ . '/config/CommentPack.php', 'CommentPack');
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

        /*$this->publishes([
            __DIR__.'/Views/Backend' => base_path('resources/views/backend/modules/comment'),
        ]);*/


    }
}
