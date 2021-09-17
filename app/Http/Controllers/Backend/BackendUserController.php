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
        $user = DB::table('users')
        // ->join('address','address.user_id','=','users.id')->distinct()
        // ->select('address.address','users.*')
        // ->groupBy('id')
        ->get();
        // $address = DB::table('address')->where('user_id',$user->id)->get();
        // dd($user);
        $data = [
            'user' => $user,
        ];
        return view($this->folder.'index',$data);
    }

    public function delete($id){
        DB::table('users')->where('id',$id)->delete();
        return Redirect()->route('get_backend.user.index');
    }
    public function change_status_user($id){
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
        $user = DB::table('users')->where('id',$id)->first();
        $product_bought = DB::table('order')->where('user_id',$id)->sum('order_total');
        // ->join('order_detail','order_detail.order_id','=','order.id')
        // ->join('products','products.id','=','order_detail.product_id')
        // ->get();
        // dd($product_bought);
        // $total = DB:
        $user_address = DB::table('address')->where('user_id',$id)->get();
        $product_detail_bought = DB::table('order')->where('user_id',$id)
        ->join('order_detail','order_detail.order_id','=','order.id')
        ->join('products','products.id','=','order_detail.product_id')
        ->select('order_detail.*','products.pro_avatar','order.*')
        ->get();
        // dd($product_detail_bought);
        return view($this->folder.'detail',compact('user_address','user','product_bought','product_detail_bought'));
    }
}
