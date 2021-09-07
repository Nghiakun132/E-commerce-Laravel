<?php

namespace App\Http\Controllers\Fronted;


use App\Http\Controllers\Controller;
use App\Http\Requests\register;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use Cart;

session_start();

class CheckoutController extends Controller
{
    public function AuthLogin(){
        $id = Session::get('user_id');
        if($id){
            return redirect()->route('get.home');
        }else{
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
        Session::flush();
        return Redirect()->Route('get.home');
    }
    public function login_user(Request $request)
    {
        $email = $request->email;
        $password = md5($request->password);
        $result = DB::table('users')->where('email', $email)->where('password', $password)->first();
        if($result != null){
            Session::put('user_id', $result->id);
            Session::put('user_name', $result->name);
            return Redirect()->Route('get.home');
        }
    }

    public function payment()
    {
        $id = Session::get('user_id');
        $address = DB::table('address')->where('user_id', $id)->first();
        Session::put('user_address', $address);
        return view('fronted.user.payment');
    }
    public function order_place()
    {
        $address = Session::get('user_address');
        //order
        $order = array();
        $order['user_id'] = Session::get('user_id');
        $order['order_total'] = Cart::total();
        $order['order_status'] = 0;
        $order['address'] = $address->address;
        $order['transport'] = rand(1, 9);
        $order['created_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        $insert = DB::table('order')->insertGetId($order);

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

        $soluong = array();
        foreach ($content as $v2) {
            $id = $v2->id;
            $qty = DB::table('products')->select('pro_number')->where('id', $id)->first();
            $sl = $v2->qty;
            $soluong['pro_number'] = $qty->pro_number - $sl;
            DB::table('products')->where('id', $id)->update($soluong);
        }

        Cart::destroy();
        return Redirect()->Route('get.home');
    }
}
