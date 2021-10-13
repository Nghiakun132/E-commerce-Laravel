<?php

use App\Http\Controllers\Backend\BackendCouponController;

Route::group(['namespace' =>'Backend','prefix' =>'admin'],function () {
    //Trang chu
    Route::get('','BackendHomeController@index')->name('get_backend.home');
    Route::get('change-info/{id}','BackendHomeController@change_info');
    Route::post('change/{id}','BackendHomeController@change');
    Route::post('change-password/{id}','BackendHomeController@change_password');
    Route::post('adminlogin','BackendHomeController@adminlogin');

    //login
    Route::get('login','BackendHomeController@login')->name('get_backend.login');
    //logout
    Route::get('logout','BackendHomeController@logout')->name('get_backend.logout');
    //Category
    Route::prefix('category')->group(function(){
        Route::get('','BackendCategoryController@index')->name('get_backend.category.index');

        Route::get('create','BackendCategoryController@create')->name('get_backend.category.create');
        Route::post('create','BackendCategoryController@store')->name('get_backend.category.store');

        Route::get('update/{id}','BackendCategoryController@edit')->name('get_backend.category.update');
        Route::post('update/{id}','BackendCategoryController@update');

        Route::get('delete/{id}','BackendCategoryController@delete')->name('get_backend.category.delete');

    });
    //keyword
    Route::prefix('keyword')->group(function(){
        Route::get('','BackendKeywordController@index')->name('get_backend.keyword.index');

        Route::get('create','BackendKeywordController@create')->name('get_backend.keyword.create');
        Route::post('create','BackendKeywordController@store')->name('get_backend.keyword.store');

        Route::get('update/{id}','BackendKeywordController@edit')->name('get_backend.keyword.update');
        Route::post('update/{id}','BackendKeywordController@update');

        Route::get('delete/{id}','BackendKeywordController@delete')->name('get_backend.keyword.delete');

    });
    //product
    Route::prefix('product')->group(function(){
        Route::get('','BackendProductController@index')->name('get_backend.product.index');
        Route::get('create','BackendProductController@create')->name('get_backend.product.create');
        Route::post('create','BackendProductController@store')->name('get_backend.product.store');
        Route::get('add-img/{id}','BackendProductController@add_img')->name('get_backend.product.add');
        Route::post('add-image','BackendProductController@add_image');
        Route::get('update/{id}','BackendProductController@edit')->name('get_backend.product.update');
        Route::post('update-product/{id}','BackendProductController@update_product');

        Route::get('delete/{id}','BackendProductController@delete')->name('get_backend.product.delete');
        Route::get('change-status/{id}','BackendProductController@change_status');
    });
    //Menu
    Route::prefix('menu')->group(function(){
        Route::get('','BackendMenuController@index')->name('get_backend.menu.index');
        Route::get('create','BackendMenuController@create')->name('get_backend.menu.create');
        Route::post('create','BackendMenuController@store')->name('get_backend.menu.store');

        Route::get('update/{id}','BackendMenuController@edit')->name('get_backend.menu.update');
        Route::post('update/{id}','BackendMenuController@update');

        Route::get('delete/{id}','BackendMenuController@delete')->name('get_backend.menu.delete');

    });
    //tag
    Route::prefix('tag')->group(function(){
        Route::get('','BackendTagController@index')->name('get_backend.tag.index');

        Route::get('create','BackendTagController@create')->name('get_backend.tag.create');
        Route::post('create','BackendTagController@store')->name('get_backend.tag.store');

        Route::get('update/{id}','BackendTagController@edit')->name('get_backend.tag.update');
        Route::post('update/{id}','BackendTagController@update');

        Route::get('delete/{id}','BackendTagController@delete')->name('get_backend.tag.delete');

    });
//article
    Route::prefix('article')->group(function(){
        Route::get('','BackendArticleController@index')->name('get_backend.article.index');
        Route::get('add-article','BackendArticleController@add')->name('get_backend.article.create');
        Route::post('add-article','BackendArticleController@add_article');

        Route::get('edit-article/{id}','BackendArticleController@edit');
        Route::post('update-article/{id}','BackendArticleController@update');
        Route::get('delete-article/{id}','BackendArticleController@delete_article');

    });
//user
    Route::prefix('user')->group(function(){
        Route::get('','BackendUserController@index')->name('get_backend.user.index');
        Route::get('delete/{id}','BackendUserController@delete');
        Route::get('detail/{id}','BackendUserController@detail');
        Route::get('change-status-user/{id}','BackendUserController@change_status_user');
    });

    Route::prefix('comment')->group(function(){
    Route::get('','BackendCommentController@index')->name('get_backend.comment.index');
    Route::get('delete-comment/{id}','BackendCommentController@delete_comment');
    // Route::post('comment','BackendCommentController@createOrupdate')->name('get_backend.comment.store');
    });
    //order
    Route::prefix('order')->group(function(){
        Route::get('','BackendOrderController@index')->name('get_backend.order.index');
        Route::get('view-detail/{id}','BackendOrderController@view_detail');
        Route::get('delete-order/{id}','BackendOrderController@delete_order');
        Route::get('change-status/{id}','BackendOrderController@change_status');

    });
    //coupon
    Route::prefix('coupon')->group(function(){
        Route::get('','BackendCouponController@index')->name('get_backend.coupon.index');
    });
    Route::prefix('staff')->group(function(){
        Route::get('','AdminController@index')->name('get_backend.staff.index');
        Route::get('add-staff','AdminController@add_staff')->name('get_backend.staff.add_account');
        Route::post('add-account','AdminController@add_account');
        Route::get('promotion/{id}','AdminController@promotion');
        Route::get('delete-account/{id}','AdminController@delete_account');
    });
    Route::prefix('import')->group(function(){
        Route::get('','BackendImportController@index')->name('get_backend.import.index');
        Route::get('change-status/{ip_id}','BackendImportController@change_status');
    });
});

