<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;

class BackendCouponController extends Controller
{
    public function AuthLogin(){
        $id = Session::get('id');
        if($id){
            return redirect()->route('get_backend.home');
        }else{
            return redirect()->route('get_backend.login')->send();
        }
    }
    public function index()
    {
        $this->AuthLogin();
        $coupon = Coupon::orderby('cp_id')->get();
        $view =[
            'coupon' => $coupon,
        ];
        return view('backend.coupon.index',$view);
    }
    public function add_coupon(){
        return view('backend.coupon.add_coupon');
    }
    public function add(Request $request){
        $this->AuthLogin();
        $data = $request->all();
        $coupon = new Coupon;
        $coupon->cp_name = $data['cp_name'];
        $coupon->cp_code = $data['cp_code'];
        $coupon->cp_qty = $data['cp_qty'];
        $coupon->cp_condition = $data['cp_condition'];
        $coupon->cp_time = Carbon::now('Asia/Ho_Chi_Minh');
        $coupon ->save();
        return Redirect()->route('get_backend.coupon.index');
    }
}
