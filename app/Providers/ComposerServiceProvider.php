<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('layouts.sidebar',function($view){

            $categories= Category::with('questions')

                ->orderBy('title','asc')->get();

            return $view->with('categories', $categories);
        });


        view()->composer('layouts.sidebar-left',function($view){

            $categories= Category::with('questions')

                ->orderBy('title','asc')->get();

            return $view->with('categories', $categories);
        });

    }


//NavigationComposer::class
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
