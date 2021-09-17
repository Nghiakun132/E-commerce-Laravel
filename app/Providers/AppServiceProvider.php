<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Product;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use PhpParser\Node\Stmt\TryCatch;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        try{
            Paginator::defaultView('view-name');
            Paginator::defaultSimpleView('view-name');
            Paginator::useBootstrap();
            $categoriesGlobal = Category::all();
            $menuGlobal = Menu::all();
            $productsGlobal = Product::all();
        }catch (\Exception $exception){

        }
        \View::share('categoriesGlobal',$categoriesGlobal ?? []);
        \View::share('menuGlobal',$menuGlobal ?? []);
        \View::share('productsGlobal',$productsGlobal ?? []);
    }
}
