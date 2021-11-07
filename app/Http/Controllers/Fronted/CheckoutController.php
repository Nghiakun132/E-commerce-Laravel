<?php

namespace App\Http\Controllers\Fronted;


use App\Http\Controllers\Controller;
use App\Http\Requests\register;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use Cart;

// session_start();

class CheckoutController extends Controller
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
    public function login_checkout()
    {
        return view('fronted.user.index');
    }

    public function add_user(register $request)
    {
        $data = array();
        $data2 = array();
        $data['name']  = $request->name;
        $data['email'] = $request->email;
        $data['password'] = md5($request->password, false);
        $data['phone'] = $request->phone;
        $data['created_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        $insert = DB::table('users')->insertGetId($data);
        $data2['address'] = $request->address;
        $data2['user_id'] = $insert;
        $insert2 = DB::table('address')->insert($data2);
        Session::put('id', $insert);
        Session::put('name', $request->name);
        return Redirect()->Route('get.home');
    }
    public function checkout()
    {
        return view('fronted.user.checkout');
    }

    public function logout()
    {
        DB::table('users')->where('id', Session::get('id'))->update(['status_user' => 0]);
        Session::flush();
        return Redirect()->Route('get.home');
    }
    public function login_user(Request $request)
    {
        $email = $request->email;
        $password = md5($request->password);
        $result = DB::table('users')->where('email', $email)->where('password', $password)->where('status', 0)->first();
        if ($result != null) {
            Session::put('user_id', $result->id);
            Session::put('user_name', $result->name);
            DB::table('users')->where('id', $result->id)->update(['status_user' => 1]);
            return Redirect()->Route('get.home');
        } else
            return Redirect()->Route('login')->with('message', 'Tài khoản của bạn không tồn tại hoặc bị khóa');
    }

    public function payment()
    {
        $id = Session::get('user_id');
        $user = DB::table('users')->where('id', $id)->first();
        $address = DB::table('address')->where('user_id', $id)->where('status', 1)->first();
        return view('fronted.user.payment', compact('address', 'user'));
    }
    public function order_place()
    {
        $code = session::get('cp_value');
        $code_id = session::get('cp_id');
        $cp_code = session::get('cp_code');
        //order
        $order = array();
        $order['user_id'] = Session::get('user_id');
        $order['order_total'] = (Cart::total(0, ',', '.') - (Cart::total(0, ',', '.') * $code));
        $order['order_status'] = 0;
        $order['transport'] = rand(1, 9);
        $order['created_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        if ($cp_code) {
            $order['order_voucher_code'] =$cp_code;
        }else{
            $order['order_voucher_code'] = null;
        }
        $insert = DB::table('orders')->insertGetId($order);
        //bought
        $user_id = Session::get('user_id');
        $address = DB::table('address')->where('user_id', $user_id)->where('status', 1)->first();
        $pd = array();
        $pd['pk_order_id'] = $insert;
        $pd['pk_user_id'] = Session::get('user_id');
        $pd['pk_address'] = $address->address;
        $pd['pd_total'] = (Cart::total(0, ',', '.') - (Cart::total(0, ',', '.') * $code));
        DB::table('product_bought')->insert($pd);
        //order_detail
        $order2 = array();
        $content = Cart::content();
        foreach ($content as $value) {
            $order2['order_id'] = $insert;
            $order2['product_id'] = $value->id;
            $order2['product_name'] = $value->name;
            $order2['product_price'] = $value->price;
            $order2['product_qty'] = $value->qty;
            DB::table('order_detail')->insert($order2);
        }
        // add voucher
        // nếu có voucher > 500
        // con không có voucher > 500000
        if ((Cart::total(0, ',', '.') > 500) && ($code != null)) {
            $coupon = array();
            $cp_user_id = Session::get('user_id');
            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $coupon['cp_code'] = substr(str_shuffle($permitted_chars), 0, 8);
            $coupon['cp_value'] = rand(1, 10) / 50;
            $coupon['cp_user_id'] = $cp_user_id;
            $coupon['cp_expiry'] = Carbon::now('Asia/Ho_Chi_Minh')->addMonths(6);
            $coupon['created_at'] = Carbon::now('Asia/Ho_Chi_Minh');
            DB::table('coupon')->insert($coupon);
            if ($code_id) {
                $change = array();
                $cp_status = DB::table('coupon')->where('cp_id', $code_id)->first();
                if ($cp_status->cp_status == 0) {
                    $change['cp_status'] = 1;
                }
                DB::table('coupon')->where('cp_id', $code_id)->update($change);
            }
            Cart::destroy();
            $code_value = Session::get('cp_value');
            $code_code = Session::get('cp_code');
            $code_id = Session::get('cp_id');
            if ($code_value != null && $code_code != null && $code_id != null) {
                Session::forget('cp_value');
                Session::forget('cp_id');
                Session::forget('cp_code');
            }
            return Redirect()->Route('get.home')->with('congratulation', 'Chúc mừng bạn đã nhận được một voucher. Hãy vào phần thông tin voucher để biết thêm chi tiết');
        } elseif (($code == null) && (Cart::total(0, ',', '.') > 500.000)) {
            $coupon = array();
            $cp_user_id = Session::get('user_id');
            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $coupon['cp_code'] = substr(str_shuffle($permitted_chars), 0, 8);
            $coupon['cp_value'] = rand(1, 10) / 50;
            $coupon['cp_user_id'] = $cp_user_id;
            $coupon['cp_expiry'] = Carbon::now('Asia/Ho_Chi_Minh')->addMonths(6);
            $coupon['created_at'] = Carbon::now('Asia/Ho_Chi_Minh');
            DB::table('coupon')->insert($coupon);
            if ($code_id) {
                $change = array();
                $cp_status = DB::table('coupon')->where('cp_id', $code_id)->first();
                if ($cp_status->cp_status == 0) {
                    $change['cp_status'] = 1;
                }
                DB::table('coupon')->where('cp_id', $code_id)->update($change);
            }
            Cart::destroy();
            $code_value = Session::get('cp_value');
            $code_code = Session::get('cp_code');
            $code_id = Session::get('cp_id');
            if ($code_value != null && $code_code != null && $code_id != null) {
                Session::forget('cp_value');
                Session::forget('cp_id');
                Session::forget('cp_code');
            }
            return Redirect()->Route('get.home')->with('congratulation', 'Chúc mừng bạn đã nhận được một voucher. Hãy vào phần thông tin voucher để biết thêm chi tiết');
        } else {
            if ($code_id) {
                $change = array();
                $cp_status = DB::table('coupon')->where('cp_id', $code_id)->first();
                if ($cp_status->cp_status == 0) {
                    $change['cp_status'] = 1;
                }
                DB::table('coupon')->where('cp_id', $code_id)->update($change);
            }
            Cart::destroy();
            $code_value = Session::get('cp_value');
            $code_code = Session::get('cp_code');
            $code_id = Session::get('cp_id');
            if ($code_value != null && $code_code != null && $code_id != null) {
                Session::forget('cp_value');
                Session::forget('cp_id');
                Session::forget('cp_code');
            }
            return Redirect()->Route('get.home')->with('order_sucess','Cảm ơn bạn đã đặt hàng! ');
        }
    }
}
