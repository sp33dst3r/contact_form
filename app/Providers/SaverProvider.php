<?php

namespace App\Providers;

use \App\Contracts\Saver;

use Illuminate\Support\ServiceProvider;

class SaverProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(Saver::class, function(){
            return new Saver();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
