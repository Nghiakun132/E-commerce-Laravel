<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Http\Request;
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
    //Trang chu
    Route::get('','HomeController@index')->name('get.home');
    //shop
    Route::get('map','HomeController@map')->name('get.map');
    //Cập nhật thông tin
    // Route::get('update-tt','HomeController@update_tt');
    Route::post('update','HomeController@update');
    Route::post('update-password','HomeController@update_password');
    Route::get('view-data','HomeController@view_data');
    // Route::get('add-address','HomeController@add_address');
    Route::get('update-address','HomeController@update_address');
    Route::post('add','HomeController@add');
    Route::get('edit-address/{id}','HomeController@edit_address');
    Route::post('edit/{id}','HomeController@edit');
    Route::get('change-address/{id}','HomeController@change_address');
    Route::get('delete-address/{id}','HomeController@delete_address');
    // Route::get('view-coupon','HomeController@view_coupon');
    //favorite
    Route::get('add-favorite/{id}','HomeController@add_favorite');
    Route::get('view-favorite','HomeController@view_favorite')->name('fronted.home.favorite');
    Route::get('delete-favorite/{id}','HomeController@delete_favorite');
    Route::get('delete-all-favorite','HomeController@delete_all_favorite');
    //check-order
    Route::get('tracking-order','HomeController@tracking_order')->name('fronted.home.tracking_order');
    Route::get('tracking-order-details/{id}','HomeController@tracking_order_details');
    Route::get('cancel/{id}','HomeController@cancel');
    Route::post('cancel-order/{id}','HomeController@cancel_order');
    //Danh muc sp
    Route::get('danh-muc/{slug}','CategoryController@index')->name('get.category');
    //chi tiet sp
    Route::get('chi-tiet/{slug}','ProductDetailController@index')->name('get.product_detail');
    Route::post('comment','ProductDetailController@comment')->name('comment');
    Route::get('like-comment/{id}','ProductDetailController@like_comment')->name('like-comment');
    // Menu
    Route::get('menu/{slug}','MenuController@index')->name('get.menu');
    Route::get('show-articles','ArticleDetailController@index');
    //articles
    Route::get('bai-viet/{slug}','ArticleDetailController@index')->name('get.article_detail'); //chi tiet bai viet
    //search
    Route::post('tim-kiem','HomeController@search');
    Route::get('adu','SearchController@adu');

    // giỏ hàng
    Route::get('gio-hang','CartController@index');
    Route::post('save-cart','CartController@save_cart');
    Route::get('show-cart','CartController@show_cart')->name('get.cart');
    Route::get('delete-cart/{rowId}','CartController@delete_cart');
    Route::post('update-qty','CartController@update_qty');
    Route::post('check-coupon','CartController@check_coupon');
    Route::get('delete-coupon','CartController@delete_coupon');
    //checkout
    Route::get('login-checkout','CheckoutController@login_checkout')->name('login');
    Route::post('add-user','CheckoutController@add_user');
    Route::post('login-user','CheckoutController@login_user')->name('get.login');
    Route::get('checkout','CheckoutController@checkout');
    Route::get('logout','CheckoutController@logout');
    Route::get('payment','CheckoutController@payment');
    Route::get('order-place','CheckoutController@order_place');




    Route::prefix('user')->group(function(){
        Route::get('','UserController@index')->name('get.user.index');
        Route::get('create','UserController@create')->name('get.user.create');
        Route::post('create','UserController@store')->name('get.user.store');
        // Route::get('ip-user','UserController@ip');
    });

    //article

});
//Backend
include('route_admin.php');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('welcome');
})->name('dashboard');
