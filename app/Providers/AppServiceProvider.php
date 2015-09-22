<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Topic;
use App\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('globalStatistics', [
            'topicsCount' => Topic::topicsCount(),
            'usersCount' => User::usersCount()
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
