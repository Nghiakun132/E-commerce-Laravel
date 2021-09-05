<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
//Fronted
Route::group(['namespace' =>'Fronted'],function () {
    Route::get('','HomeController@index')->name('get.home'); //Trang chu

    Route::get('danh-muc/{slug}','CategoryController@index')->name('get.category'); //Danh muc sp

    Route::get('chi-tiet/{slug}','ProductDetailController@index')->name('get.product_detail'); //chi tiet sp

    Route::get('menu/{slug}','MenuController@index')->name('get.menu'); //Menu
    Route::get('show-articles','ArticleDetailController@index');

// giỏ hàng
    Route::get('gio-hang','CartController@index');
    Route::post('save-cart','CartController@save_cart');
    Route::get('show-cart','CartController@show_cart')->name('get.cart');
    Route::get('delete-cart/{rowId}','CartController@delete_cart');
    Route::post('update-qty','CartController@update_qty');
//checkout
    Route::get('login-checkout','CheckoutController@login_checkout');
    Route::post('add-user','CheckoutController@add_user');
    Route::post('login-user','CheckoutController@login_user');
    Route::get('checkout','CheckoutController@checkout');
    Route::post('save-checkout','CheckoutController@save_checkout');
    Route::get('logout','CheckoutController@logout');
    Route::get('payment','CheckoutController@payment');
    Route::get('order-place','CheckoutController@order_place');




    Route::prefix('user')->group(function(){
        Route::get('','UserController@index')->name('get.user.index');
        Route::get('create','UserController@create')->name('get.user.create');
        Route::post('create','UserController@store')->name('get.user.store');

    });

    //article
    Route::get('bai-viet/{slug}','ArticleDetailController@index')->name('get.article_detail'); //chi tiet bai viet
});
//Backend
include('route_admin.php');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('welcome');
})->name('dashboard');
