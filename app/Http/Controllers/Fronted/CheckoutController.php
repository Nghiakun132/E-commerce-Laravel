<?php

namespace App\Http\Controllers\Fronted;


use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use Cart;

session_start();

class CheckoutController extends Controller
{
    public function login_checkout(){
        return view('fronted.user.index');
    }

    public function add_user(Request $request){
        $data= array();
        $data2 =array();
        $data['name']  = $request->name;
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        $data['phone'] = $request->phone;
        $data['created_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        $insert = DB::table('users')->insertGetId($data);
        $data2['address'] = $request->address;
        $data2['user_id'] = $insert;
        $insert2 =DB::table('address')->insert($data2);
        Session::put('id',$insert);
        Session::put('name', $request->name);
        return Redirect()->Route('get.home');
    }
    public function checkout(){
        return view('fronted.user.checkout');
    }
    public function save_checkout(Request $request){
        $data= array();
        $data['s_name']  = $request->name;
        $data['s_email'] = $request->email;
        $data['s_phone'] = $request->phone;
        $data['s_address'] = $request->diachi;
        $data['s_notes'] = $request->note;
        $data['created_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        $insert = DB::table('shipping')->insertGetId($data);
        Session::put('s_id',$insert);
        Session::put('s_name', $request->name);
        return Redirect::to('payment');
    }

    public function logout(){
        Session::flush();
        return Redirect()->Route('get.home');
    }
    public function login_user(Request $request){
        $email = $request->email;
        $password = $request->password;
        $result = DB::table('users')->where('email', $email)->where('password', $password)->first();
        Session::put('user_id',$result->id);
        Session::put('user_name',$result->name);
        return Redirect()->Route('get.home');
    }

    public function payment(){
        $id = Session::get('user_id');
        $address = DB::table('address')->where('user_id', $id)->first();
        Session::put('user_address',$address);
        return view('fronted.user.payment');
    }
    public function order_place(){
        $address = Session::get('user_address');
        //order
        $order = array();
        $order['user_id']= Session::get('user_id');
        $order['order_total'] = Cart::total();
        $order['order_status'] = 1;
        $order['address'] = $address->address;
        $order['transport'] = rand(1,9);
        $order['created_at']=Carbon::now('Asia/Ho_Chi_Minh');
        $insert = DB::table('order')->insertGetId($order);
        //order_detail
        $order2 = array();
        $content = Cart::content();
        foreach ($content as $value) {
        $order2['order_id']=$insert;
        $order2['product_id'] = $value->id;
        $order2['product_name'] = $value->name;
        $order2['product_price'] = $value->price;
        $order2['product_qty'] = $value->qty;
        DB::table('order_detail')->insert($order2);
    }
        Cart::destroy();
        return Redirect()->Route('get.home');
    }

}
