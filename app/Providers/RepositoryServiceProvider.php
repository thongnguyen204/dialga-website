<?php

namespace App\Providers;

use App\Models\Article;
use App\Repositories\Eloquent\EloquentArticleRepository;
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
        $this->registerBindings();
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
    private function registerBindings()
    {
        $this->app->bind('App\Repositories\ArticleRepository', function () {
            return new EloquentArticleRepository(new Article());
        });
    }
}