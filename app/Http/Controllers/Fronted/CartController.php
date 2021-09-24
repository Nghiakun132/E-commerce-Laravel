<?php

namespace App\Http\Controllers\Fronted;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cart;
use Illuminate\Support\Facades\Redirect;
use Session;

session_start();
class CartController extends Controller
{
    // public function index()
    // {
    //     return view('fronted.cart.index');
    // }
    public function AuthLogin()
    {
        $id = Session::get('user_id');
        if ($id) {
            return redirect()->route('get.home');
        } else {
            return redirect()->route('login')->send();
        }
    }
    public function save_cart(Request $request)
    {
        $id = $request->product_id;
        $product_info2 = DB::table('products')->where('id', $id)->first();
        $qty = $request->qty;
        if($qty <= $product_info2->pro_number){
        $product_info = DB::table('products')->where('id', $id)->first();
        $id = $request->product_id;
        $data['id'] = $id;
        $data['qty'] = $qty;
        $data['name'] = $product_info->pro_name;
        $data['price'] = ($product_info->pro_price) - (($product_info->pro_price) * ($product_info->pro_sale));
        $data['weight'] = $product_info->pro_height;
        $data['options']['image'] = $product_info->pro_avatar;
        Cart::add($data);
        Cart::setGlobalTax(10);
        return Redirect::to('/show-cart');
    }else{
            return Redirect()->back()->with('message_qty','Số lượng hàng hóa không đủ');
        }
        // Cart::destroy();
    }
    public function show_cart()
    {
        $this->AuthLogin();
        $category = DB::table('categories')->orderBy('id', 'desc')->get();
        return view('fronted.cart.index')->with('category', $category);
    }
    public function delete_cart($rowId)
    {
        Cart::update($rowId, 0);
        return Redirect::to('/show-cart');
    }
    public function update_qty(Request $request)
    {
        $rowId = $request->product_rowid;
        $qty = $request->cart_qty;
        Cart::update($rowId, $qty);
        return Redirect::to('/show-cart');
    }
    public function check_coupon(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $coupon = Coupon::where('cp_code', $data['coupon'])->first();
        if($coupon != null) {
            if($coupon->cp_qty>0){
                session::put('cp_condition',$coupon->cp_condition);
                session::put('cp_id',$coupon->cp_id);
                return Redirect()->back()->with('message','Thêm mã giảm giá thành công');
            }else{
            return Redirect()->back()->with('message_error2','Mã giảm giá đã sử dụng hết');
            }
        }else{
            return Redirect()->back()->with('message_error','Mã giảm giá không tồn tại');
        }
    }
    public function delete_coupon(){
            session::forget('cp_condition');
            session::forget('cp_id');
            return Redirect()->back()->with('success','Xóa mã giảm giá thành công');
    }
}
