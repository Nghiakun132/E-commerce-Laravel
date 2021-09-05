<?php

namespace App\Http\Controllers\Fronted;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cart;
use Illuminate\Support\Facades\Redirect;

session_start();
class CartController extends Controller
{
    // public function index()
    // {
    //     return view('fronted.cart.index');
    // }

    public function save_cart(Request $request){
        $qty = $request->qty;
        $id = $request->product_id;
        $product_info = DB::table('products')->where('id', $id)->first();
        // Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        $data['id'] = $id;
        $data['qty'] = $qty;
        $data['name'] = $product_info->pro_name;
        $data['price'] = $product_info->pro_price;
        $data['weight'] = $product_info->pro_height;
        $data['options']['image'] = $product_info->pro_avatar;
        Cart::add($data);
        // Cart::destroy();
        return Redirect::to('/show-cart');
    }
    public function show_cart() {
        $category = DB::table('categories')->orderBy('id','desc')->get();
        return view('fronted.cart.index')->with('category',$category);
    }
    public function delete_cart($rowId) {
            Cart::update($rowId,0);
            return Redirect::to('/show-cart');
    }
    public function update_qty(Request $request){
            $rowId = $request->product_rowid;
            $qty = $request->cart_qty;
            Cart::update($rowId,$qty);
            return Redirect::to('/show-cart');
    }
}
