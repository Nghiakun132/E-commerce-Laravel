<?php

namespace App\Http\Controllers\Fronted;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cart;
use Illuminate\Support\Facades\Redirect;
use Session;

session_start();
class CartController extends Controller
{
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
        if ($qty <= $product_info2->pro_number && $qty >0) {
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
        }elseif($qty <= "0"){
            return Redirect()->back()->with('message_qty2', 'Số lượng nhập không hợp lệ vui lòng nhập lại');
        }
         else {
            return Redirect()->back()->with('message_qty', 'Số lượng hàng hóa không đủ');
        }
    }
    public function show_cart()
    {
        $this->AuthLogin();
        $count = count(Cart::content());
        $category = DB::table('categories')->orderBy('id', 'desc')->get();
        return view('fronted.cart.index',compact('count'))->with('category', $category);
    }
    public function delete_cart($rowId)
    {
        Cart::update($rowId, 0);
        return Redirect::to('/show-cart');
    }
    public function update_qty(Request $request)
    {
        $product_id = $request->product_id;
        $pro_qty = DB::table('products')->where('id', $product_id)->first();
        $rowId = $request->product_rowid;
        $qty = $request->cart_qty;
        if($qty > $pro_qty->pro_number){
            return Redirect()->back()->with('message_qty', 'Số lượng hàng hóa không đủ');
        }
        Cart::update($rowId, $qty);
        return Redirect()->back()->with('message_qty_success','Cập nhập thành công');
    }
    public function check_coupon(Request $request)
    {
        $user_id = session::get('user_id');
        $id_code = Session::get('cp_id');
        $data = $request->all();
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        $coupon = Coupon::where('cp_code', $data['coupon'])
            ->where('cp_expiry', '>', $now)
            ->where('cp_status','<>','1')
            ->first();
        if ($coupon != null && $id_code ==null && $coupon->cp_user_id == $user_id) {
            session::put('cp_value', $coupon->cp_value);
            session::put('cp_code', $coupon->cp_code);
            session::put('cp_id', $coupon->cp_id);
            return Redirect()->back()->with('message', 'Thêm mã giảm giá thành công');
        }elseif ($id_code){
            return Redirect()->back()->with('message_2', 'Bạn đã thêm mã giảm giá rồi');
        }else {
            return Redirect()->back()->with('message_error2', 'Mã giảm giá đã sử dụng hết hoặc hết hạn');
        }
    }
    public function delete_coupon()
    {
        $id_code = Session::get('cp_id');
        if ($id_code) {
            session::forget('cp_id');
            session::forget('cp_code');
            session::forget('cp_value');
            return Redirect()->back()->with('success', 'Xóa mã giảm giá thành công');
        } else {
            return Redirect()->back()->with('code_error', 'Bạn không có nhập mã giảm giá');
        }
    }
}
