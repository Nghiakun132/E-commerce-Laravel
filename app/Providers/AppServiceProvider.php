<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Coupon;
use App\Models\Menu;
use App\Models\Product;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use PhpParser\Node\Stmt\TryCatch;
// use Session;
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
            // $user_id = Session::get('user_id');
            Paginator::defaultView('view-name');
            Paginator::defaultSimpleView('view-name');
            Paginator::useBootstrap();
            $categoriesGlobal = Category::where('c_status','<>',0)->get();
            $menuGlobal = Menu::all();
            $productsGlobal = Product::all();
            $CouponGlobal = Coupon::all();
        }catch (\Exception $exception){
        }
        \View::share('categoriesGlobal',$categoriesGlobal ?? []);
        \View::share('menuGlobal',$menuGlobal ?? []);
        \View::share('productsGlobal',$productsGlobal ?? []);
        \View::share('couponGlobal',$CouponGlobal ?? []);
    }
}
