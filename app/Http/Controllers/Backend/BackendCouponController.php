<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BackendCouponController extends Controller
{
    public function index()
    {
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
