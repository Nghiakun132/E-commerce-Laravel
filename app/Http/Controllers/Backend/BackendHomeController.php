<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BackendHomeController extends Controller
{
    public function AuthLogin(){
        $id = Session::get('id');
        if($id){
            return redirect()->route('get_backend.home');
        }else{
            return redirect()->route('get_backend.login')->send();
        }
    }
    public function index(){
        $this->AuthLogin();
            $total = DB::table('order')->sum('order_total');
            $user = DB::table('users')->count('id');
            $products = DB::table('products')->count('id');
            $admins = DB::table('admins')->select('avatar')->first();
            $order = DB::table('order')
            ->join('users','order.user_id','=','users.id')
            // ->join('address','address.user_id','=','users.id')
            // ->join('address','users.id','=','address.user_id')
            ->select('order.*','users.name')
            ->orderBy('order.id')->limit(5)->get();
        $address = DB::table('address')->where('status',1)->first();

            // dd($order);
            $sp = DB::table('products')->get();
                $view =[
                'order' => $order,
                'admins' => $admins,
                'sp' => $sp,
                'address' => $address,
                ];

            // dd($view);
            Session::put('total', $total);
            Session::put('users', $user);
            Session::put('products', $products);
        return view('backend.index',$view);
    }
    public function login(){
        return view('backend.login');
    }
    public function adminlogin(Request $request){
        $email = $request->email;
        $matkhau = $request->matkhau;
        $result = DB::table('admins')->where('email', $email)->where('password', $matkhau)-> first();
        if($result) {
            Session::put('name',$result->name);
            Session::put('id',$result->id);
         return redirect()->route('get_backend.home');
        }
        else{
            Session::put('message','Email hoặc mật khẩu không chính xác');
            return redirect()->route('get_backend.login');
        }
    }
    public function logout(){
        $this->AuthLogin();
        Session::put('name',null);
        Session::put('id',null);
        return redirect()->route('get_backend.login');
    }

}
