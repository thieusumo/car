<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\CustomerRepository::class,\App\Repositories\CustomerRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\QuestionRepository::class,\App\Repositories\QuestionRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\RatingRepository::class,\App\Repositories\RatingRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CarRepository::class,\App\Repositories\CarRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ReportRepository::class,\App\Repositories\ReportRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ContactRepository::class,\App\Repositories\ContactRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\NotificationRepository::class,\App\Repositories\NotificationRepositoryEloquent::class);
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
