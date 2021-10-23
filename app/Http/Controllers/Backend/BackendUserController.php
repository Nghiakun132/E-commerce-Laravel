<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;

class BackendUserController extends Controller
{
    protected $folder= 'backend.user.';
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
        $user = DB::table('users')
        ->get();
        $countUsers =  DB::table('users')->count('id');
        $data = [
            'user' => $user,
            'countUsers' => $countUsers
        ];
        return view($this->folder.'index',$data);
    }

    public function delete($id){
        $this->AuthLogin();
        DB::table('users')->where('id',$id)->delete();
        DB::table('address')->where('user_id',$id)->delete();
        return Redirect()->route('get_backend.user.index');
    }
    public function change_status_user($id){
        $this->AuthLogin();
        $status = DB::table('users')->where('id',$id)->select('status')->first();
            $st= array();
            if($status->status == 0){
                $st['status'] = 1;
            }else{
                $st['status'] = 0;
            }
            DB::table('users')->where('id',$id)->update($st);
        return Redirect()->route('get_backend.user.index');
    }
    public function detail($id) {
        $this->AuthLogin();
        $user = DB::table('users')->where('id',$id)->first();
        $product_bought = DB::table('orders')->where('user_id',$id)->where('order_status','<>',4)->sum('order_total');
        $user_address = DB::table('address')->where('user_id',$id)->get();
        $product_detail_bought = DB::table('orders')->where('user_id',$id)
        ->join('order_detail','order_detail.order_id','=','orders.id')
        ->join('products','products.id','=','order_detail.product_id')
        ->select('order_detail.*','products.pro_avatar','orders.*')
        ->get();
        return view($this->folder.'detail',compact('user_address','user','product_bought','product_detail_bought'));
    }
}
