<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        URL::forceScheme('https');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $models = array(
            'Dish',
            'Category',
            'Ingredient'
        );

        foreach ($models as $model) {
            $this->app->bind("App\Repositories\\{$model}RepositoryInterface", "App\Repositories\\{$model}EloquentRepository");
        }
    }
}
