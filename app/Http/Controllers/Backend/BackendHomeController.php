<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackendStaffRequest;
use Carbon\Carbon;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

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
            $total = DB::table('product_bought')
            ->join('order','order.id','=','product_bought.pk_order_id')
            ->where('order.order_status','<=',3)
            ->sum('pd_total');
            // dd($total);
            $user = DB::table('users')->count('id');
            $products_sell = DB::table('order_detail')
            ->join('order','order.id','=','order_detail.order_id')
            ->where('order.order_status','<=','3')
            ->sum('product_qty');
            // dd($products_sell);
            $admins = DB::table('admins')->select('avatar')->first();
            $order = DB::table('product_bought')
            ->join('users','product_bought.pk_user_id','=','users.id')
            ->join('order','order.id','=','product_bought.pk_order_id')
            // ->select('order.*','users.name','product_bought.pk_address')
            ->orderBy('order.id','desc')
            ->limit(5)->distinct()->get();
            // dd($order);
            // $address = DB::table('product_bought')->select('address')->first();
            $comment = DB::table('comment')->count('id');
            // $id_user = Session::get('id');
            // $info = DB::table('admins')->where('id',$id_user)->first();
            // dd($info);
            $sp = DB::table('products')->get();
                $view =[
                'order' => $order,
                'admins' => $admins,
                'sp' => $sp,
                // 'address' => $address,
                'comment' => $comment,
                'products_sell' => $products_sell,
                // 'info' => $info,
                ];
            Session::put('total', $total);
            Session::put('users', $user);
        return view('backend.index',$view);
    }
    public function login(){
        return view('backend.login');
    }
    public function adminlogin(Request $request){
        $email = $request->email;
        $matkhau = md5($request->matkhau);
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
    public function change_info($id){
        $info = DB::table('admins')->where('id',$id)->first();
        return view('backend.change_info',compact('info'));
    }
    public function change(BackendStaffRequest $request,$id){
        $data =array();
        $data = $request->except('_token','avatar');
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['updated_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        $data['password'] = md5($request->password);
        if ($request->avatar) {
            $image = upload_image('avatar');
            if(isset($image['code'])){
                $data['avatar'] = $image['name'];
            }
        }
        DB::table('admins')->where('id',$id)->update($data);
        return Redirect()->route('get_backend.home');
    }
}
